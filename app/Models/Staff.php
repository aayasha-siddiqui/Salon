<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;
class Staff extends Model
{
    protected $table = 'staffs';

    protected $fillable = [
        'name',
        'phone',
        'email',
        'gender',
        'role',
        'joining_date',
        'address',
        'salary_type',
        'fixed_salary',
        'commission_percent',
        'photo'
    ];
public function services()
{
    return $this->belongsToMany(
        Service::class,
        'service_staff',
        'staff_id',
        'service_id'
    );
}
     public function salaries()
    {
        return $this->hasMany(StaffSalary::class, 'staff_id');
    }

    public function appointments()
    {
        return $this->hasMany(Appointment::class);
    }
}