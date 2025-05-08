<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Assessment extends Model
{
    use HasFactory, SoftDeletes;

    protected $primaryKey = 'assessment_id';
    public $incrementing = false;

    protected $fillable = [
        'assessment_id',
        'student_id',
        'subject_id',
        'type',
        'score',
        'date'
    ];

    protected $casts = [
        'assessment_id' => 'integer',
        'student_id' => 'integer',
        'subject_id' => 'integer',
        'score' => 'float',
        'date' => 'date'
    ];

    public function student()
    {
        return $this->belongsTo(Student::class, 'student_id');
    }

    public function subject()
    {
        return $this->belongsTo(Subject::class, 'subject_id');
    }
} 