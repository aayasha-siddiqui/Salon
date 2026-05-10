<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $fillable = [
        'name', 'phone', 'email', 'address',
        'total_outstanding', 'total_paid', 'total_billed',
        'total_visits', 'last_visit'
    ];

    protected $casts = [
        'last_visit' => 'date'
    ];

    public function bills()
    {
        return $this->hasMany(Bill::class);
    }

    public function ledgers()
    {
        return $this->hasMany(CustomerLedger::class);
    }

    // Total baki amount calculate karo
    public function updateOutstandingBalance()
    {
        $this->total_outstanding = $this->bills()
            ->where('payment_status', '!=', 'paid')
            ->sum('remaining_amount');
        $this->save();
    }
}