@extends('salon.layouts.app')

@section('content')

<style>
/* ================ SERVICES INDEX PAGE - DARK GOLD THEME ================ */

/* ================ PAGE HEADER ================ */
.page-header{
    display:flex;
    justify-content:space-between;
    align-items:center;
    margin-bottom:30px;
    flex-wrap:wrap;
    gap:15px;
}

.page-header h2{
    font-family:'Playfair Display', serif;
    font-size:28px;
    font-weight:700;
    color:var(--gold-rich);
    letter-spacing:0.5px;
    text-shadow:0 2px 5px var(--glow);
    position:relative;
    margin:0;
}

.page-header h2::after{
    content:'';
    position:absolute;
    bottom:-8px;
    left:0;
    width:60px;
    height:3px;
    background:linear-gradient(90deg, var(--gold-rich), var(--gold-dim));
    border-radius:2px;
}

/* ================ SEARCH BOX ================ */
.search-box input{
    padding:10px 18px;
    border-radius:30px;
    border:1.5px solid var(--gold-dim);
    background:var(--card);
    color:var(--text);
    font-size:14px;
    transition:.3s;
    width:250px;
    box-shadow:0 4px 12px rgba(0,0,0,0.1);
}

.search-box input:focus{
    outline:none;
    border-color:var(--gold-rich);
    box-shadow:0 0 0 4px var(--glow);
}

.search-box input::placeholder{
    color:var(--text-soft);
    opacity:0.7;
}

/* ================ ADD BUTTON ================ */
.add-btn{
    background:linear-gradient(135deg, var(--gold-rich), var(--gold-glow));
    color:#000000;
    padding:10px 25px;
    border-radius:30px;
    text-decoration:none;
    font-weight:600;
    font-size:14px;
    transition:.3s;
    border:1px solid var(--gold-rich);
    display:inline-flex;
    align-items:center;
    gap:8px;
    box-shadow:0 6px 15px var(--glow);
}

.add-btn:hover{
    transform:translateY(-3px);
    box-shadow:0 12px 25px var(--glow);
    color:#000000;
    background:linear-gradient(135deg, var(--gold-glow), var(--gold-rich));
}

/* ================ SERVICE CARD ================ */
.service-card{
    background:var(--card);
    border-radius:20px;
    padding:25px;
    border:1.5px solid var(--gold-dim);
    box-shadow:0 8px 20px rgba(0,0,0,0.2);
    transition:.3s;
    height:100%;
    position:relative;
    overflow:hidden;
}

.service-card:hover{
    transform:translateY(-6px);
    border-color:var(--gold-rich);
    box-shadow:0 15px 30px var(--glow);
}

/* Gold accent on left */
.service-card::before{
    content:'';
    position:absolute;
    top:0;
    left:0;
    height:100%;
    width:4px;
    background:linear-gradient(180deg, var(--gold-rich), var(--gold-dim));
    opacity:0.7;
}

.service-card:hover::before{
    opacity:1;
    background:linear-gradient(180deg, var(--gold-rich), var(--gold-glow));
}

/* ================ PRICE BADGE ================ */
.price-badge{
    position:absolute;
    top:18px;
    right:20px;
    background:var(--gold-rich);
    color:#000000;
    padding:6px 16px;
    border-radius:30px;
    font-size:13px;
    font-weight:700;
    box-shadow:0 4px 12px var(--glow);
    border:1px solid var(--gold-glow);
    z-index:2;
}

/* ================ SERVICE NAME ================ */
.service-card h5{
    font-family:'Playfair Display', serif;
    font-size:22px;
    font-weight:700;
    color:var(--text);
    margin:0 0 12px 0;
    padding-right:80px;
}

/* ================ TYPE BADGES ================ */
.type-badge{
    display:inline-block;
    background:var(--hover);
    border:1px solid var(--border);
    padding:5px 15px;
    border-radius:30px;
    font-size:12px;
    font-weight:500;
    color:var(--text-soft);
    margin-right:8px;
    margin-bottom:10px;
}

/* ================ GENDER BADGES ================ */
.gender{
    display:inline-block;
    padding:5px 15px;
    border-radius:30px;
    font-size:12px;
    font-weight:500;
    color:#FFFFFF;
    text-transform:capitalize;
}

.gender.male{
    background:#0d6efd;
    box-shadow:0 4px 12px rgba(13,110,253,0.3);
}

.gender.female{
    background:#e83e8c;
    box-shadow:0 4px 12px rgba(232,62,140,0.3);
}

.gender.unisex{
    background:var(--gold-rich);
    color:#000000;
    box-shadow:0 4px 12px var(--glow);
}

/* ================ DESCRIPTION ================ */
.service-card p{
    margin-top:15px;
    color:var(--text-soft);
    font-size:14px;
    line-height:1.6;
    min-height:60px;
}

/* ================ STAFF TAGS ================ */
.staff-tag{
    display:inline-block;
    background:var(--hover);
    border:1px solid var(--border);
    padding:5px 12px;
    border-radius:30px;
    font-size:12px;
    color:var(--text-soft);
    margin:2px;
    transition:.2s;
}

.staff-tag:hover{
    background:var(--gold-dim);
    color:var(--text);
    border-color:var(--gold-rich);
}

.staff-section{
    margin-top:15px;
    padding-top:10px;
    border-top:1px solid var(--border);
}

.staff-section strong{
    font-size:13px;
    color:var(--gold-rich);
    display:block;
    margin-bottom:8px;
}

/* ================ CARD ACTIONS ================ */
.card-actions{
    margin-top:20px;
    display:flex;
    gap:10px;
    padding-top:15px;
    border-top:1px solid var(--border);
}

.edit-btn{
    background:transparent;
    border:1.5px solid var(--gold-rich);
    color:var(--gold-rich);
    padding:8px 20px;
    border-radius:30px;
    font-size:13px;
    font-weight:600;
    text-decoration:none;
    transition:.3s;
    flex:1;
    text-align:center;
}

.edit-btn:hover{
    background:var(--gold-rich);
    color:#000000;
    transform:translateY(-2px);
    box-shadow:0 5px 15px var(--glow);
}

.delete-btn{
    background:transparent;
    border:1.5px solid #ff6b6b;
    color:#ff6b6b;
    padding:8px 20px;
    border-radius:30px;
    font-size:13px;
    font-weight:600;
    cursor:pointer;
    transition:.3s;
    flex:1;
}

.delete-btn:hover{
    background:#ff6b6b;
    color:#000000;
    transform:translateY(-2px);
    box-shadow:0 5px 15px rgba(255,107,107,0.3);
}

/* ================ EMPTY STATE ================ */
.alert-light{
    background:var(--card);
    border:1.5px solid var(--gold-dim);
    border-radius:20px;
    padding:40px;
    color:var(--text-soft);
    font-size:16px;
    text-align:center;
    box-shadow:0 8px 20px rgba(0,0,0,0.2);
}

/* ================ PAGINATION ================ */
.pagination{
    margin-top:30px;
    display:flex;
    justify-content:center;
    gap:5px;
}

.pagination .page-link{
    background:var(--card);
    border:1.5px solid var(--gold-dim);
    color:var(--text-soft);
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

/* ================ ROW SPACING ================ */
.row{
    margin:-12px;
}

.row > [class*="col-"]{
    padding:12px;
}

/* ================ LIGHT MODE ADJUSTMENTS ================ */
body.light .service-card{
    box-shadow:0 5px 15px rgba(0,0,0,0.03);
}

body.light .search-box input{
    background:#ffffff;
}

body.light .alert-light{
    background:#ffffff;
}

/* ================ RESPONSIVE ================ */
@media (max-width:768px){
    .page-header{
        flex-direction:column;
        align-items:stretch;
    }
    
    .page-header h2{
        font-size:24px;
    }
    
    .search-box input{
        width:100%;
    }
    
    .add-btn{
        width:100%;
        justify-content:center;
    }
    
    .service-card{
        padding:20px;
    }
    
    .service-card h5{
        font-size:20px;
    }
    
    .price-badge{
        font-size:12px;
        padding:5px 12px;
    }
}

/* ================ UTILITY CLASSES ================ */
.position-relative{
    position:relative;
}

.text-center{
    text-align:center;
}

.mb-4{
    margin-bottom:20px;
}
</style>

<div class="container-fluid px-3 px-md-4">

    <!-- Page Header -->
    <div class="page-header">
        <h2>
            <i class="fa fa-scissors me-2"></i>
            Salon Services
        </h2>

        <form method="GET" action="{{ route('services.index') }}" class="search-box">
            <input type="text"
                   name="search"
                   value="{{ request('search') }}"
                   placeholder="🔍 Search services...">
        </form>

        <a href="{{ route('services.create') }}" class="add-btn">
            <i class="fa fa-plus-circle"></i>
            Add New Service
        </a>
    </div>

    <!-- Success Message -->
    @if(session('success'))
    <div class="alert-success mb-4">
        <i class="fa fa-check-circle me-2"></i>
        {{ session('success') }}
    </div>
    @endif

    <!-- Services Grid -->
    <div class="row">
        @forelse($services as $service)
        <div class="col-lg-4 col-md-6 mb-4">
            <div class="service-card position-relative">

                <!-- Price Badge -->
                <span class="price-badge">
                    <i class="fa fa-tag me-1"></i>
                    ₹{{ number_format($service->price, 2) }}
                </span>

                <!-- Service Name -->
                <h5>{{ $service->name }}</h5>

                <!-- Type Badge -->
                <span class="type-badge">
                    <i class="fa fa-tag me-1"></i>
                    {{ $service->service_type ?? 'Service' }}
                </span>

                <!-- Gender Badge -->
                @php
                    $gender = strtolower($service->gender ?? 'unisex');
                @endphp
                <span class="gender {{ $gender }}">
                    <i class="fa fa-{{ $gender=='male' ? 'mars' : ($gender=='female' ? 'venus' : 'genderless') }} me-1"></i>
                    {{ ucfirst($gender) }}
                </span>

                <!-- Description -->
                <p>
                    {{ Str::limit($service->description ?? 'No description provided.', 100) }}
                </p>

                <!-- Staff List -->
                @if($service->staffs->count() > 0)
                <div class="staff-section">
                    <strong>
                        <i class="fa fa-users me-1"></i>
                        Assigned Staff ({{ $service->staffs->count() }})
                    </strong>
                    <div>
                        @foreach($service->staffs->take(3) as $staff)
                        <span class="staff-tag">
                            <i class="fa fa-user me-1"></i>
                            {{ $staff->name }}
                        </span>
                        @endforeach
                        @if($service->staffs->count() > 3)
                        <span class="staff-tag">
                            +{{ $service->staffs->count() - 3 }} more
                        </span>
                        @endif
                    </div>
                </div>
                @endif

                <!-- Action Buttons -->
                <div class="card-actions">
                    <a href="{{ route('services.edit', $service->id) }}" 
                       class="edit-btn">
                        <i class="fa fa-edit me-1"></i> Edit
                    </a>

                    <form method="POST" 
                          action="{{ route('services.destroy', $service->id) }}"
                          onsubmit="return confirm('Are you sure you want to delete this service? This action cannot be undone.');"
                          style="flex:1;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="delete-btn">
                            <i class="fa fa-trash me-1"></i> Delete
                        </button>
                    </form>
                </div>

            </div>
        </div>
        @empty

        <!-- Empty State -->
        <div class="col-12">
            <div class="alert-light">
                <i class="fa fa-scissors fa-3x mb-3" style="color:var(--gold-rich);"></i>
                <h5 style="color:var(--text);">No Services Found</h5>
                <p style="color:var(--text-soft); margin-bottom:20px;">
                    @if(request('search'))
                        No services matching "{{ request('search') }}"
                    @else
                        Get started by adding your first service
                    @endif
                </p>
                @if(request('search'))
                <a href="{{ route('services.index') }}" class="add-btn" style="display:inline-block;">
                    <i class="fa fa-times me-2"></i>Clear Search
                </a>
                @else
                <a href="{{ route('services.create') }}" class="add-btn" style="display:inline-block;">
                    <i class="fa fa-plus-circle me-2"></i>Add First Service
                </a>
                @endif
            </div>
        </div>
        @endforelse
    </div>

    <!-- Pagination -->
    @if($services->hasPages())
    <div class="pagination">
        {{ $services->links() }}
    </div>
    @endif

</div>

@endsection