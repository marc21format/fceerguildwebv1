<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Room extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'rooms';

    protected $fillable = [
        'name',
        'adviser_id',
        'co_adviser_id',
        'president_id',
        'secretary_id',
        'created_by_id',
        'updated_by_id',
        'batch_id',
    ];

    protected $casts = [
        'adviser_id' => 'integer',
        'co_adviser_id' => 'integer',
        'president_id' => 'integer',
        'secretary_id' => 'integer',
        'batch_id' => 'integer',
    ];

    public function adviser()
    {
        return $this->belongsTo(User::class, 'adviser_id');
    }

    public function coAdviser()
    {
        return $this->belongsTo(User::class, 'co_adviser_id');
    }

    public function president()
    {
        return $this->belongsTo(User::class, 'president_id');
    }

    public function secretary()
    {
        return $this->belongsTo(User::class, 'secretary_id');
    }

    public function createdBy()
    {
        return $this->belongsTo(User::class, 'created_by_id');
    }

    public function updatedBy()
    {
        return $this->belongsTo(User::class, 'updated_by_id');
    }

    public function batch()
    {
        return $this->belongsTo(FceerBatch::class, 'batch_id');
    }
}
