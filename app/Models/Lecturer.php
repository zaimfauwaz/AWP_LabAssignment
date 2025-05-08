<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lecturer extends Model
{
    use HasFactory;

    protected $primaryKey = 'staff_id';
    public $incrementing = false;

    protected $fillable = [
        'staff_id',
        'user_id',
        'name',
        'email',
        'phone',
        'department'
    ];

    protected $casts = [
        'staff_id' => 'integer',
        'credit_hours' => 'integer',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function subjects()
    {
        return $this->belongsToMany(Subject::class, 'lecturer_subject', 'staff_id', 'subject_id');
    }
}
