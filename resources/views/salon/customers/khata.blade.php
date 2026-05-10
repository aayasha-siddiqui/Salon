@extends('salon.layouts.app')

@section('content')

<style>
/* ================ CUSTOMER KHATA PAGE - DARK GOLD THEME ================ */

/* ================ PAGE CONTAINER ================ */
.khata-wrapper{
    padding:25px 20px;
    min-height:calc(100vh - 70px);
    background:var(--bg);
}

/* ================ MAIN CARD ================ */
.khata-card{
    background:var(--card);
    border:1.5px solid var(--gold-dim);
    border-radius:20px;
    box-shadow:0 10px 30px rgba(0,0,0,0.3);
    padding:30px;
    position:relative;
    overflow:hidden;
    transition:.3s;
    max-width:1200px;
    margin:0 auto;
}

.khata-card:hover{
    border-color:var(--gold-rich);
    box-shadow:0 15px 40px var(--glow);
}

.khata-card::before{
    content:'';
    position:absolute;
    top:0;
    left:0;
    width:100%;
    height:4px;
    background:linear-gradient(90deg, var(--gold-rich), var(--gold-dim));
    opacity:0.7;
}

/* ================ CARD TITLE ================ */
.card-title{
    font-family:'Playfair Display', serif;
    font-weight:700;
    font-size:24px;
    color:var(--gold-rich);
    margin-bottom:25px;
    padding-bottom:12px;
    border-bottom:2px solid var(--border);
    display:flex;
    align-items:center;
    gap:10px;
}

.card-title i{
    color:var(--gold-rich);
}

/* ================ CUSTOMER PROFILE CARD ================ */
.customer-profile{
    background:var(--hover);
    border-radius:16px;
    padding:25px;
    margin-bottom:25px;
    border:1px solid var(--border);
    position:relative;
}

.customer-avatar{
    width:80px;
    height:80px;
    background:linear-gradient(135deg, var(--gold-rich), var(--gold-dim));
    border-radius:50%;
    display:flex;
    align-items:center;
    justify-content:center;
    font-size:36px;
    color:#000000;
    border:3px solid var(--gold-rich);
}

.customer-name{
    font-size:24px;
    font-weight:700;
    color:var(--gold-rich);
    margin:0;
}

.customer-phone{
    color:var(--text-soft);
    font-size:14px;
    display:flex;
    align-items:center;
    gap:5px;
    margin-top:5px;
}

.customer-stats{
    display:flex;
    gap:20px;
    flex-wrap:wrap;
    margin-top:20px;
}

.stat-box{
    flex:1;
    min-width:120px;
    background:var(--card);
    border-radius:12px;
    padding:15px;
    border:1px solid var(--border);
    text-align:center;
}

.stat-label{
    font-size:12px;
    color:var(--text-soft);
    text-transform:uppercase;
    margin-bottom:5px;
}

.stat-value{
    font-size:24px;
    font-weight:700;
    color:var(--gold-rich);
}

.stat-value.outstanding{
    color:#dc3545;
}

.stat-value.paid{
    color:#198754;
}

.stat-value.billed{
    color:var(--gold-rich);
}

/* ================ SECTION TABS ================ */
.section-tabs{
    display:flex;
    gap:10px;
    margin-bottom:20px;
    border-bottom:1px solid var(--border);
    padding-bottom:10px;
}

.tab-btn{
    background:transparent;
    border:none;
    color:var(--text-soft);
    padding:8px 20px;
    border-radius:30px;
    font-weight:500;
    transition:.3s;
    cursor:pointer;
}

.tab-btn.active{
    background:var(--gold-dim);
    color:#000000;
}

.tab-btn:hover{
    color:var(--gold-rich);
}

/* ================ LEDGER TABLE ================ */
.table-container{
    overflow-x:auto;
    border-radius:12px;
    border:1px solid var(--border);
    margin-top:20px;
}

.ledger-table{
    width:100%;
    border-collapse:collapse;
    min-width:800px;
}

.ledger-table thead{
    background:linear-gradient(135deg, var(--gold-rich), var(--gold-dim));
}

.ledger-table thead th{
    color:#000000;
    font-weight:600;
    font-size:13px;
    padding:15px 12px;
    text-align:left;
    border:none;
}

.ledger-table tbody td{
    padding:15px 12px;
    color:var(--text);
    border-bottom:1px solid var(--border);
    background:var(--card);
    font-size:13px;
}

.ledger-table tbody tr:hover td{
    background:var(--hover);
}

.ledger-table tbody tr:last-child td{
    border-bottom:none;
}

/* Transaction badges */
.badge-bill{
    background:rgba(255, 193, 7, 0.2);
    color:#ffc107;
    padding:5px 10px;
    border-radius:20px;
    font-size:11px;
    font-weight:600;
}

.badge-payment{
    background:rgba(25, 135, 84, 0.2);
    color:#198754;
    padding:5px 10px;
    border-radius:20px;
    font-size:11px;
    font-weight:600;
}

/* Amount colors */
.amount-bill{
    color:#ffc107;
    font-weight:600;
}

.amount-payment{
    color:#198754;
    font-weight:600;
}

.balance-positive{
    color:#dc3545;
    font-weight:600;
}

.balance-zero{
    color:#198754;
    font-weight:600;
}

/* Payment method icon */
.payment-icon{
    width:30px;
    height:30px;
    background:var(--hover);
    border-radius:50%;
    display:inline-flex;
    align-items:center;
    justify-content:center;
    margin-right:5px;
}

/* ================ PAGINATION ================ */
.pagination{
    margin-top:20px;
    display:flex;
    justify-content:flex-end;
}

.pagination .page-link{
    background:var(--hover);
    border:1px solid var(--border);
    color:var(--text);
}

.pagination .page-item.active .page-link{
    background:var(--gold-rich);
    border-color:var(--gold-rich);
    color:#000000;
}

/* ================ ACTION BUTTONS ================ */
.action-buttons{
    margin-top:25px;
    display:flex;
    gap:15px;
    justify-content:flex-end;
}

.btn-back{
    background:transparent;
    border:1.5px solid var(--text-soft);
    color:var(--text-soft);
    border-radius:40px;
    padding:10px 25px;
    font-weight:500;
    transition:.3s;
    text-decoration:none;
    display:inline-flex;
    align-items:center;
    gap:8px;
}

.btn-back:hover{
    border-color:var(--gold-rich);
    color:var(--gold-rich);
}

.btn-payment{
    background:linear-gradient(135deg, #198754, #0b5e42);
    color:white;
    border:none;
    border-radius:40px;
    padding:10px 30px;
    font-weight:600;
    transition:.3s;
    text-decoration:none;
    display:inline-flex;
    align-items:center;
    gap:8px;
    cursor:pointer;
}

.btn-payment:hover{
    transform:translateY(-2px);
    box-shadow:0 8px 20px rgba(25,135,84,0.3);
}

/* Payment Modal */
.modal{
    display:none;
    position:fixed;
    top:0;
    left:0;
    width:100%;
    height:100%;
    background:rgba(0,0,0,0.5);
    z-index:1000;
    align-items:center;
    justify-content:center;
}

.modal.active{
    display:flex;
}

.modal-content{
    background:var(--card);
    border-radius:20px;
    padding:30px;
    max-width:400px;
    width:90%;
    border:1.5px solid var(--gold-rich);
}

.modal-title{
    font-size:18px;
    color:var(--gold-rich);
    margin-bottom:20px;
}

/* ================ RESPONSIVE ================ */
@media (max-width:768px){
    .khata-card{
        padding:20px;
    }
    
    .customer-profile{
        padding:15px;
    }
    
    .customer-avatar{
        width:60px;
        height:60px;
        font-size:28px;
    }
    
    .customer-name{
        font-size:20px;
    }
    
    .stat-box{
        min-width:calc(50% - 10px);
    }
    
    .action-buttons{
        flex-direction:column;
    }
    
    .btn-back,
    .btn-payment{
        width:100%;
        justify-content:center;
    }
}
</style>

<div class="khata-wrapper">
    <div class="khata-card">

        <!-- Card Title -->
        <h4 class="card-title">
            <i class="fa fa-book"></i>
            Customer Khata - Ledger
        </h4>

        <!-- Customer Profile -->
        <div class="customer-profile">
            <div class="d-flex align-items-center gap-4 flex-wrap">
                <div class="customer-avatar">
                    <i class="fa fa-user"></i>
                </div>
                <div>
                    <h2 class="customer-name">{{ $customer->name }}</h2>
                    <div class="customer-phone">
                        <i class="fa fa-phone"></i> {{ $customer->phone }}
                        @if($customer->email)
                            <i class="fa fa-envelope ms-3"></i> {{ $customer->email }}
                        @endif
                    </div>
                    @if($customer->address)
                        <div style="color: var(--text-soft); font-size:12px; margin-top:5px;">
                            <i class="fa fa-map-marker"></i> {{ $customer->address }}
                        </div>
                    @endif
                </div>
            </div>

            <!-- Customer Stats -->
            <div class="customer-stats">
                <div class="stat-box">
                    <div class="stat-label">Total Visits</div>
                    <div class="stat-value">{{ $customer->total_visits ?? 0 }}</div>
                </div>
                <div class="stat-box">
                    <div class="stat-label">Total Billed</div>
                    <div class="stat-value billed">₹{{ number_format($customer->total_billed ?? 0, 2) }}</div>
                </div>
                <div class="stat-box">
                    <div class="stat-label">Total Paid</div>
                    <div class="stat-value paid">₹{{ number_format($customer->total_paid ?? 0, 2) }}</div>
                </div>
                <div class="stat-box">
                    <div class="stat-label">Outstanding</div>
                    <div class="stat-value outstanding">₹{{ number_format($customer->total_outstanding ?? 0, 2) }}</div>
                </div>
                <div class="stat-box">
                    <div class="stat-label">Last Visit</div>
                    <div class="stat-value">{{ $customer->last_visit ? \Carbon\Carbon::parse($customer->last_visit)->format('d M Y') : 'N/A' }}</div>
                </div>
            </div>
        </div>

        <!-- Tabs -->
        <div class="section-tabs">
            <button class="tab-btn active" onclick="showTab('all')">All Transactions</button>
            <button class="tab-btn" onclick="showTab('bills')">Bills Only</button>
            <button class="tab-btn" onclick="showTab('payments')">Payments Only</button>
        </div>

        <!-- Ledger Table -->
        <div class="table-container">
            <table class="ledger-table">
                <thead>
                    <tr>
                        <th>Date & Time</th>
                        <th>Transaction</th>
                        <th>Bill No.</th>
                        <th>Amount</th>
                        <th>Payment Method</th>
                        <th>Balance</th>
                        <th>Notes</th>
                    </tr>
                </thead>
                <tbody id="ledger-body">
                    @forelse($ledgers as $ledger)
                    <tr class="transaction-row" data-type="{{ $ledger->transaction_type }}">
                        <td>
                            <i class="fa fa-calendar" style="color:var(--gold-rich); font-size:11px;"></i>
                            {{ $ledger->created_at->format('d M Y') }}
                            <br>
                            <small style="color:var(--text-soft);">{{ $ledger->created_at->format('h:i A') }}</small>
                        </td>
                        <td>
                            @if($ledger->transaction_type == 'bill')
                                <span class="badge-bill">
                                    <i class="fa fa-file-invoice"></i> New Bill
                                </span>
                            @elseif($ledger->transaction_type == 'payment')
                                <span class="badge-payment">
                                    <i class="fa fa-check-circle"></i> Payment
                                </span>
                            @endif
                        </td>
                        <td>
                            @if($ledger->bill)
                                <a href="{{ route('billing.show', $ledger->bill_id) }}" style="color:var(--gold-rich); text-decoration:none;">
                                    {{ $ledger->bill->bill_number }}
                                </a>
                            @else
                                --
                            @endif
                        </td>
                        <td>
                            @if($ledger->transaction_type == 'bill')
                                <span class="amount-bill">+ ₹{{ number_format($ledger->amount, 2) }}</span>
                            @else
                                <span class="amount-payment">- ₹{{ number_format($ledger->amount, 2) }}</span>
                            @endif
                        </td>
                        <td>
                            @if($ledger->payment_method)
                                <span class="payment-icon">
                                    @if($ledger->payment_method == 'cash') 💵
                                    @elseif($ledger->payment_method == 'upi') 📱
                                    @elseif($ledger->payment_method == 'card') 💳
                                    @else 💰
                                    @endif
                                </span>
                                {{ ucfirst($ledger->payment_method) }}
                            @else
                                --
                            @endif
                        </td>
                        <td>
                            @if($ledger->new_balance > 0)
                                <span class="balance-positive">₹{{ number_format($ledger->new_balance, 2) }}</span>
                            @else
                                <span class="balance-zero">₹0.00</span>
                            @endif
                        </td>
                        <td>
                            <small style="color:var(--text-soft);">{{ $ledger->notes ?? '--' }}</small>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="7" style="text-align:center; padding:40px; color:var(--text-soft);">
                            <i class="fa fa-inbox" style="font-size:48px; opacity:0.3;"></i>
                            <p style="margin-top:10px;">No transactions found</p>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <!-- Pagination -->
        <div class="pagination">
            {{ $bills->links() }}
        </div>

        <!-- Action Buttons -->
        <div class="action-buttons">
            <a href="{{ route('billing.create') }}" class="btn-back">
                <i class="fa fa-arrow-left"></i>
                Back to Billing
            </a>
            
            @if($customer->total_outstanding > 0)
            <button class="btn-payment" onclick="openPaymentModal()">
                <i class="fa fa-money-bill"></i>
                Collect Payment (₹{{ number_format($customer->total_outstanding, 2) }})
            </button>
            @endif
        </div>

    </div>
</div>

<!-- Payment Collection Modal -->
<div id="paymentModal" class="modal">
    <div class="modal-content">
        <h4 class="modal-title">
            <i class="fa fa-money-bill"></i>
            Collect Payment from {{ $customer->name }}
        </h4>

        <form action="{{ route('customer.collect-payment', $customer->id) }}" method="POST">
            @csrf
            
            <div style="margin-bottom:15px;">
                <label style="color:var(--text-soft); font-size:13px;">Outstanding Amount</label>
                <div style="font-size:24px; font-weight:700; color:#dc3545;">₹{{ number_format($customer->total_outstanding, 2) }}</div>
            </div>

            <div style="margin-bottom:15px;">
                <label style="color:var(--text-soft); font-size:13px;">Payment Amount</label>
                <input type="number" 
                       name="amount" 
                       class="form-control" 
                       max="{{ $customer->total_outstanding }}"
                       min="1"
                       step="0.01"
                       required
                       placeholder="Enter amount">
            </div>

            <div style="margin-bottom:20px;">
                <label style="color:var(--text-soft); font-size:13px;">Payment Method</label>
                <select name="payment_method" class="form-select" required>
                    <option value="">Select method</option>
                    <option value="cash">💵 Cash</option>
                    <option value="upi">📱 UPI</option>
                    <option value="card">💳 Card</option>
                </select>
            </div>

            <div style="display:flex; gap:10px;">
                <button type="submit" class="btn-payment" style="flex:1;">
                    <i class="fa fa-check"></i> Process Payment
                </button>
                <button type="button" class="btn-back" onclick="closePaymentModal()" style="flex:0.5;">
                    Cancel
                </button>
            </div>
        </form>
    </div>
</div>

<!-- JavaScript -->
<script>
// Tab functionality
function showTab(type) {
    let rows = document.querySelectorAll('.transaction-row');
    let tabs = document.querySelectorAll('.tab-btn');
    
    tabs.forEach(tab => tab.classList.remove('active'));
    event.target.classList.add('active');
    
    rows.forEach(row => {
        if(type == 'all') {
            row.style.display = '';
        } else if(type == 'bills') {
            row.style.display = row.dataset.type == 'bill' ? '' : 'none';
        } else if(type == 'payments') {
            row.style.display = row.dataset.type == 'payment' ? '' : 'none';
        }
    });
}

// Payment Modal functions
function openPaymentModal() {
    document.getElementById('paymentModal').classList.add('active');
}

function closePaymentModal() {
    document.getElementById('paymentModal').classList.remove('active');
}

// Close modal when clicking outside
window.onclick = function(event) {
    let modal = document.getElementById('paymentModal');
    if(event.target == modal) {
        modal.classList.remove('active');
    }
}
</script>

@endsection