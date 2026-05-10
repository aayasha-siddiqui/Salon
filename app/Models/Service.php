<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{   protected $table = 'services';

    protected $fillable = [
       
        'name',
        'type',
        'gender',
        'price',
        'duration',
        'description'
    ];

  public function staffs()
{
    return $this->belongsToMany(
        Staff::class,
        'service_staff',
        'service_id',
        'staff_id'
    );
}
    public function appointments()
    {
        return $this->hasMany(Appointment::class);
    }
}