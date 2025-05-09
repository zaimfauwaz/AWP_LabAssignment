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

    public function assessments()
    {
        return $this->hasMany(Assessment::class, 'subject_id');
    }
}
