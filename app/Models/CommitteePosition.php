<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CommitteePosition extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'committee_positions';

    protected $fillable = [
        'position_id',
        'committee_id',
        'created_by_id',
        'updated_by_id',
    ];

    public function createdBy()
    {
        return $this->belongsTo(User::class, 'created_by_id');
    }

    public function updatedBy()
    {
        return $this->belongsTo(User::class, 'updated_by_id');
    }

    public function position()
    {
        return $this->belongsTo(Position::class, 'position_id');
    }

    public function committee()
    {
        return $this->belongsTo(Committee::class, 'committee_id');
    }
}
