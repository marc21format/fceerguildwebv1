<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HighschoolSubjectRecord extends Model
{
    use HasFactory;

    protected $table = 'highschool_subject_records';

    public $timestamps = true;

    protected $fillable = [
        'user_id',
        'highschool_subject_id',
        'highschool_record_id',
        'grade',
    ];

    protected $casts = [
        'user_id' => 'integer',
        'highschool_subject_id' => 'integer',
        'highschool_record_id' => 'integer',
        'grade' => 'string',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function subject()
    {
        return $this->belongsTo(HighschoolSubject::class, 'highschool_subject_id');
    }

    public function highschoolRecord()
    {
        return $this->belongsTo(HighschoolRecord::class, 'highschool_record_id');
    }
}
