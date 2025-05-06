<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    use HasFactory;
    protected $fillable = [
        'subjectId',
        'name',
        'course',
        'creditHours'
    ];

    protected $casts = [
        'subjectId' => 'integer',
    ];

    public function subjects()
    {
        return $this->belongsToMany(Subject::class);
    }
}
