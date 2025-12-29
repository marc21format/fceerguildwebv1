<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CommitteeMembership extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'committee_memberships';

    protected $fillable = [
        'user_id',
        'committee_id',
        'committee_position_id',
        'created_by_id',
        'updated_by_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function committee()
    {
        return $this->belongsTo(Committee::class);
    }

    public function committeePosition()
    {
        return $this->belongsTo(CommitteePosition::class, 'committee_position_id');
    }
}
