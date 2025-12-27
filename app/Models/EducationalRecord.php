<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EducationalRecord extends Model
{
    use HasFactory;

    protected $table = 'educational_records';

    public $timestamps = true;

    protected $fillable = [
        'user_id',
        'degree_program_id',
        'year_started',
        'university_id',
        'year_graduated',
        'dost_scholarship',
        'latin_honor',
    ];

    protected $casts = [
        'year_started' => 'integer',
        'year_graduated' => 'integer',
        'dost_scholarship' => 'boolean',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function degreeProgram()
    {
        return $this->belongsTo(DegreeProgram::class, 'degree_program_id');
    }

    public function university()
    {
        return $this->belongsTo(University::class, 'university_id');
    }
}
