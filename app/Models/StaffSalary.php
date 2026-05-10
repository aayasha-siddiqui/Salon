<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class StaffSalary extends Model
{
    protected $fillable = [
        'staff_id',
        'month',
        'from_date',
        'to_date',
        'total_service_amount',
        'commission_amount',
        'service_total',
        'salary_amount',
        'salary_month',
        'bonus',
        'final_salary',
        'from_date',
        'to_date'
    ];

    public function staff()
    {
        return $this->belongsTo(Staff::class);
    }
}