<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    protected $primaryKey = 'student_id';
    public $incrementing = false;

    protected $fillable = [
        'student_id',
        'user_id',
        'name',
        'email',
        'phone',
        'course',
        'intake'
    ];

    protected $casts = [
        'student_id' => 'integer',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function lecturers()
    {
        return $this->belongsTo(Lecturer::class);
    }

    public function students()
    {
        return $this->hasMany(Student::class);
    }

    public function subjects()
    {
        return $this->belongsToMany(Subject::class, 'student_subject', 'student_id', 'subject_id');
    }

    public function assessments()
    {
        return $this->hasMany(Assessment::class, 'student_id');
    }
}
