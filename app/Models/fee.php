<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Fee extends Model
{
    protected $fillable = [
        'student_id',
        'total_amount',
        'paid_amount',
        'due_amount',
        'payment_date',
        'status',
    ];

    public function student()
    {
        return $this->belongsTo(Student::class);
    }
}
