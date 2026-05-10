<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Trainer extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'email',
        'phone',
        'specialization',
        'experience',
        'salary', 
        'status',
    ];

    protected $casts = [
        'status' => 'boolean',
    ];
    public function enquiries()
{
    return $this->hasMany(Enquiry::class);
}
public function courses()
{
    return $this->belongsToMany(Course::class);
}
}
