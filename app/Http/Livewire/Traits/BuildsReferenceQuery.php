<?php

namespace App\Http\Livewire\Traits;
use Illuminate\Support\Str;

trait BuildsReferenceQuery
{
    protected function buildQuery()
    {
        $query = ($this->modelClass)::query();
        $model = new $this->modelClass;
        $table = $model->getTable();

        // Eager-load relations referenced by fields that end with _id
        $relations = [];
        foreach ($this->fields ?? [] as $f) {
            $key = $f['key'] ?? null;
            if (! is_string($key)) {
                continue;
            }

            if (str_ends_with($key, '_id')) {
                $base = substr($key, 0, -3);
                $camel = Str::camel($base);

                if (method_exists($model, $base)) {
                    $relations[] = $base;
                } elseif (method_exists($model, $camel)) {
                    $relations[] = $camel;
                }
            }
        }

        $relations = array_values(array_unique($relations));
        if (! empty($relations)) {
            $query->with($relations);
        }

        $search = trim($this->search ?? '');
        if ($search !== '') {
            $lower = mb_strtolower($search);

            $query->where(function ($q) use ($lower, $table) {
                foreach ($this->fields as $f) {
                    $type = $f['type'] ?? 'text';
                    $searchable = $f['searchable'] ?? in_array($type, ['text', 'string']);
                    if (! $searchable) {
                        continue;
                    }

                    $col = $f['key'];
                    $qualified = "{$table}.{$col}";

                    try {
                        $q->orWhereRaw("LOWER(COALESCE({$qualified},'')) LIKE ?", ["%{$lower}%"]);
                    } catch (\Throwable $e) {
                        // Fallback to simpler where in case raw is not supported for this DB
                        $q->orWhere($col, 'like', "%{$search}%");
                    }
                }
            });
        }

        // Apply filters if present
        if (! empty($this->filters ?? [])) {
            foreach ($this->filters as $flt) {
                $field = $flt['field'] ?? null;
                $op = $flt['op'] ?? 'contains';
                $value = $flt['value'] ?? null;

                if (empty($field)) {
                    continue;
                }

                $qualified = "{$table}.{$field}";

                switch ($op) {
                    case 'contains':
                        $query->where($qualified, 'like', "%{$value}%");
                        break;
                    case 'starts_with':
                        $query->where($qualified, 'like', "{$value}%");
                        break;
                    case 'ends_with':
                        $query->where($qualified, 'like', "%{$value}");
                        break;
                    case 'equals':
                        $query->where($qualified, $value);
                        break;
                    case 'gt':
                        $query->where($qualified, '>', $value);
                        break;
                    case 'lt':
                        $query->where($qualified, '<', $value);
                        break;
                    case 'between':
                        // expect comma-separated two values
                        if (is_string($value) && strpos($value, ',') !== false) {
                            [$a, $b] = array_map('trim', explode(',', $value, 2));
                            $query->whereBetween($qualified, [$a, $b]);
                        }
                        break;
                    case 'in':
                        $vals = is_array($value) ? $value : array_map('trim', explode(',', (string) $value));
                        $query->whereIn($qualified, $vals);
                        break;
                    case 'is_null':
                        $query->whereNull($qualified);
                        break;
                    case 'is_not_null':
                        $query->whereNotNull($qualified);
                        break;
                    default:
                        // fallback to contains
                        $query->where($qualified, 'like', "%{$value}%");
                }
            }
        }

        return $query->orderBy($this->sort, $this->direction);
    }
}
