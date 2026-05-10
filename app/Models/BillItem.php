<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BillItem extends Model
{
    protected $table = 'bill_items';   // ⭐ ADD THIS LINE

    protected $fillable = [
        'bill_id',
        'service_id',
        'staff_id',
        'price'
    ];

    public function service()
    {
        return $this->belongsTo(Service::class);
    }

    public function staff()
    {
        return $this->belongsTo(Staff::class);
    }

    public function bill()
    {
        return $this->belongsTo(Bill::class);
    }
}