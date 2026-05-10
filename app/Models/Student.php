<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $fillable = [
        'name',
        'email',
        'phone',
        'address',
        'photo',
        'category',
        'subcategory',
        'trainer_id',
        'course_id',
        'joining_date',
        'status',

    'course_fee',
    'fees_paid',
    'fees_pending',
    'payment_status'
    ];
public function setFeesPaidAttribute($value)
{
    $this->attributes['fees_paid'] = $value;
    $this->attributes['fees_pending'] = $this->course_fee - $value;
}
public function payments()
{
    return $this->hasMany(Payment::class);
}
public function totalPaid()
{
    return $this->payments->sum('amount');
}
    public function trainer()
    {
        return $this->belongsTo(\App\Models\Trainer::class);
    }


    public function course()
{
    return $this->belongsTo(Course::class, 'course_id');
}


    public function fees()
    {
        return $this->hasMany(Fee::class);
    }
}
