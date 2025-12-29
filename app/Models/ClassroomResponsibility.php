<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class ClassroomResponsibility extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'user_id',
        'classroom_position_id',
        'classroom_id',
        'start_date',
        'end_date',
        'created_by_id',
        'updated_by_id',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function classroomPosition(): BelongsTo
    {
        return $this->belongsTo(ClassroomPosition::class);
    }

    public function classroom(): BelongsTo
    {
        return $this->belongsTo(Classroom::class);
    }

    public function creator(): BelongsTo
    {
        return $this->belongsTo(User::class, 'created_by_id');
    }

    public function updater(): BelongsTo
    {
        return $this->belongsTo(User::class, 'updated_by_id');
    }
}