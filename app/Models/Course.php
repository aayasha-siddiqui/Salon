<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    protected $fillable = [
        'title',
        'duration',
        'fees',
        'status',
        'category',
        'subcategory',
        // 'trainer_id' hata diya - ab multiple trainers honge
    ];

    // Many-to-Many relationship with trainers
    public function trainers()
    {
        return $this->belongsToMany(Trainer::class, 'course_trainer', 'course_id', 'trainer_id')
                    ->withTimestamps(); // agar timestamps chahiye toh
    }

    // Purani relationship (optional - agar kahi use ho rahi ho)
    public function students()
    {
        return $this->hasMany(Student::class, 'course_id');
    }

    public function batches()
    {
        return $this->hasMany(Batch::class);
    }

    public function enquiries()
    {
        return $this->hasMany(Enquiry::class);
    }
}