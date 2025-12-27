<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SubjectTeacher extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'subject_teachers';

    protected $fillable = [
        'volunteer_subject_id',
        'user_id',
        'is_primary',
        'created_by_id',
        'updated_by_id',
    ];

    protected $casts = [
        'is_primary' => 'boolean',
    ];

    public function volunteerSubject()
    {
        return $this->belongsTo(VolunteerSubject::class, 'volunteer_subject_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function createdBy()
    {
        return $this->belongsTo(User::class, 'created_by_id');
    }

    public function updatedBy()
    {
        return $this->belongsTo(User::class, 'updated_by_id');
    }
}
