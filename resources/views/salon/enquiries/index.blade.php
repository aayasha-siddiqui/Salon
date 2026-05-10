@extends('salon.layouts.app')

@section('content')

<style>
/* ================ SALON ENQUIRIES PAGE - PROFESSIONAL DARK GOLD ================ */

/* ================ PAGE CONTAINER ================ */
.enquiries-wrapper{
    padding:25px 20px;
    min-height:calc(100vh - 70px);
    background:var(--bg);
}

/* ================ MAIN CARD ================ */
.enquiries-card{
    background:var(--card);
    border:1.5px solid var(--gold-dim);
    border-radius:24px;
    box-shadow:0 10px 30px rgba(0,0,0,0.3);
    overflow:hidden;
    transition:.3s;
    position:relative;
}

.enquiries-card:hover{
    border-color:var(--gold-rich);
    box-shadow:0 15px 40px var(--glow);
}

.enquiries-card::before{
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
    background:linear-gradient(135deg, var(--gold-rich), var(--gold-dim)) !important;
    border-bottom:1px solid var(--border);
    padding:18px 25px;
}

.card-header h5{
    font-family:'Playfair Display', serif;
    font-weight:700;
    font-size:20px;
    color:#000000;
    margin:0;
    display:flex;
    align-items:center;
    gap:10px;
}

.card-header h5 i{
    color:#000000;
}

/* Total badge */
.total-badge{
    background:rgba(0,0,0,0.2);
    color:#000000;
    border-radius:40px;
    padding:8px 18px;
    font-size:14px;
    font-weight:600;
    border:1px solid rgba(0,0,0,0.3);
}

.total-badge i{
    margin-right:6px;
}

/* ================ TABLE CONTAINER ================ */
.table-container{
    padding:0;
    overflow-x:auto;
}

/* ================ TABLE ================ */
.table{
    width:100%;
    border-collapse:collapse;
    min-width:800px;
    margin-bottom:0;
}

.table thead{
    background:linear-gradient(135deg, var(--gold-rich), var(--gold-dim));
}

.table thead th{
    color:#000000;
    font-weight:600;
    font-size:13px;
    padding:16px 15px;
    text-align:left;
    white-space:nowrap;
    border:none;
}

.table tbody td{
    padding:16px 15px;
    color:var(--text);
    border-bottom:1px solid var(--border);
    background:var(--card);
    vertical-align:middle;
    font-size:13px;
}

/* Alternate row shading */
.table tbody tr:nth-child(even) td{
    background:var(--hover);
}

/* Row hover */
.table tbody tr:hover td{
    background:var(--gold-dim) !important;
}

/* ================ SERIAL NUMBER ================ */
.serial-number{
    color:var(--gold-rich);
    font-weight:600;
    display:inline-block;
    min-width:30px;
}

/* ================ NAME COLUMN ================ */
.name-column{
    display:flex;
    align-items:center;
    gap:10px;
}

.name-icon{
    width:32px;
    height:32px;
    border-radius:50%;
    background:var(--gold-dim);
    display:flex;
    align-items:center;
    justify-content:center;
    color:#000000;
    font-size:14px;
}

.name-text{
    font-weight:600;
    color:var(--text);
}

/* ================ CONTACT COLUMN ================ */
.contact-info{
    display:flex;
    flex-direction:column;
    gap:2px;
}

.contact-item{
    display:flex;
    align-items:center;
    gap:6px;
    color:var(--text-soft);
    font-size:12px;
}

.contact-item i{
    color:var(--gold-rich);
    width:16px;
    font-size:12px;
}

/* ================ GENDER BADGES ================ */
.gender-badge{
    padding:6px 16px;
    border-radius:40px;
    font-size:12px;
    font-weight:600;
    display:inline-block;
    text-transform:capitalize;
}

.gender-badge.male{
    background:rgba(13, 110, 253, 0.15);
    color:#0d6efd;
    border:1px solid #0d6efd;
}

.gender-badge.female{
    background:rgba(220, 53, 69, 0.15);
    color:#dc3545;
    border:1px solid #dc3545;
}

.gender-badge.other{
    background:rgba(108, 117, 125, 0.15);
    color:#6c757d;
    border:1px solid #6c757d;
}

/* Dark mode gender badges */
body:not(.light) .gender-badge.male{
    background:rgba(13, 110, 253, 0.25);
    color:#8bb9fe;
}

body:not(.light) .gender-badge.female{
    background:rgba(220, 53, 69, 0.25);
    color:#ff8a8a;
}

body:not(.light) .gender-badge.other{
    background:rgba(108, 117, 125, 0.25);
    color:#a0a0a0;
}

/* ================ SERVICE COLUMN ================ */
.service-column{
    display:flex;
    align-items:center;
    gap:8px;
}

.service-icon{
    color:var(--gold-rich);
    font-size:14px;
}

.service-text{
    color:var(--text);
    font-weight:500;
}

/* ================ ACTION BUTTONS ================ */
.action-buttons{
    display:flex;
    gap:8px;
}

.btn-view{
    background:transparent;
    border:1.5px solid var(--gold-dim);
    color:var(--gold-rich);
    border-radius:8px;
    padding:6px 16px;
    font-size:12px;
    font-weight:500;
    transition:.3s;
    display:inline-flex;
    align-items:center;
    gap:6px;
    text-decoration:none;
}

.btn-view:hover{
    background:var(--gold-rich);
    border-color:var(--gold-rich);
    color:#000000;
    transform:translateY(-2px);
    box-shadow:0 5px 12px var(--glow);
}

.btn-delete{
    background:transparent;
    border:1.5px solid #dc3545;
    color:#dc3545;
    border-radius:8px;
    padding:6px 16px;
    font-size:12px;
    font-weight:500;
    transition:.3s;
    display:inline-flex;
    align-items:center;
    gap:6px;
    cursor:pointer;
}

.btn-delete:hover{
    background:#dc3545;
    border-color:#dc3545;
    color:#000000;
    transform:translateY(-2px);
    box-shadow:0 5px 12px rgba(220,53,69,0.3);
}

/* ================ EMPTY STATE ================ */
.empty-state{
    text-align:center;
    padding:60px 20px;
    color:var(--text-soft);
}

.empty-state i{
    font-size:48px;
    color:var(--gold-rich);
    margin-bottom:15px;
    opacity:0.5;
}

.empty-state h5{
    font-family:'Playfair Display', serif;
    color:var(--text);
    margin-bottom:10px;
}

/* ================ PAGINATION ================ */
.card-footer{
    background:var(--card) !important;
    border-top:1.5px solid var(--border);
    padding:18px 25px;
}

.pagination{
    margin:0;
    gap:5px;
    justify-content:flex-end;
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

/* ================ LIGHT MODE ADJUSTMENTS ================ */
body.light .enquiries-card{
    box-shadow:0 8px 20px rgba(0,0,0,0.05);
}

body.light .table thead{
    background:#f0f0f0;
}

body.light .table thead th{
    color:#1A1A1A;
}

body.light .name-icon{
    background:#f0e9d8;
}

/* ================ RESPONSIVE ================ */
@media (max-width:768px){
    .card-header{
        padding:15px;
    }
    
    .card-header h5{
        font-size:18px;
    }
    
    .total-badge{
        padding:6px 12px;
        font-size:12px;
    }
    
    .table tbody td{
        padding:12px 10px;
    }
    
    .action-buttons{
        flex-direction:column;
    }
    .btn-whatsapp{
background:#25D366;
color:white;
padding:6px 10px;
border-radius:6px;
text-decoration:none;
font-size:14px;
margin-left:5px;
}
    
    .btn-view,
    .btn-delete{
        width:100%;
        justify-content:center;
    }
    
    .card-footer{
        padding:15px;
    }
    
    .pagination{
        justify-content:center;
    }
}

/* ================ ANIMATION ================ */
@keyframes fadeIn{
    from{
        opacity:0;
        transform:translateY(10px);
    }
    to{
        opacity:1;
        transform:translateY(0);
    }
}

.enquiries-card{
    animation:fadeIn 0.4s ease;
}
</style>

<div class="enquiries-wrapper">
    <div class="enquiries-card">

        <!-- Card Header -->
        <div class="card-header">
            <div class="d-flex justify-content-between align-items-center flex-wrap gap-3">
                <h5>
                    <i class="fa fa-envelope"></i>
                    Salon Enquiries
                </h5>

                <span class="total-badge">
                    <i class="fa fa-list"></i>
                    Total: {{ $enquiries->total() }}
                </span>
            </div>
        </div>

        <!-- Table Section -->
        <div class="table-container">
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th style="width:60px;">#</th>
                            <th>Name</th>
                            <th>Contact</th>
                            <th>Gender</th>
                            <th>Service</th>
                            <th style="width:160px;">Actions</th>
                        </tr>
                    </thead>

                    <tbody>
                        @forelse($enquiries as $index => $enquiry)
                        <tr>
                            <td>
                                <span class="serial-number">
                                    {{ $enquiries->firstItem() + $index }}
                                </span>
                            </td>

                            <td>
                                <div class="name-column">
                                    <div class="name-icon">
                                        <i class="fa fa-user"></i>
                                    </div>
                                    <span class="name-text">{{ $enquiry->name }}</span>
                                </div>
                            </td>

                            <td>
                                <div class="contact-info">
                                    <div class="contact-item">
                                        <i class="fa fa-phone"></i>
                                        {{ $enquiry->contact }}
                                    </div>
                                    @if($enquiry->email)
                                    <div class="contact-item">
                                        <i class="fa fa-envelope"></i>
                                        {{ $enquiry->email }}
                                    </div>
                                    @endif
                                </div>
                            </td>

                            <td>
                                <span class="gender-badge {{ $enquiry->gender }}">
                                    <i class="fa 
                                        @if($enquiry->gender=='male') fa-mars 
                                        @elseif($enquiry->gender=='female') fa-venus 
                                        @else fa-genderless 
                                        @endif me-1">
                                    </i>
                                    {{ ucfirst($enquiry->gender) }}
                                </span>
                            </td>

                            <td>
                                <div class="service-column">
                                    <i class="fa fa-scissors service-icon"></i>
                                    <span class="service-text">{{ $enquiry->service }}</span>
                                </div>
                            </td>

                            <td>
                                <div class="action-buttons">
                                    <a href="{{ route('salon.enquiries.show', $enquiry->id) }}" 
                                       class="btn-view">
                                        <i class="fa fa-eye"></i>
                                        View
                                    </a>
<a href="https://wa.me/91{{ $enquiry->contact }}?text=Hello%20{{ $enquiry->name }}%2C%20Yes%20how%20can%20I%20help%20you%3F"
   target="_blank"
   class="btn-whatsapp btn-view">
    <i class="fab fa-whatsapp"></i>
  
</a>
                                    <form method="POST"
                                          action="{{ route('salon.enquiries.destroy', $enquiry->id) }}"
                                          class="d-inline"
                                          onsubmit="return confirm('Are you sure you want to delete this enquiry?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn-delete">
                                            <i class="fa fa-trash"></i>
                                            Delete
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="6">
                                <div class="empty-state">
                                    <i class="fa fa-inbox"></i>
                                    <h5>No Enquiries Found</h5>
                                    <p>There are no enquiries in the system yet.</p>
                                </div>
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Pagination -->
        @if($enquiries->hasPages())
        <div class="card-footer">
            <div class="d-flex justify-content-between align-items-center flex-wrap gap-3">
                <div class="text-muted" style="color:var(--text-soft); font-size:13px;">
                    Showing {{ $enquiries->firstItem() }} to {{ $enquiries->lastItem() }} of {{ $enquiries->total() }} enquiries
                </div>
                <div>
                    {{ $enquiries->links('pagination::bootstrap-5') }}
                </div>
            </div>
        </div>
        @endif

    </div>
</div>

@endsection