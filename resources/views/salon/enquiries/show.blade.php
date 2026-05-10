@extends('salon.layouts.app')

@section('content')

<style>
/* ================ ENQUIRY DETAILS PAGE - PROFESSIONAL DARK GOLD ================ */

/* ================ PAGE CONTAINER ================ */
.details-wrapper{
    padding:30px 20px;
    min-height:calc(100vh - 70px);
    background:var(--bg);
    display:flex;
    align-items:center;
    justify-content:center;
}

/* ================ DETAILS CARD ================ */
.details-card{
    max-width:700px;
    width:100%;
    background:var(--card);
    border:1.5px solid var(--gold-dim);
    border-radius:24px;
    box-shadow:0 15px 40px rgba(0,0,0,0.3);
    overflow:hidden;
    transition:.3s;
    position:relative;
    margin:0 auto;
}

.details-card:hover{
    border-color:var(--gold-rich);
    box-shadow:0 20px 50px var(--glow);
}

.details-card::before{
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
    padding:20px 25px;
}

.card-header h5{
    font-family:'Playfair Display', serif;
    font-weight:700;
    font-size:16px;
    color:#000000;
    margin:0;
    display:flex;
    align-items:center;
    gap:10px;
}

.card-header h5 i{
    color:#000000;
    font-size:22px;
}

/* ================ CARD BODY ================ */
.card-body{
    padding:30px 25px;
    background:var(--card);
}

/* ================ DETAILS CONTAINER ================ */
.details-container{
    display:flex;
    flex-direction:column;
    gap:15px;
}

/* ================ DETAIL ROW ================ */
.detail-row{
    display:flex;
    flex-wrap:wrap;
    border-bottom:1px solid var(--border);
    padding:12px 0;
    transition:.2s;
}

.detail-row:hover{
    background:var(--hover);
    padding-left:15px;
    padding-right:15px;
    border-radius:12px;
    border-bottom-color:var(--gold-rich);
}

.detail-label{
    width:140px;
    font-weight:600;
    color:var(--gold-rich);
    font-size:14px;
    display:flex;
    align-items:center;
    gap:8px;
}

.detail-label i{
    width:20px;
    color:var(--gold-rich);
}

.detail-value{
    flex:1;
    color:var(--text);
    font-size:15px;
    padding-left:15px;
    word-break:break-word;
}

/* ================ GENDER BADGE ================ */
.gender-badge{
    display:inline-block;
    padding:6px 20px;
    border-radius:40px;
    font-size:13px;
    font-weight:600;
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

/* ================ SERVICE TAG ================ */
.service-tag{
    display:inline-block;
    background:var(--gold-dim);
    color:#000000;
    padding:6px 18px;
    border-radius:40px;
    font-size:13px;
    font-weight:500;
}

.service-tag i{
    margin-right:6px;
}

/* ================ MESSAGE BOX ================ */
.message-box{
    background:var(--hover);
    border:1px solid var(--border);
    border-radius:16px;
    padding:20px;
    margin-top:15px;
    width:100%;
}

.message-label{
    color:var(--gold-rich);
    font-weight:600;
    font-size:14px;
    margin-bottom:10px;
    display:flex;
    align-items:center;
    gap:8px;
}

.message-content{
    color:var(--text);
    font-size:14px;
    line-height:1.7;
    white-space:pre-wrap;
}

/* ================ BUTTONS ================ */
.button-group{
    margin-top:30px;
    display:flex;
    gap:15px;
    flex-wrap:wrap;
}

.btn-back{
    background:transparent;
    border:1.5px solid var(--gold-dim);
    color:var(--text-soft);
    border-radius:40px;
    padding:12px 35px;
    font-weight:500;
    font-size:14px;
    transition:.3s;
    display:inline-flex;
    align-items:center;
    gap:10px;
    text-decoration:none;
}

.btn-back:hover{
    border-color:var(--gold-rich);
    color:var(--gold-rich);
    transform:translateY(-2px);
    box-shadow:0 8px 20px var(--glow);
}

.btn-edit{
    background:transparent;
    border:1.5px solid #ffc107;
    color:#ffc107;
    border-radius:40px;
    padding:12px 35px;
    font-weight:500;
    font-size:14px;
    transition:.3s;
    display:inline-flex;
    align-items:center;
    gap:10px;
    text-decoration:none;
}

.btn-edit:hover{
    background:#ffc107;
    color:#000000;
    transform:translateY(-2px);
    box-shadow:0 8px 20px rgba(255,193,7,0.3);
}

.btn-delete{
    background:transparent;
    border:1.5px solid #dc3545;
    color:#dc3545;
    border-radius:40px;
    padding:12px 35px;
    font-weight:500;
    font-size:14px;
    transition:.3s;
    display:inline-flex;
    align-items:center;
    gap:10px;
    cursor:pointer;
}

.btn-delete:hover{
    background:#dc3545;
    color:#000000;
    transform:translateY(-2px);
    box-shadow:0 8px 20px rgba(220,53,69,0.3);
}

/* ================ LIGHT MODE ADJUSTMENTS ================ */
body.light .details-card{
    box-shadow:0 10px 30px rgba(0,0,0,0.05);
}

body.light .message-box{
    background:#f8f8f8;
}

/* ================ RESPONSIVE ================ */
@media (max-width:768px){
    .card-body{
        padding:20px;
    }
    
    .detail-row{
        flex-direction:column;
        gap:8px;
    }
    
    .detail-label{
        width:100%;
    }
    
    .detail-value{
        padding-left:25px;
    }
    
    .button-group{
        flex-direction:column;
    }
    
    .btn-back,
    .btn-edit,
    .btn-delete{
        width:100%;
        justify-content:center;
    }
}

/* ================ ANIMATION ================ */
@keyframes slideIn{
    from{
        opacity:0;
        transform:translateY(20px);
    }
    to{
        opacity:1;
        transform:translateY(0);
    }
}

.details-card{
    animation:slideIn 0.4s ease;
}
</style>

<div class="details-wrapper">
    <div class="details-card">

        <!-- Card Header -->
        <div class="card-header">
            <h5>
                <i class="fa fa-envelope-open"></i>
                Enquiry Details
            </h5>
        </div>

        <!-- Card Body -->
        <div class="card-body">
            <div class="details-container">

                <!-- Customer Name -->
                <div class="detail-row">
                    <div class="detail-label">
                        <i class="fa fa-user-circle"></i>
                        Customer Name
                    </div>
                    <div class="detail-value">
                        {{ $enquiry->name }}
                    </div>
                </div>

                <!-- Contact -->
                <div class="detail-row">
                    <div class="detail-label">
                        <i class="fa fa-phone-alt"></i>
                        Contact
                    </div>
                    <div class="detail-value">
                        <div style="display:flex; align-items:center; gap:15px; flex-wrap:wrap;">
                            <span><i class="fa fa-phone" style="color:var(--gold-rich); margin-right:5px;"></i> {{ $enquiry->contact }}</span>
                            @if($enquiry->email)
                            <span><i class="fa fa-envelope" style="color:var(--gold-rich); margin-right:5px;"></i> {{ $enquiry->email }}</span>
                            @endif
                        </div>
                    </div>
                </div>

                <!-- Gender -->
                <div class="detail-row">
                    <div class="detail-label">
                        <i class="fa fa-venus-mars"></i>
                        Gender
                    </div>
                    <div class="detail-value">
                        <span class="gender-badge {{ $enquiry->gender }}">
                            <i class="fa 
                                @if($enquiry->gender=='male') fa-mars 
                                @elseif($enquiry->gender=='female') fa-venus 
                                @else fa-genderless 
                                @endif me-1">
                            </i>
                            {{ ucfirst($enquiry->gender) }}
                        </span>
                    </div>
                </div>

                <!-- Service -->
                <div class="detail-row">
                    <div class="detail-label">
                        <i class="fa fa-scissors"></i>
                        Service
                    </div>
                    <div class="detail-value">
                        <span class="service-tag">
                            <i class="fa fa-tag"></i>
                            {{ $enquiry->service }}
                        </span>
                    </div>
                </div>

                <!-- Message (if exists) -->
                @if($enquiry->message)
                <div class="detail-row" style="border-bottom:none;">
                    <div class="detail-label">
                        <i class="fa fa-comment"></i>
                        Message
                    </div>
                    <div class="detail-value">
                        <div class="message-box">
                            <div class="message-label">
                                <i class="fa fa-quote-right"></i>
                                Customer Message
                            </div>
                            <div class="message-content">
                                {{ $enquiry->message }}
                            </div>
                        </div>
                    </div>
                </div>
                @endif

            </div>

            <!-- Action Buttons -->
            <div class="button-group">
                <a href="{{ route('salon.enquiries.index') }}" class="btn-back">
                    <i class="fa fa-arrow-left"></i>
                    Back to List
                </a>

                @if(isset($showActions) && $showActions)
                <a href="{{ route('salon.enquiries.edit', $enquiry->id) }}" class="btn-edit">
                    <i class="fa fa-edit"></i>
                    Edit
                </a>

                <form method="POST"
                      action="{{ route('salon.enquiries.destroy', $enquiry->id) }}"
                      style="display:inline;"
                      onsubmit="return confirm('Are you sure you want to delete this enquiry?');">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn-delete">
                        <i class="fa fa-trash"></i>
                        Delete
                    </button>
                </form>
                @endif
            </div>
        </div>

    </div>
</div>

@endsection