<?php

namespace App\Services;

class ReferenceFieldSanitizer
{
    /**
     * Remove runtime-only callable options from field definitions so
     * they can be safely stored in public component properties.
     */
    public function sanitize(array $fields): array
    {
        return collect($fields)->map(function ($f) {
            if (isset($f['options']) && is_callable($f['options'])) {
                $f['options'] = [];
            }
            return $f;
        })->toArray();
    }
}
