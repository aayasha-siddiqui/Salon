@extends('salon.layouts.app')

@section('content')

<style>
/* ================ APPOINTMENTS INDEX PAGE - DARK GOLD THEME ================ */

/* ================ PAGE CONTAINER ================ */
.container-py-4{
    padding:25px 20px;
}

/* ================ PAGE HEADER ================ */
.page-header{
    display:flex;
    justify-content:space-between;
    align-items:center;
    margin-bottom:25px;
    flex-wrap:wrap;
    gap:15px;
}

.page-header h3{
    font-family:'Playfair Display', serif;
    font-weight:700;
    font-size:26px;
    color:var(--gold-rich);
    margin:0;
    position:relative;
    padding-bottom:8px;
}

.page-header h3::after{
    content:'';
    position:absolute;
    bottom:0;
    left:0;
    width:60px;
    height:3px;
    background:linear-gradient(90deg, var(--gold-rich), var(--gold-dim));
    border-radius:2px;
}

/* ================ ADD BUTTON ================ */
.add-btn{
    background:linear-gradient(135deg, var(--gold-rich), var(--gold-glow));
    color:#000000;
    padding:12px 28px;
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

.add-btn:hover{
    transform:translateY(-3px);
    box-shadow:0 12px 25px var(--glow);
    background:linear-gradient(135deg, var(--gold-glow), var(--gold-rich));
}

.add-btn i{
    font-size:16px;
}

/* ================ CARD BOX ================ */
.card-box{
    background:var(--card);
    padding:25px;
    border-radius:20px;
    box-shadow:0 10px 30px rgba(0,0,0,0.3);
    border:1.5px solid var(--gold-dim);
    transition:.3s;
    position:relative;
    overflow:hidden;
}

.card-box:hover{
    border-color:var(--gold-rich);
    box-shadow:0 15px 40px var(--glow);
}

.card-box::before{
    content:'';
    position:absolute;
    top:0;
    left:0;
    width:100%;
    height:4px;
    background:linear-gradient(90deg, var(--gold-rich), var(--gold-dim));
    opacity:0.7;
}

/* ================ FILTER BAR ================ */
.filter-bar{
    display:flex;
    gap:15px;
    margin-bottom:25px;
    flex-wrap:wrap;
}

.search,
.filter{
    border:1.5px solid var(--border);
    border-radius:12px;
    padding:12px 16px;
    background:var(--bg);
    color:var(--text);  /* Text color from theme */
    font-size:14px;
    transition:.3s;
    box-shadow:0 2px 8px rgba(0,0,0,0.1);
}

.search{
    width:280px;
    max-width:100%;
}

.filter{
    width:180px;
    max-width:100%;
    cursor:pointer;
}

.search:focus,
.filter:focus{
    border-color:var(--gold-rich);
    box-shadow:0 0 0 4px var(--glow);
    outline:none;
}

.search::placeholder{
    color:var(--text-soft);
    opacity:0.7;
}

/* ================ TABLE CONTAINER ================ */
.table-container{
    width:100%;
    overflow-x:auto;
    -webkit-overflow-scrolling:touch;
    margin-bottom:10px;
    border-radius:12px;
}

/* ================ TABLE ================ */
.table{
    width:100%;
    border-collapse:collapse;
    min-width:900px;
}

.table thead{
    background:linear-gradient(135deg, var(--gold-rich), var(--gold-dim));
    color:#000000;  /* Black text on gold background - always visible */
}

.table th{
    font-size:14px;
    font-weight:600;
    padding:16px 14px;
    text-align:left;
    white-space:nowrap;
    border:none;
}

.table td{
    padding:16px 14px;
    vertical-align:middle;
    color:var(--text);  /* Fixed: using theme text color */
    border-bottom:1px solid var(--border);
    white-space:nowrap;
    background:var(--card);  /* Match card background */
}

/* Alternate row shading for better readability */
.table tbody tr:nth-child(even) td{
    background:var(--hover);  /* Slightly different background for alternate rows */
}

/* ================ SERVICE BADGE ================ */
.service-badge{
    background:var(--gold-dim);
    color:var(--text);  /* White in dark mode, dark in light mode */
    padding:6px 12px;
    border-radius:30px;
    font-size:12px;
    font-weight:500;
    margin-right:6px;
    margin-bottom:4px;
    display:inline-block;
    border:1px solid var(--gold-rich);
    transition:.2s;
}

.service-badge:hover{
    background:var(--gold-rich);
    color:#000000;  /* Black on hover */
    transform:translateY(-2px);
}

.service-badge i{
    color:inherit;  /* Icon inherits text color */
}

/* ================ STATUS BADGES ================ */
.status{
    padding:6px 14px;
    border-radius:30px;
    font-size:12px;
    font-weight:600;
    display:inline-block;
    text-transform:capitalize;
}

.status.booked{
    background:rgba(13, 110, 253, 0.2);
    color:#0d6efd;
    border:1px solid #0d6efd;
}

.status.completed{
    background:rgba(25, 135, 84, 0.2);
    color:#198754;
    border:1px solid #198754;
}

.status.cancelled{
    background:rgba(220, 53, 69, 0.2);
    color:#dc3545;
    border:1px solid #dc3545;
}

.status.pending{
    background:rgba(255, 193, 7, 0.2);
    color:#ffc107;
    border:1px solid #ffc107;
}

/* Dark mode specific status adjustments */
body:not(.light) .status.booked{
    background:rgba(13, 110, 253, 0.3);
    color:#8bb9fe;
}

body:not(.light) .status.completed{
    background:rgba(25, 135, 84, 0.3);
    color:#6fcf97;
}

body:not(.light) .status.cancelled{
    background:rgba(220, 53, 69, 0.3);
    color:#ff8a8a;
}

body:not(.light) .status.pending{
    background:rgba(255, 193, 7, 0.3);
    color:#ffe083;
}

/* ================ AMOUNT ================ */
.amount{
    font-weight:700;
    color:var(--gold-rich);
    font-size:15px;
}

/* ================ ROW HOVER ================ */
.table tbody tr{
    transition:.2s;
}

.table tbody tr:hover td{
    background:var(--gold-dim) !important;
    color:var(--text);  /* Keep text readable */
}

/* Icons in table */
.table td i{
    color:var(--gold-rich);
}

/* ================ EMPTY STATE ================ */
.empty-state{
    text-align:center;
    padding:40px;
    color:var(--text);
    background:var(--card);
    border-radius:16px;
    border:1px dashed var(--gold-rich);
}

.empty-state i{
    font-size:48px;
    color:var(--gold-rich);
    margin-bottom:15px;
    opacity:0.7;
}

.empty-state h5{
    font-family:'Playfair Display', serif;
    color:var(--gold-rich);
    margin-bottom:10px;
}

.empty-state p{
    color:var(--text-soft);
}

/* ================ LIGHT MODE ADJUSTMENTS ================ */
body.light .card-box{
    box-shadow:0 8px 20px rgba(0,0,0,0.05);
}

body.light .search,
body.light .filter{
    background:#ffffff;
    border-color:#E5E0D8;
    color:#1A1A1A;
}

body.light .table thead{
    background:#f0f0f0;
    color:#1A1A1A;
}

body.light .service-badge{
    background:#f0e9d8;
    color:#8B6B3E;
}

body.light .table td{
    background:#ffffff;
    color:#1A1A1A;
}

body.light .table tbody tr:nth-child(even) td{
    background:#f9f9f9;
}

body.light .table tbody tr:hover td{
    background:#f0e9d8 !important;
    color:#1A1A1A;
}

/* ================ RESPONSIVE ================ */
@media (max-width:768px){
    .page-header h3{
        font-size:22px;
    }
    
    .add-btn{
        width:100%;
        justify-content:center;
    }
    
    .filter-bar{
        flex-direction:column;
        gap:10px;
    }
    
    .search,
    .filter{
        width:100%;
    }
    
    .card-box{
        padding:18px;
    }
    
    .table th,
    .table td{
        padding:12px 10px;
        font-size:13px;
    }
}

/* ================ PAGINATION ================ */
.pagination{
    margin-top:25px;
    display:flex;
    justify-content:center;
    gap:5px;
}

.pagination .page-link{
    background:var(--card);
    border:1.5px solid var(--gold-dim);
    color:var(--text);
    border-radius:10px;
    padding:8px 14px;
    transition:.3s;
    text-decoration:none;
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

/* ================ UTILITY CLASSES ================ */
.me-2{
    margin-right:8px;
}

.py-4{
    padding-top:20px;
    padding-bottom:20px;
}

.mb-4{
    margin-bottom:20px;
}

.mt-4{
    margin-top:20px;
}

/* Alert success */
.alert-success{
    background:var(--card);
    border-left:4px solid #198754;
    border-radius:12px;
    padding:16px 20px;
    color:var(--text);
    font-weight:500;
    box-shadow:0 4px 15px var(--glow);
    border:1px solid var(--gold-dim);
    margin-bottom:20px;
}
</style>

<div class="container py-4">

    <!-- Page Header -->
    <div class="page-header">
        <h3>
            <i class="fa fa-calendar-check me-2"></i>
            Appointments
        </h3>

        <a href="{{ route('appointments.create') }}" class="add-btn">
            <i class="fa fa-plus-circle"></i>
            New Appointment
        </a>
    </div>

    <!-- Success Message -->
    @if(session('success'))
    <div class="alert-success">
        <i class="fa fa-check-circle me-2"></i>
        {{ session('success') }}
    </div>
    @endif

    <!-- Main Card -->
    <div class="card-box">

        <!-- Filter Bar -->
        <div class="filter-bar">
            <input type="text" 
                   id="search" 
                   class="search"
                   placeholder="🔍 Search by customer name...">

            <select id="statusFilter" class="filter">
                <option value="">📊 All Status</option>
                <option value="booked">📅 Booked</option>
                <option value="completed">✅ Completed</option>
                <option value="pending">⏳ Pending</option>
                <option value="cancelled">❌ Cancelled</option>
            </select>
        </div>

        <!-- Table Container -->
        <div class="table-container">
            <table class="table">

                <thead>
                    <tr>
                        <th>Customer</th>
                        <th>Phone</th>
                        <th>Services</th>
                        <th>Staff</th>
                        <th>Date</th>
                        <th>Amount</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>

                <tbody id="tableBody">
                    @forelse($appointments as $a)
                    <tr data-status="{{ $a->status }}">
                        <td>
                            <div style="display:flex; align-items:center; gap:8px;">
                                <i class="fa fa-user-circle"></i>
                                <span>{{ $a->customer_name }}</span>
                            </div>
                        </td>

                        <td>
                            <div style="display:flex; align-items:center; gap:8px;">
                                <i class="fa fa-phone"></i>
                                {{ $a->customer_phone }}
                            </div>
                        </td>

                        <td>
                            @foreach($a->services as $service)
                                <span class="service-badge">
                                    <i class="fa fa-scissors me-1"></i>
                                    {{ $service->name }}
                                </span>
                            @endforeach
                        </td>

                        <td>
                            @if($a->staff)
                            <div style="display:flex; align-items:center; gap:6px;">
                                <i class="fa fa-user-tie"></i>
                                {{ $a->staff->name }}
                            </div>
                            @else
                            <span class="text-muted">-</span>
                            @endif
                        </td>

                        <td>
                            <div style="display:flex; align-items:center; gap:6px;">
                                <i class="fa fa-calendar"></i>
                                {{ \Carbon\Carbon::parse($a->appointment_date)->format('d M, Y') }}
                            </div>
                        </td>

                        <td>
                            <span class="amount">
                                ₹{{ number_format($a->amount, 2) }}
                            </span>
                        </td>

                        <td>
                            <span class="status {{ $a->status }}">
                                @if($a->status == 'booked') 📅
                                @elseif($a->status == 'completed') ✅
                                @elseif($a->status == 'pending') ⏳
                                @elseif($a->status == 'cancelled') ❌
                                @endif
                                {{ ucfirst($a->status) }}
                            </span>
                        </td>

                        <td>
                            <div style="display:flex; gap:8px;">
                                <a href="{{ route('appointments.edit', $a->id) }}" 
                                   style="color:var(--gold-rich); text-decoration:none;"
                                   title="Edit">
                                    <i class="fa fa-edit"></i>
                                </a>
                                <a href="https://wa.me/91{{ $a->customer_phone }}?text=
Hello%20{{ $a->customer_name }}%0A
Your%20appointment%20at%20A1%20Makeover%20is%20booked.%0A%0A
Date:%20{{ \Carbon\Carbon::parse($a->appointment_date)->format('d M, Y') }}%0A
Amount:%20₹{{ number_format($a->amount,2) }}%0A%0A
Thank%20you"
target="_blank"
class="btn-whatsapp">
<i class="fab fa-whatsapp"></i>
</a>
                                <form action="{{ route('appointments.destroy', $a->id) }}" 
                                      method="POST" 
                                      style="display:inline;"
                                      onsubmit="return confirm('Delete this appointment?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" 
                                            style="background:none; border:none; color:#ff6b6b; cursor:pointer;"
                                            title="Delete">
                                        <i class="fa fa-trash"></i>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @empty

                    <!-- Empty State -->
                    <tr>
                        <td colspan="8" style="padding:0; border:none;">
                            <div class="empty-state">
                                <i class="fa fa-calendar-times"></i>
                                <h5>No Appointments Found</h5>
                                <p>
                                    @if(request('search') || request('status'))
                                        No appointments matching your filters
                                    @else
                                        Start by creating your first appointment
                                    @endif
                                </p>
                                @if(request('search') || request('status'))
                                <a href="{{ route('appointments.index') }}" class="add-btn" style="display:inline-block;">
                                    <i class="fa fa-times me-2"></i>Clear Filters
                                </a>
                                @else
                                <a href="{{ route('appointments.create') }}" class="add-btn" style="display:inline-block;">
                                    <i class="fa fa-plus-circle me-2"></i>Book Appointment
                                </a>
                                @endif
                            </div>
                        </td>
                    </tr>
                    @endforelse
                </tbody>

            </table>
        </div>

        <!-- Pagination -->
        @if(method_exists($appointments, 'links') && $appointments->hasPages())
        <div class="pagination">
            {{ $appointments->links() }}
        </div>
        @endif

    </div>

</div>

<!-- Search and Filter Script -->
<script>
document.addEventListener('DOMContentLoaded', function() {
    const searchInput = document.getElementById('search');
    const statusFilter = document.getElementById('statusFilter');
    const tableBody = document.getElementById('tableBody');
    
    function filterTable() {
        const searchTerm = searchInput.value.toLowerCase();
        const statusValue = statusFilter.value;
        const rows = tableBody.querySelectorAll('tr');
        
        let hasVisibleRows = false;
        
        rows.forEach(row => {
            // Skip empty state row
            if(row.querySelector('.empty-state')) return;
            
            const customerName = row.children[0]?.innerText.toLowerCase() || '';
            const rowStatus = row.dataset.status;
            
            const matchesSearch = customerName.includes(searchTerm);
            const matchesStatus = !statusValue || rowStatus === statusValue;
            
            if(matchesSearch && matchesStatus) {
                row.style.display = '';
                hasVisibleRows = true;
            } else {
                row.style.display = 'none';
            }
        });
        
        // Show empty state if no rows visible
        const emptyStateRow = Array.from(rows).find(row => row.querySelector('.empty-state'));
        
        if(!hasVisibleRows && !emptyStateRow) {
            // Create and show empty state
            const newRow = document.createElement('tr');
            newRow.innerHTML = `
                <td colspan="8" style="padding:0; border:none;">
                    <div class="empty-state">
                        <i class="fa fa-calendar-times"></i>
                        <h5>No Matching Appointments</h5>
                        <p>
                            No appointments found matching your criteria
                        </p>
                        <button onclick="clearFilters()" class="add-btn" style="display:inline-block; border:none; cursor:pointer;">
                            <i class="fa fa-times me-2"></i>Clear Filters
                        </button>
                    </div>
                </td>
            `;
            tableBody.appendChild(newRow);
        }
        
        // Hide empty state if rows exist
        if(hasVisibleRows && emptyStateRow) {
            emptyStateRow.remove();
        }
    }
    
    // Clear filters function
    window.clearFilters = function() {
        searchInput.value = '';
        statusFilter.value = '';
        filterTable();
    };
    
    // Add event listeners
    searchInput.addEventListener('keyup', filterTable);
    statusFilter.addEventListener('change', filterTable);
});
</script>

@endsection