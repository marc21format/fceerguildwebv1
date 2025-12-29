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

        // If explicit options provided and it's a simple associative array (static options), keep as-is
        if (isset($field['options']) && is_array($field['options'])) {
            // If this array is an options descriptor (model/query/service), fallthrough and handle below.
            if (! $this->isOptionsDescriptor($field['options']) && $this->isAssocList($field['options'])) {
                return $field;
            }
        }

        // If options provided as a descriptor array (model/service), we'll handle below

        // If options is an invokable class (string), instantiate and call it
        if (isset($field['options']) && is_string($field['options']) && class_exists($field['options'])) {
            $optsClass = $field['options'];
            $meta = $field;
            unset($meta['options']);
            $cacheKey = 'reference:options:' . ($field['key'] ?? '') . ':' . md5(json_encode($meta));

            try {
                $field['options'] = Cache::remember($cacheKey, 300, function () use ($optsClass) {
                    try {
                        return is_callable($optsClass) ? app($optsClass)() : [];
                    } catch (\Throwable $e) {
                        \Log::error('ReferenceFieldOptionResolver: invokable class failed', ['class' => $optsClass, 'error' => $e->getMessage()]);
                        return [];
                    }
                });
            } catch (\Throwable $e) {
                \Log::error('ReferenceFieldOptionResolver: cache remember failed for invokable', ['class' => $optsClass, 'error' => $e->getMessage()]);
                try {
                    $field['options'] = is_callable($optsClass) ? app($optsClass)() : [];
                } catch (\Throwable $e) {
                    \Log::error('ReferenceFieldOptionResolver: invokable fallback failed', ['class' => $optsClass, 'error' => $e->getMessage()]);
                    $field['options'] = [];
                }
            }

            return $field;
        }

        // Try callable next. Cache results using a meta-based cache key so
        // options resolved for different contexts don't collide.
        if (isset($field['options']) && is_callable($field['options'])) {
            // Build a cache key based on field metadata (excluding the callable)
            $meta = $field;
            unset($meta['options']);
            $cacheKey = 'reference:options:' . ($field['key'] ?? '') . ':' . md5(json_encode($meta));

            try {
                $field['options'] = Cache::remember($cacheKey, 300, function () use ($field) {
                    try {
                        $opts = call_user_func($field['options']);
                        return is_array($opts) ? $opts : [];
                    } catch (\Throwable $e) {
                        \Log::error('ReferenceFieldOptionResolver: callable options failed', ['key' => $field['key'] ?? null, 'error' => $e->getMessage()]);
                        return [];
                    }
                });
            } catch (\Throwable $e) {
                \Log::error('ReferenceFieldOptionResolver: cache remember failed', ['key' => $field['key'] ?? null, 'error' => $e->getMessage()]);
                try {
                    $opts = call_user_func($field['options']);
                    $field['options'] = is_array($opts) ? $opts : [];
                } catch (\Throwable $e) {
                    \Log::error('ReferenceFieldOptionResolver: callable options fallback failed', ['key' => $field['key'] ?? null, 'error' => $e->getMessage()]);
                    $field['options'] = [];
                }
            }

            return $field;
        }

        // If options provided as a descriptor array (model/service), support the common
        // descriptor format: ['model' => Model::class, 'label' => 'name', 'value' => 'id', 'order_by' => [...]]
        if (isset($field['options']) && is_array($field['options']) && $this->isOptionsDescriptor($field['options'])) {
            $opts = $field['options'];
            $meta = $field;
            unset($meta['options']);
            $cacheKey = 'reference:options:' . ($field['key'] ?? '') . ':' . md5(json_encode($meta));

            try {
                $field['options'] = Cache::remember($cacheKey, 300, function () use ($opts) {
                    try {
                        if (! empty($opts['model']) && class_exists($opts['model'])) {
                            $model = $opts['model'];
                            $label = $opts['label'] ?? 'name';
                            $value = $opts['value'] ?? 'id';
                            $query = $model::query();
                            if (! empty($opts['order_by']) && is_array($opts['order_by'])) {
                                foreach ($opts['order_by'] as $col => $dir) {
                                    $query->orderBy($col, $dir);
                                }
                            }
                            return $query->pluck($label, $value)->toArray();
                        }

                        return [];
                    } catch (\Throwable $e) {
                        \Log::error('ReferenceFieldOptionResolver: descriptor handler failed', ['descriptor' => $opts, 'error' => $e->getMessage()]);
                        return [];
                    }
                });
            } catch (\Throwable $e) {
                \Log::error('ReferenceFieldOptionResolver: cache remember failed for descriptor', ['descriptor' => $opts, 'error' => $e->getMessage()]);
                try {
                    if (! empty($opts['model']) && class_exists($opts['model'])) {
                        $model = $opts['model'];
                        $label = $opts['label'] ?? 'name';
                        $value = $opts['value'] ?? 'id';
                        $query = $model::query();
                        if (! empty($opts['order_by']) && is_array($opts['order_by'])) {
                            foreach ($opts['order_by'] as $col => $dir) {
                                $query->orderBy($col, $dir);
                            }
                        }
                        $field['options'] = $query->pluck($label, $value)->toArray();
                    } else {
                        $field['options'] = [];
                    }
                } catch (\Throwable $e) {
                    \Log::error('ReferenceFieldOptionResolver: descriptor fallback failed', ['descriptor' => $opts, 'error' => $e->getMessage()]);
                    $field['options'] = [];
                }
            }

            return $field;
        }

        // Fallback: if key looks like a foreign key (ends with _id), try to derive model
        if (isset($field['key']) && is_string($field['key']) && Str::endsWith($field['key'], '_id')) {
            $rel = substr($field['key'], 0, -3);
            $modelClass = '\\App\\Models\\' . Str::studly(Str::singular($rel));
                if (class_exists($modelClass)) {
                    // Build a cache key that includes field metadata to avoid collisions
                    $meta = $field;
                    unset($meta['options']);
                    $cacheKey = 'reference:options:' . ($field['key'] ?? '') . ':' . md5(json_encode($meta));

                    try {
                        $field['options'] = Cache::remember($cacheKey, 300, function () use ($modelClass) {
                            try {
                                return $modelClass::pluck('name', 'id')->toArray();
                            } catch (\Throwable $e) {
                                \Log::error('ReferenceFieldOptionResolver: model pluck failed', ['model' => $modelClass, 'error' => $e->getMessage()]);
                                return [];
                            }
                        });
                    } catch (\Throwable $e) {
                        \Log::error('ReferenceFieldOptionResolver: cache remember for model pluck failed', ['model' => $modelClass, 'error' => $e->getMessage()]);
                        try {
                            $field['options'] = $modelClass::pluck('name', 'id')->toArray();
                        } catch (\Throwable $e) {
                            \Log::error('ReferenceFieldOptionResolver: model pluck fallback failed', ['model' => $modelClass, 'error' => $e->getMessage()]);
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

    protected function isAssocList(array $arr): bool
    {
        // Return true if array is associative (string keys) or mapped list (value=>label)
        if (empty($arr)) return false;
        foreach ($arr as $k => $v) {
            if (! is_int($k)) return true;
        }
        return false;
    }

    protected function isOptionsDescriptor(array $arr): bool
    {
        if (empty($arr)) return false;
        return isset($arr['model']) || isset($arr['query']) || isset($arr['label']) || isset($arr['value']);
    }
}
