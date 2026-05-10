<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    protected $fillable = [
        'customer_name',
        'customer_phone',
        'staff_id',
        'appointment_date',
        'appointment_time',
        'amount',
        'discount',
        'payment_status',
        'status'
    ];

    /*
    |--------------------------------------------------------------------------
    | Relationships
    |--------------------------------------------------------------------------
    */

    // Multiple Services
    public function services()
    {
        return $this->belongsToMany(Service::class,'appointment_services');
    }

    // Staff
    public function staff()
    {
        return $this->belongsTo(Staff::class);
    }
    
}