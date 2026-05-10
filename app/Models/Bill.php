<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Bill extends Model
{protected $fillable = [
     'customer_id',  // Add this
    'bill_number',
    'customer_name',
    'customer_phone',
    'bill_date',
    'total_amount',
    'payment_status',
    'subtotal',
'discount',
'paid_amount',
'remaining_amount',
'payment_method',
   'notes',
                'created_by'

];
 public function items()
{
    return $this->hasMany(BillItem::class,'bill_id');
}
public function customer()
{
    return $this->belongsTo(Customer::class);
}
}
