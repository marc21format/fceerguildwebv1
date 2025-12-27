<?php

namespace App\Services;

use Illuminate\Support\Str;

class ReferenceDisplayFormatter
{
    /**
     * Format a single field value for display in tables/details.
     *
     * @param  mixed  $row
     * @param  array  $field  Field definition with keys like 'key' and 'options'
     * @return string|mixed
     */
    public function formatFieldValue($row, array $field)
    {
        $key = $field['key'] ?? null;

        if (empty($key)) {
            return '';
        }

        $value = data_get($row, $key);

        // If explicit options exist, prefer lookup (robust to string/int keys and arrays)
        if (! empty($field['options'] ?? [])) {
            $opts = $field['options'];

            // If value is array-ish (multiple select), map each to label
            if (is_array($value)) {
                $labels = array_map(function ($v) use ($opts) {
                    if (array_key_exists($v, $opts)) return $opts[$v];
                    if (array_key_exists((string) $v, $opts)) return $opts[(string) $v];
                    if (array_key_exists((int) $v, $opts)) return $opts[(int) $v];
                    return $v;
                }, $value);
                return implode(', ', $labels);
            }

            if (is_array($opts)) {
                if (array_key_exists($value, $opts)) return $opts[$value];
                if (array_key_exists((string) $value, $opts)) return $opts[(string) $value];
                if (array_key_exists((int) $value, $opts)) return $opts[(int) $value];
                // search values in case options keyed by name: value => label
                $found = array_search($value, $opts, true);
                if ($found !== false) return $opts[$found];
            }

            return $value;
        }

        // If foreign key-like, try relation fallbacks and common display attributes
        if (is_string($key) && str_ends_with($key, '_id')) {
            $relationKey = substr($key, 0, -3);
            $relationMethod = Str::camel($relationKey);

            // Candidate attribute names that commonly represent a human-friendly label
            $candidates = ['name', 'title', 'label', 'display_name', 'full_name', 'description', 'email'];

            // Try to get the related model via various accessors
            $related = data_get($row, $relationKey) ?? data_get($row, $relationMethod) ?? ($row->{$relationMethod} ?? null) ?? ($row->{$relationKey} ?? null);

            if ($related) {
                // If related is an array / collection entry, try data_get
                foreach ($candidates as $attr) {
                    $val = data_get($related, $attr);
                    if (! empty($val) || $val === '0') {
                        return $val;
                    }
                }

                // If related model implements __toString, use it
                try {
                    if (is_object($related) && method_exists($related, '__toString')) {
                        return (string) $related;
                    }
                } catch (\Throwable $e) {
                    // ignore and fallback
                }

                // As a last resort, attempt to read any scalar attribute
                if (is_object($related)) {
                    $attrs = $related->getAttributes();
                    if (! empty($attrs)) {
                        $first = reset($attrs);
                        return is_scalar($first) ? (string) $first : $value;
                    }
                }
            }

            // fallback to the raw FK value
            return $value;
        }

        // Date formatting
        if ($value instanceof \DateTimeInterface) {
            return $value->format('Y-m-d H:i:s');
        }

        return $value;
    }
}
