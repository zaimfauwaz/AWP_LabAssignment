<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lecturer extends Model
{
    use HasFactory;
    protected $fillable = [
        'staffId',
        'name',
        'email',
        'phone',
        'department'
    ];

    protected $casts = [
        'lecturerId' => 'integer',
        'creditHours' => 'integer',
    ];

    public function subjects()
    {
        return $this->hasMany(Subject::class);
    }
}
