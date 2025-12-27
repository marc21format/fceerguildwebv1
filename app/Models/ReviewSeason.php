<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ReviewSeason extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'review_seasons';

    protected $fillable = [
        'start_month',
        'start_year',
        'end_month',
        'end_year',
        'is_active',
        'set_by_user_id',
        'created_by_id',
        'updated_by_id',
    ];

    protected $casts = [
        'start_month' => 'integer',
        'start_year' => 'integer',
        'end_month' => 'integer',
        'end_year' => 'integer',
        'is_active' => 'boolean',
    ];

    public function setBy()
    {
        return $this->belongsTo(User::class, 'set_by_user_id');
    }

    public function createdBy()
    {
        return $this->belongsTo(User::class, 'created_by_id');
    }

    public function updatedBy()
    {
        return $this->belongsTo(User::class, 'updated_by_id');
    }

    public function fceerBatches()
    {
        return $this->hasMany(FceerBatch::class, 'review_season_id');
    }
}
