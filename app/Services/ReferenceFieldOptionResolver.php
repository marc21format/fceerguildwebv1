<?php

namespace App\Services;

use Illuminate\Support\Str;
use Illuminate\Support\Facades\Cache;

class ReferenceFieldOptionResolver
{
    /**
     * Resolve options for an array of field definitions.
     * Returns a new array with `options` populated where applicable.
     *
     * @param array $fields
     * @return array
     */
    public function resolve(array $fields): array
    {
        return collect($fields)->map(function ($f) {
            return $this->resolveFieldOptions($f);
        })->toArray();
    }

    /**
     * Resolve options for a single field definition.
     * Safe: catches exceptions and returns empty options on failure.
     *
     * @param array $field
     * @return array
     */
    public function resolveFieldOptions(array $field): array
    {
        if (($field['type'] ?? '') !== 'select') {
            return $field;
        }

        // If explicit options provided and it's not callable, keep as-is
        if (isset($field['options']) && ! is_callable($field['options'])) {
            return $field;
        }

        // Try callable first. Cache results when field key is present.
        if (isset($field['options']) && is_callable($field['options'])) {
            if (! empty($field['key'])) {
                $cacheKey = "reference:options:" . $field['key'];
                $field['options'] = Cache::remember($cacheKey, 300, function () use ($field) {
                    try {
                        $opts = call_user_func($field['options']);
                        return is_array($opts) ? $opts : [];
                    } catch (\Throwable $e) {
                        return [];
                    }
                });
                return $field;
            }

            try {
                $opts = call_user_func($field['options']);
                $field['options'] = is_array($opts) ? $opts : [];
                return $field;
            } catch (\Throwable $e) {
                $field['options'] = [];
                return $field;
            }
        }

        // Fallback: if key looks like a foreign key (ends with _id), try to derive model
        if (isset($field['key']) && is_string($field['key']) && Str::endsWith($field['key'], '_id')) {
            $rel = substr($field['key'], 0, -3);
            $modelClass = '\\App\\Models\\' . Str::studly(Str::singular($rel));
            if (class_exists($modelClass)) {
                // Cache pluck results by model/key for short TTL
                if (! empty($field['key'])) {
                    $cacheKey = "reference:options:" . $field['key'];
                    $field['options'] = Cache::remember($cacheKey, 300, function () use ($modelClass) {
                        try {
                            return $modelClass::pluck('name', 'id')->toArray();
                        } catch (\Throwable $e) {
                            return [];
                        }
                    });
                } else {
                    try {
                        $field['options'] = $modelClass::pluck('name', 'id')->toArray();
                    } catch (\Throwable $e) {
                        $field['options'] = [];
                    }
                }

                return $field;
            }
        }

        // Default to empty array
        $field['options'] = [];
        return $field;
    }
}
