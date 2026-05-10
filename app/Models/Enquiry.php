<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Enquiry extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'phone',
        'email',
        'course_id',
        'trainer_id',
        'message'
    ];

    /*
    |--------------------------------------------------------------------------
    | Course Relation
    |--------------------------------------------------------------------------
    */
    public function course()
    {
        return $this->belongsTo(Course::class);
    }

    /*
    |--------------------------------------------------------------------------
    | Trainer Relation
    |--------------------------------------------------------------------------
    */
    public function trainer()
    {
        return $this->belongsTo(Trainer::class);
    }
}