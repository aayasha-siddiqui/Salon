<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SalonEnquiry extends Model
{
    protected $fillable = [
        'name',
        'contact',
        'gender',
        'service',
        'message'
    ];
}