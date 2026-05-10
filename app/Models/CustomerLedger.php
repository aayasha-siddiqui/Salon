<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CustomerLedger extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'customer_ledgers';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'customer_id',
        'bill_id',
        'transaction_type',
        'amount',
        'previous_balance',
        'new_balance',
        'payment_method',
        'notes',
        'created_at'
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'amount' => 'decimal:2',
        'previous_balance' => 'decimal:2',
        'new_balance' => 'decimal:2',
        'created_at' => 'datetime',
        'updated_at' => 'datetime'
    ];

    /**
     * Get the customer that owns the ledger entry.
     */
    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }

    /**
     * Get the bill associated with this ledger entry.
     */
    public function bill()
    {
        return $this->belongsTo(Bill::class);
    }

    /**
     * Scope a query to only include bill transactions.
     */
    public function scopeBills($query)
    {
        return $query->where('transaction_type', 'bill');
    }

    /**
     * Scope a query to only include payment transactions.
     */
    public function scopePayments($query)
    {
        return $query->where('transaction_type', 'payment');
    }

    /**
     * Scope a query to only include transactions from today.
     */
    public function scopeToday($query)
    {
        return $query->whereDate('created_at', today());
    }

    /**
     * Scope a query to only include transactions from this month.
     */
    public function scopeThisMonth($query)
    {
        return $query->whereMonth('created_at', now()->month)
                     ->whereYear('created_at', now()->year);
    }

    /**
     * Get transaction type badge HTML
     */
    public function getTransactionTypeBadgeAttribute()
    {
        if ($this->transaction_type == 'bill') {
            return '<span class="badge bg-warning text-dark">🧾 Bill</span>';
        } elseif ($this->transaction_type == 'payment') {
            return '<span class="badge bg-success">💰 Payment</span>';
        }
        return '<span class="badge bg-secondary">' . ucfirst($this->transaction_type) . '</span>';
    }

    /**
     * Get formatted amount with sign
     */
    public function getFormattedAmountAttribute()
    {
        if ($this->transaction_type == 'bill') {
            return '+ ₹' . number_format($this->amount, 2);
        } elseif ($this->transaction_type == 'payment') {
            return '- ₹' . number_format($this->amount, 2);
        }
        return '₹' . number_format($this->amount, 2);
    }

    /**
     * Get amount color class
     */
    public function getAmountColorAttribute()
    {
        if ($this->transaction_type == 'bill') {
            return 'text-warning';
        } elseif ($this->transaction_type == 'payment') {
            return 'text-success';
        }
        return 'text-info';
    }

    /**
     * Get balance color class
     */
    public function getBalanceColorAttribute()
    {
        if ($this->new_balance > 0) {
            return 'text-danger';
        }
        return 'text-success';
    }

    /**
     * Boot the model.
     */
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($ledger) {
            // Auto-set previous balance if not set
            if (is_null($ledger->previous_balance)) {
                $lastEntry = self::where('customer_id', $ledger->customer_id)
                                 ->latest()
                                 ->first();
                $ledger->previous_balance = $lastEntry ? $lastEntry->new_balance : 0;
            }

            // Auto-calculate new balance based on transaction type
            if (is_null($ledger->new_balance)) {
                if ($ledger->transaction_type == 'bill') {
                    $ledger->new_balance = $ledger->previous_balance + $ledger->amount;
                } elseif ($ledger->transaction_type == 'payment') {
                    $ledger->new_balance = $ledger->previous_balance - $ledger->amount;
                } else {
                    $ledger->new_balance = $ledger->previous_balance;
                }
            }

            // Ensure new balance is not negative
            if ($ledger->new_balance < 0) {
                $ledger->new_balance = 0;
            }
        });
    }

    /**
     * Get human readable transaction type
     */
    public function getTransactionTypeTextAttribute()
    {
        $types = [
            'bill' => 'New Bill',
            'payment' => 'Payment Received',
            'refund' => 'Refund',
            'adjustment' => 'Adjustment'
        ];
        
        return $types[$this->transaction_type] ?? ucfirst($this->transaction_type);
    }

    /**
     * Get payment method icon
     */
    public function getPaymentMethodIconAttribute()
    {
        $icons = [
            'cash' => '💵',
            'upi' => '📱',
            'card' => '💳',
            'bank' => '🏦'
        ];
        
        return $icons[$this->payment_method] ?? '💰';
    }

    /**
     * Get the duration since creation
     */
    public function getCreatedAtHumanAttribute()
    {
        return $this->created_at->diffForHumans();
    }

    /**
     * Get formatted date
     */
    public function getFormattedDateAttribute()
    {
        return $this->created_at->format('d M Y, h:i A');
    }
}