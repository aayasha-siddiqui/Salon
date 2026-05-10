@extends('salon.layouts.app')

@section('content')


<style>
/* ================ STAFF MANAGEMENT PAGE - DARK GOLD THEME ================ */

/* Page Container */
.container-fluid{
padding:25px 30px;
}

/* ================ PAGE HEADER ================ */
.page-header{
display:flex;
justify-content:space-between;
align-items:center;
margin-bottom:30px;
flex-wrap:wrap;
gap:15px;
}

.page-title{
font-family:'Playfair Display', serif;
font-size:28px;
font-weight:700;
color:var(--gold-rich);
letter-spacing:0.5px;
text-shadow:0 2px 5px var(--glow);
position:relative;
}

.page-title::after{
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
.search-box{
display:flex;
gap:8px;
flex:1;
max-width:400px;
}

.search-box input{
flex:1;
padding:12px 18px;
border-radius:30px;
border:1.5px solid var(--gold-dim);
background:var(--card);
color:var(--text);
font-size:14px;
transition:.3s;
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

.search-box button{
padding:12px 28px;
border-radius:30px;
border:none;
background:var(--gold-rich);
color:#000000;
font-weight:600;
font-size:14px;
cursor:pointer;
transition:.3s;
box-shadow:0 6px 15px var(--glow);
}

.search-box button:hover{
background:var(--gold-glow);
transform:translateY(-2px);
box-shadow:0 10px 20px var(--glow);
}

/* ================ ADD BUTTON ================ */
.add-btn{
padding:12px 28px;
border-radius:30px;
border:1.5px solid var(--gold-rich);
background:transparent;
color:var(--gold-rich);
font-weight:600;
font-size:14px;
text-decoration:none;
transition:.3s;
display:inline-flex;
align-items:center;
gap:8px;
}

.add-btn:hover{
background:var(--gold-rich);
color:#000000;
transform:translateY(-2px);
box-shadow:0 10px 20px var(--glow);
}

/* ================ SUCCESS MESSAGE ================ */
.success-msg{
background:var(--card);
border-left:4px solid var(--gold-rich);
border-radius:12px;
padding:16px 20px;
margin-bottom:25px;
color:var(--text);
font-weight:500;
box-shadow:0 4px 15px var(--glow);
border:1px solid var(--gold-dim);
}

/* ================ STAFF GRID ================ */
.staff-grid{
display:grid;
grid-template-columns:repeat(auto-fill, minmax(320px, 1fr));
gap:22px;
margin:25px 0;
}

/* ================ STAFF CARD ================ */
.staff-card{
background:var(--card);
border-radius:20px;
padding:17px;
border:1.5px solid var(--gold-dim);
box-shadow:0 8px 20px rgba(0,0,0,0.2);
transition:.3s;
position:relative;
overflow:hidden;
}

.staff-card:hover{
transform:translateY(-5px);
border-color:var(--gold-rich);
box-shadow:0 15px 30px var(--glow);
}

/* Gold accent on top */
.staff-card::before{
content:'';
position:absolute;
top:0;
left:0;
width:100%;
height:4px;
background:linear-gradient(90deg, var(--gold-rich), var(--gold-dim));
opacity:0.7;
}

.staff-card:hover::before{
opacity:1;
}

/* ================ STAFF TOP SECTION ================ */
.staff-top{
display:flex;
align-items:center;
gap:15px;
margin-bottom:15px;
}

.staff-photo{
width:70px;
height:70px;
border-radius:50%;
object-fit:cover;
border:3px solid var(--gold-dim);
box-shadow:0 4px 12px var(--glow);
transition:.3s;
}

.staff-card:hover .staff-photo{
border-color:var(--gold-rich);
transform:scale(1.02);
}

.staff-name{
font-family:'Playfair Display', serif;
font-size:20px;
font-weight:700;
color:var(--text);
margin-bottom:4px;
}

.staff-role{
font-size:14px;
color:var(--gold-rich);
font-weight:500;
text-transform:uppercase;
letter-spacing:0.5px;
}

/* ================ BADGES ================ */
.badge-male,
.badge-female,
.badge-other{
display:inline-block;
padding:5px 12px;
border-radius:30px;
font-size:12px;
font-weight:600;
margin-bottom:12px;
text-transform:capitalize;
}

.badge-male{
background:rgba(139, 107, 62, 0.15);
color:var(--gold-rich);
border:1px solid var(--gold-dim);
}

.badge-female{
background:rgba(160, 125, 74, 0.15);
color:var(--gold-glow);
border:1px solid var(--gold-dim);
}

.badge-other{
background:var(--hover);
color:var(--text-soft);
border:1px solid var(--border);
}

/* ================ INFO ROWS ================ */
.info{
font-size:14px;
color:var(--text-soft);
margin-bottom:10px;
display:flex;
align-items:center;
gap:8px;
padding:6px 10px;
background:var(--hover);
border-radius:8px;
transition:.2s;
}

.info:hover{
background:var(--card);
border-left:2px solid var(--gold-rich);
transform:translateX(3px);
}

.info i, .info em{
color:var(--gold-rich);
font-style:normal;
min-width:20px;
}

/* ================ ACTION BUTTONS ================ */
.action-buttons{
display:flex;
gap:10px;
margin-top:18px;
padding-top:15px;
border-top:1px solid var(--border);
}

.edit-btn{
flex:1;
padding:5px;
border-radius:10px;
background:transparent;
border:1.5px solid var(--gold-rich);
color:var(--gold-rich);
text-decoration:none;
font-size:13  px;
font-weight:600;
text-align:center;
transition:.3s;
}
.btn-view:hover{
background:var(--gold-rich);
color:#000000;
transform:translateY(-2px);
box-shadow:0 5px 15px var(--glow);
}

.edit-btn:hover{
background:var(--gold-rich);
color:#000000;
transform:translateY(-2px);
box-shadow:0 5px 15px var(--glow);
}
.btn-view{
  flex:1;
padding:10px;
border-radius:10px;
background:var(--gold-rich);

color:var(--text);
text-decoration:none;
font-size:14px;
font-weight:600;
text-align:center;
transition:.3s;
}
.delete-btn{
flex:1;
padding:8px;
border-radius:10px;
background:transparent;
border:1.5px solid #a91f1f;
color:#a91f1f;
font-size:14px;
font-weight:600;
cursor:pointer;
transition:.3s;
}

.delete-btn:hover{
background:#ff6b6b;
color:#000000;
transform:translateY(-2px);
box-shadow:0 5px 15px rgba(255,107,107,0.3);
}

/* ================ PAGINATION ================ */
.pagination{
margin-top:30px;
display:flex;
justify-content:center;
}

.pagination .pagination{
gap:8px;
}

.pagination .page-item .page-link{
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

.pagination .page-item .page-link:hover{
background:var(--gold-dim);
border-color:var(--gold-rich);
color:var(--text);
transform:translateY(-2px);
box-shadow:0 5px 12px var(--glow);
}

/* ================ EMPTY STATE ================ */
.staff-grid p{
grid-column:1/-1;
text-align:center;
padding:40px;
color:var(--text-soft);
font-size:16px;
background:var(--card);
border-radius:20px;
border:1.5px solid var(--border);
}

/* ================ RESPONSIVE ================ */
@media(max-width:768px){
.container-fluid{
padding:15px;
}

.page-header{
flex-direction:column;
align-items:stretch;
}

.search-box{
max-width:100%;
}

.page-title{
font-size:24px;
}

.staff-grid{
grid-template-columns:1fr;
}

.staff-card{
padding:18px;
}
}

/* ================ LIGHT MODE ADJUSTMENTS ================ */
body.light .staff-card{
box-shadow:0 5px 15px rgba(0,0,0,0.05);
}

body.light .info{
background:#f8f8f8;
}

body.light .info:hover{
background:#ffffff;
}
</style>

<div class="page-header">

<div class="page-title">👩‍💼 Staff Management</div>

<form method="GET" action="{{ route('staff.index') }}" class="search-box">

<input type="text"
name="search"
value="{{ request('search') }}"
placeholder="Search name, email, phone">

<button type="submit">Search</button>

</form>

<a href="{{ route('staff.create') }}" class="add-btn">
+ Add Staff
</a>

</div>


@if(session('success'))
<div class="success-msg">
{{ session('success') }}
</div>
@endif



<div class="staff-grid">

@forelse($staffs as $staff)

<div class="staff-card">

<div class="staff-top">

@if($staff->photo)
<img src="{{ asset('storage/'.$staff->photo) }}" class="staff-photo">
@else
<img src="https://via.placeholder.com/70" class="staff-photo">
@endif

<div>
<div class="staff-name">{{ $staff->name }}</div>
<div class="staff-role">{{ $staff->role }}</div>
</div>

</div>


@if($staff->gender == 'male')
<span class="badge badge-male">Male</span>
@elseif($staff->gender == 'female')
<span class="badge badge-female">Female</span>
@else
<span class="badge badge-other">Other</span>
@endif


<div class="info">📧 {{ $staff->email }}</div>
<div class="info">📞 {{ $staff->phone }}</div>

<div class="info">
🛠 {{ $staff->services->pluck('name')->implode(', ') }}
</div>

<div class="info">📅 Joined: {{ $staff->joining_date }}</div>

@if($staff->salary_type == 'fixed')
<div class="info">💰 Fixed Salary: ₹{{ $staff->fixed_salary }}</div>
@else
<div class="info">💸 Commission: {{ $staff->commission_percent }}%</div>
@endif


<div class="action-buttons">

<a href="{{ route('staff.edit',$staff->id) }}" class="edit-btn">
Edit
</a>
<a href="{{ route('staff.show', $staff->id) }}" class="btn-view">
    <i class="fa fa-eye"></i> View Profile
</a>
<form action="{{ route('staff.destroy',$staff->id) }}"
method="POST"
onsubmit="return confirm('Delete this staff?')">

@csrf
@method('DELETE')

<button class="delete-btn">Delete</button>

</form>

</div>

</div>

@empty

<p>No Staff Found</p>

@endforelse

</div>


<div class="pagination">
{{ $staffs->links() }}
</div>


@endsection