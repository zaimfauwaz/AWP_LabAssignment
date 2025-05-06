<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;
    protected $fillable = [
        'studentId',
        'name',
        'email',
        'phone',
        'course',
        'intake'
    ];

    protected $casts = [
        'studentId' => 'integer',
    ];

    public function lecturers()
    {
        return $this->belongsTo(Lecturer::class);
    }

    public function students()
    {
        return $this->hasMany(Student::class);
    }
}
