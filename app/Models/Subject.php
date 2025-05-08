<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    use HasFactory;

    protected $primaryKey = 'subject_id';
    public $incrementing = false;

    protected $fillable = [
        'subject_id',
        'name',
        'course',
        'credit_hours'
    ];

    protected $casts = [
        'subject_id' => 'integer',
        'credit_hours' => 'integer',
    ];

    public function subjects()
    {
        return $this->belongsToMany(Subject::class);
    }

    public function students()
    {
        return $this->belongsToMany(Student::class, 'student_subject', 'subject_id', 'student_id');
    }

    public function lecturers()
    {
        return $this->belongsToMany(Lecturer::class, 'lecturer_subject', 'subject_id', 'staff_id');
    }
}
