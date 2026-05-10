@extends('salon.layouts.app')

@section('content')

<style>
/* ================ BILLING INDEX PAGE - DARK GOLD THEME ================ */

/* ================ PAGE CONTAINER ================ */
.container-fluid{
    padding:25px 20px;
}

/* ================ MAIN CARD ================ */
.main-card{
    background:var(--card);
    border:1.5px solid var(--gold-dim);
    border-radius:20px;
    box-shadow:0 10px 30px rgba(0,0,0,0.3);
    overflow:hidden;
    transition:.3s;
    position:relative;
}

.main-card:hover{
    border-color:var(--gold-rich);
    box-shadow:0 1px 40px var(--glow);
}

.main-card::before{
    content:'';
    position:absolute;
    top:0;
    left:0;
    width:100%;
    height:4px;
    background:linear-gradient(90deg, var(--gold-rich), var(--gold-dim));
    opacity:0.7;
}

/* ================ CARD HEADER ================ */
.card-header{
    background:var(--card) !important;
    border-bottom:1.5px solid var(--border);
    padding:25px 25px 15px 25px;
}

.card-header h4{
    font-family:'Playfair Display', serif;
    font-weight:700;
    font-size:18px;
    color:var(--gold-rich);
    margin:0;
    display:flex;
    align-items:center;
    gap:10px;
}

.card-header h4 i{
    color:var(--gold-rich);
}

/* ================ CREATE BUTTON ================ */
.create-btn{
    background:linear-gradient(135deg, var(--gold-rich), var(--gold-glow));
    color:#000000;
    padding:12px 15px;
    border-radius:40px;
    font-weight:600;
    font-size:14px;
    border:none;
    text-decoration:none;
    display:inline-flex;
    align-items:center;
    gap:8px;
    transition:.3s;
    box-shadow:0 8px 20px var(--glow);
    border:1px solid var(--gold-rich);
}

.create-btn:hover{
    transform:translateY(-3px);
    box-shadow:0 12px 25px var(--glow);
    background:linear-gradient(135deg, var(--gold-glow), var(--gold-rich));
    color:#000000;
}

/* ================ FILTER SECTION ================ */
.filter-section{
    background:var(--hover);
    border-radius:16px;
    padding:15px;
    margin-top:15px;
    border:1px solid var(--border);
}

.filter-label{
    color:var(--text-soft);
    font-size:13px;
    font-weight:500;
    margin-bottom:5px;
    display:block;
}

/* ================ FORM CONTROLS ================ */
.form-control,
.form-select{
    background:var(--bg);
    border:1.5px solid var(--border);
    border-radius:12px;
    color:var(--text);
    font-size:14px;
    padding:10px 15px;
    transition:.3s;
    height:45px;
    width:100%;
}

.form-control:focus,
.form-select:focus{
    border-color:var(--gold-rich);
    box-shadow:0 0 0 4px var(--glow);
    outline:none;
}

.form-control::placeholder{
    color:var(--text-soft);
    opacity:0.6;
}

/* ================ FILTER BUTTONS ================ */
.btn-filter{
    background:var(--gold-rich);
    color:#000000;
    border:none;
    border-radius:40px;
    padding:10px 16px;
    font-weight:600;
    font-size:14px;
    transition:.3s;
    display:inline-flex;
    align-items:center;
    gap:8px;
    border:1px solid var(--gold-rich);
    height:25px;
}

.btn-filter:hover{
    background:var(--gold-glow);
    transform:translateY(-2px);
    box-shadow:0 8px 20px var(--glow);
}

.btn-reset{
    background:transparent;
    color:var(--text-soft);
    border:1.5px solid var(--gold-dim);
    border-radius:40px;
    padding:10px 25px;
    font-weight:600;
    font-size:14px;
    transition:.3s;
    display:inline-flex;
    align-items:center;
    gap:8px;
    height:22px;
}

.btn-reset:hover{
    border-color:var(--gold-rich);
    color:var(--gold-rich);
    transform:translateY(-2px);
    box-shadow:0 5px 15px var(--glow);
}

/* ================ TABLE CONTAINER ================ */
.table-container{
    padding:0 25px 25px 25px;
    overflow-x:auto;
}

/* ================ TABLE ================ */
.table{
    width:100%;
    border-collapse:collapse;
    min-width:1200px;
}

.table thead{
    background:linear-gradient(135deg, var(--gold-rich), var(--gold-dim));
}

.table thead th{
    color:#000000;
    font-weight:600;
    font-size:12px;
    padding:16px 12px;
    white-space:nowrap;
    border:none;
}

.table tbody td{
    padding:14px 8px;
    color:var(--text);
    border-bottom:1px solid var(--border);
    background:var(--card);
    vertical-align:middle;
}

/* Alternate row shading */
.table tbody tr:nth-child(even) td{
    background:var(--hover);
}

/* Row hover */
.table tbody tr:hover td{
    background:var(--gold-dim) !important;
}

/* ================ INVOICE NUMBER ================ */
.invoice-number{
    font-weight:600;
    color:var(--gold-rich);
    font-size:10px;
}

/* ================ CUSTOMER INFO ================ */
.customer-info{
    display:flex;
    flex-direction:column;
    gap:2px;
}

.customer-name{
    font-weight:600;
    color:var(--text);
    font-size:14px;
}

.customer-phone{
    color:var(--text-soft);
    font-size:12px;
}

.customer-phone i{
    color:var(--gold-rich);
    font-size:11px;
    margin-right:4px;
}

/* ================ SERVICE ITEMS ================ */
.service-item{
    background:var(--hover);
    border:1px solid var(--border);
    border-radius:8px;
    padding:8px;
    margin-bottom:5px;
    transition:.2s;
}

.service-item:hover{
    border-color:var(--gold-rich);
}

.service-name{
    font-weight:600;
    color:var(--gold-rich);
    font-size:10px;
}

.staff-name{
    color:var(--text-soft);
    font-size:10px;
    display:flex;
    align-items:center;
    gap:4px;
    margin-top:2px;
}

.staff-name i{
    color:var(--gold-rich);
}

/* ================ DATE ================ */
.bill-date{
    color:var(--text);
    font-size:11px;
    display:flex;
    align-items:center;
    gap:6px;
}

.bill-date i{
    color:var(--gold-rich);
}

/* ================ AMOUNT ================ */
.amount{
    font-weight:700;
    color:var(--gold-rich);
    font-size:12px;
}

/* ================ STATUS BADGES ================ */
.badge{
    padding:6px 14px;
    border-radius:30px;
    font-size:12px;
    font-weight:600;
    display:inline-block;
}

.badge.bg-success{
    background:rgba(25, 135, 84, 0.2) !important;
    color:#198754;
    border:1px solid #198754;
}

.badge.bg-warning{
    background:rgba(255, 193, 7, 0.2) !important;
    color:#ffc107;
    border:1px solid #ffc107;
}

/* Dark mode adjustments for badges */
body:not(.light) .badge.bg-success{
    background:rgba(25, 135, 84, 0.3) !important;
    color:#6fcf97;
}

body:not(.light) .badge.bg-warning{
    background:rgba(255, 193, 7, 0.3) !important;
    color:#ffe083;
}

/* ================ ACTION BUTTONS ================ */
.action-buttons{
    display:flex;
    gap:8px;
    justify-content:center;
}

.btn-icon{
    width:35px;
    height:35px;
    border-radius:10px;
    display:flex;
    align-items:center;
    justify-content:center;
    transition:.3s;
    border:1.5px solid transparent;
}

.btn-view{
    background:transparent;
    border-color:var(--gold-dim);
    color:var(--gold-rich);
}

.btn-view:hover{
    background:var(--gold-rich);
    color:#000000;
    transform:translateY(-2px);
    box-shadow:0 5px 15px var(--glow);
}

.btn-delete{
    background:transparent;
    border-color:#ff6b6b;
    color:#ff6b6b;
}

.btn-delete:hover{
    background:#ff6b6b;
    color:#000000;
    transform:translateY(-2px);
    box-shadow:0 5px 15px rgba(255,107,107,0.3);
}

/* ================ EMPTY STATE ================ */
.empty-state{
    text-align:center;
    padding:60px 20px;
    background:var(--hover);
    border-radius:16px;
    border:2px dashed var(--gold-dim);
}

.empty-state i{
    font-size:30px;
    color:var(--gold-rich);
    margin-bottom:20px;
    opacity:0.7;
}

.empty-state h5{
    font-family:'Playfair Display', serif;
    color:var(--gold-rich);
    margin-bottom:10px;
    font-size:20px;
}

.empty-state p{
    color:var(--text-soft);
    margin-bottom:25px;
}

/* ================ PAGINATION ================ */
.card-footer{
    background:var(--card) !important;
    border-top:1.5px solid var(--border);
    padding:20px 25px;
}

.pagination-info{
    color:var(--text-soft);
    font-size:14px;
}

.pagination{
    margin:0;
    gap:5px;
}

.pagination .page-link{
    background:var(--card);
    border:1.5px solid var(--gold-dim);
    color:var(--text-soft);
    border-radius:10px;
    padding:8px 14px;
    transition:.3s;
}

.pagination .page-item.active .page-link{
    background:var(--gold-rich);
    border-color:var(--gold-rich);
    color:#000000;
    font-weight:600;
}

.pagination .page-link:hover{
    background:var(--gold-dim);
    border-color:var(--gold-rich);
    color:var(--text);
    transform:translateY(-2px);
    box-shadow:0 5px 12px var(--glow);
}

/* ================ RESPONSIVE ================ */
@media (max-width: 768px) {
    .container-fluid{
        padding:15px;
    }
    
    .card-header{
        padding:20px 20px 10px 20px;
    }
    
    .card-header h4{
        font-size:20px;
    }
    
    .create-btn{
        width:100%;
        justify-content:center;
    }
    
    .filter-section{
        padding:15px;
    }
    
    .table-container{
        padding:0 15px 15px 15px;
    }
    
    .btn-filter,
    .btn-reset{
        width:100%;
        justify-content:center;
    }
    
    .card-footer{
        padding:15px;
    }
    
    .pagination-info{
        text-align:center;
        margin-bottom:10px;
    }
}

/* ================ LIGHT MODE ADJUSTMENTS ================ */
body.light .main-card{
    box-shadow:0 8px 20px rgba(0,0,0,0.05);
}

body.light .form-control,
body.light .form-select{
    background:#ffffff;
    border-color:#E5E0D8;
    color:#1A1A1A;
}

body.light .table thead{
    background:#f0f0f0;
}

body.light .table thead th{
    color:#1A1A1A;
}

body.light .service-item{
    background:#f8f8f8;
}

body.light .empty-state{
    background:#f8f8f8;
}
</style>

<div class="container-fluid">
    <!-- Main Card -->
    <div class="main-card">

        <!-- Card Header -->
        <div class="card-header">
            <div class="d-flex justify-content-between align-items-center flex-wrap gap-3 mb-3">
                <h4>
                    <i class="fa fa-file-invoice"></i> 
                    Billing Records
                </h4>

                <a href="{{ route('billing.create') }}" class="create-btn">
                    <i class="fa fa-plus-circle"></i> 
                    Create New Bill
                </a>
            </div>

            <!-- Filter Section -->
            <div class="filter-section">
                <div class="row g-3">
                    <div class="col-lg-3 col-md-6">
                        <span class="filter-label">🔍 Search</span>
                        <input type="text" 
                               id="searchInput"
                               class="form-control"
                               placeholder="Customer / Invoice...">
                    </div>

                    <div class="col-lg-2 col-md-6">
                        <span class="filter-label">📅 From Date</span>
                        <input type="date" id="fromDate" class="form-control">
                    </div>

                    <div class="col-lg-2 col-md-6">
                        <span class="filter-label">📅 To Date</span>
                        <input type="date" id="toDate" class="form-control">
                    </div>

                    <div class="col-lg-2 col-md-6">
                        <span class="filter-label">📊 Status</span>
                        <select id="statusFilter" class="form-select">
                            <option value="">All Status</option>
                            <option value="paid">Paid</option>
                            <option value="pending">Pending</option>
                        </select>
                    </div>

                    <div class="col-lg-3 col-md-12">
                        <span class="filter-label"> </span>
                        <div class="d-flex gap-2">
                            <button onclick="filterTable()" class="btn-filter flex-fill">
                                <i class="fa fa-search"></i> Filter
                            </button>
                            <button onclick="resetFilters()" class="btn-reset flex-fill">
                                <i class="fa fa-undo"></i> Reset
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Table Container -->
        <div class="table-container">
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Invoice</th>
                            <th>Customer</th>
                            <th>Services</th>
                            <th>Date</th>
                            <th>Paid</th>
<th>Remaining</th>
                            <th>Total</th>
                            <th>Status</th>
                            <th class="text-center">Actions</th>
                        </tr>
                    </thead>

                    <tbody id="billingTable">
                        @forelse($bills as $index => $bill)
                        <tr data-date="{{ $bill->bill_date }}"
                            data-status="{{ $bill->payment_status }}">
                            
                            <td>
                                <span style="color:var(--gold-rich); font-weight:600;">
                                    {{ $bills->firstItem() + $index }}
                                </span>
                            </td>

                            <td>
                                <span class="invoice-number">
                                    <i class="fa fa-receipt me-1"></i>
                                    {{ $bill->bill_number }}
                                </span>
                            </td>

                            <td>
                                <div class="customer-info">
                                    <span class="customer-name">
                                        <i class="fa fa-user me-1"></i>
                                        {{ $bill->customer_name }}
                                    </span>
                                    <span class="customer-phone">
                                        <i class="fa fa-phone"></i>
                                        {{ $bill->customer_phone }}
                                    </span>
                                </div>
                            </td>

                            <td style="min-width:250px;">
                                @foreach($bill->items as $item)
                                <div class="service-item">
                                    <div class="service-name">
                                        <i class="fa fa-scissors me-1"></i>
                                        {{ $item->service->name ?? '-' }}
                                    </div>
                                    <div class="staff-name">
                                        <i class="fa fa-user-tie"></i>
                                        {{ $item->staff->name ?? '-' }}
                                    </div>
                                </div>
                                @endforeach
                            </td>

                            <td>
                                <div class="bill-date">
                                    <i class="fa fa-calendar"></i>
                                    {{ \Carbon\Carbon::parse($bill->bill_date)->format('d M, Y') }}
                                </div>
                            </td>

                            <td>
                                <span class="amount">
                                    ₹{{ number_format($bill->total_amount, 2) }}
                                </span>
                            </td>
<td>
<span style="color:#6fcf97;font-weight:600;">
₹{{ number_format($bill->paid_amount, 2) }}
</span>
</td>

<td>
<span style="color:#ff6b6b;font-weight:600;">
₹{{ number_format($bill->remaining_amount, 2) }}
</span>
</td>
                            <td>
                              @if($bill->remaining_amount == 0)
                                    <span class="badge bg-success">
                                        <i class="fa fa-check-circle me-1"></i> Paid
                                    </span>
                                @else
                                    <span class="badge bg-warning">
                                        <i class="fa fa-clock me-1"></i> Pending
                                    </span>
                                @endif
                            </td>

                            <td>
                                <div class="action-buttons">
                                    <a href="{{ route('billing.show', $bill->id) }}" 
                                       class="btn-icon btn-view"
                                       title="View Details">
                                        <i class="fa fa-eye"></i>
                                    </a>

                                    <form action="{{ route('billing.destroy',$bill) }}" 
      method="POST"
      onsubmit="return confirm('Are you sure you want to delete this bill?');">

    @csrf
    @method('DELETE')

    <button type="submit" class="btn-icon btn-delete">
        <i class="fa fa-trash"></i>
    </button>

</form>
                                </div>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="8" class="text-center py-5">
                                <div class="empty-state">
                                    <i class="fa fa-file-invoice"></i>
                                    <h5>No Billing Records Found</h5>
                                    <p>Start by creating your first invoice</p>
                                    <a href="{{ route('billing.create') }}" class="create-btn" style="display:inline-block;">
                                        <i class="fa fa-plus-circle"></i> Create New Bill
                                    </a>
                                </div>
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Pagination -->
        @if($bills->hasPages())
        <div class="card-footer">
            <div class="d-flex justify-content-between align-items-center flex-wrap gap-3">
                <div class="pagination-info">
                    <i class="fa fa-file-text me-1"></i>
                    Showing {{ $bills->firstItem() }} to {{ $bills->lastItem() }} of {{ $bills->total() }} records
                </div>
                <div>
                    {{ $bills->links('pagination::bootstrap-5') }}
                </div>
            </div>
        </div>
        @endif

    </div>
</div>

<!-- Filter Script -->
<script>
function filterTable() {
    const searchInput = document.getElementById('searchInput').value.toLowerCase();
    const fromDate = document.getElementById('fromDate').value;
    const toDate = document.getElementById('toDate').value;
    const status = document.getElementById('statusFilter').value;
    const rows = document.querySelectorAll('#billingTable tr');
    
    rows.forEach(row => {
        // Skip empty state row
        if(row.querySelector('.empty-state')) return;
        
        const text = row.innerText.toLowerCase();
        const date = row.getAttribute('data-date');
        const rowStatus = row.getAttribute('data-status');
        
        let show = true;
        
        // Search filter
        if(searchInput && !text.includes(searchInput)) {
            show = false;
        }
        
        // Status filter
        if(status && rowStatus !== status) {
            show = false;
        }
        
        // Date filter
        if(fromDate && date < fromDate) {
            show = false;
        }
        if(toDate && date > toDate) {
            show = false;
        }
        
        row.style.display = show ? '' : 'none';
    });
}

function resetFilters() {
    document.getElementById('searchInput').value = '';
    document.getElementById('fromDate').value = '';
    document.getElementById('toDate').value = '';
    document.getElementById('statusFilter').value = '';
    filterTable();
}

// Real-time search
document.getElementById('searchInput').addEventListener('keyup', filterTable);
</script>

@endsection