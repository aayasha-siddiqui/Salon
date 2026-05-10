@extends('salon.layouts.app')

@section('content')

<style>
/* ================ INVOICE SHOW PAGE - DARK GOLD THEME ================ */

/* ================ PAGE CONTAINER ================ */
.invoice-wrapper{
    padding:30px 20px;
    min-height:calc(100vh - 70px);
    background:var(--bg);
}

/* ================ INVOICE BOX ================ */
.invoice-box{
    max-width:900px;
    margin:0 auto;
    background:var(--card);
    border:1.5px solid var(--gold-dim);
    border-radius:24px;
    padding:40px;
    box-shadow:0 15px 40px rgba(0,0,0,0.3);
    position:relative;
    overflow:hidden;
    transition:.3s;
}

.invoice-box:hover{
    border-color:var(--gold-rich);
    box-shadow:0 20px 50px var(--glow);
}

/* Gold accent on top */
.invoice-box::before{
    content:'';
    position:absolute;
    top:0;
    left:0;
    width:100%;
    height:4px;
    background:linear-gradient(90deg, var(--gold-rich), var(--gold-dim));
    opacity:0.7;
}

/* ================ INVOICE HEADER ================ */
.invoice-header{
    display:flex;
    justify-content:space-between;
    align-items:flex-start;
    flex-wrap:wrap;
    gap:20px;
    margin-bottom:20px;
}

/* Salon Name */
.salon-name{
    font-family:'Playfair Display', serif;
    font-size:32px;
    font-weight:800;
    color:var(--gold-rich);
    line-height:1.2;
    letter-spacing:-0.5px;
}

.salon-subtitle{
    color:var(--text-soft);
    font-size:14px;
    margin-top:5px;
}

/* Invoice Info */
.invoice-info{
    text-align:right;
    background:var(--hover);
    padding:15px 20px;
    border-radius:16px;
    border:1px solid var(--border);
}

.invoice-info strong{
    color:var(--gold-rich);
    font-weight:600;
}

.invoice-info .invoice-number{
    font-size:18px;
    font-weight:700;
    color:var(--gold-rich);
    margin-bottom:5px;
}

.invoice-info .invoice-date{
    color:var(--text-soft);
    font-size:14px;
}

.invoice-info .invoice-date i{
    color:var(--gold-rich);
    margin-right:5px;
}

/* ================ DIVIDER ================ */
.invoice-divider{
    border-top:2px dashed var(--gold-dim);
    margin:25px 0;
    opacity:0.5;
}

/* ================ CUSTOMER DETAILS ================ */
.customer-section{
    background:var(--hover);
    border-radius:18px;
    padding:20px;
    margin-bottom:25px;
    border:1px solid var(--border);
}

.customer-title{
    font-size:14px;
    color:var(--gold-rich);
    font-weight:600;
    text-transform:uppercase;
    letter-spacing:0.5px;
    margin-bottom:15px;
    display:flex;
    align-items:center;
    gap:8px;
}

.customer-detail{
    display:flex;
    align-items:center;
    gap:10px;
    margin-bottom:8px;
}

.customer-detail i{
    width:20px;
    color:var(--gold-rich);
    font-size:14px;
}

.customer-detail .label{
    color:var(--text-soft);
    font-size:13px;
    min-width:60px;
}

.customer-detail .value{
    color:var(--text);
    font-weight:500;
    font-size:15px;
}

/* ================ TABLE ================ */
.table-container{
    overflow-x:auto;
    margin:25px 0;
    border-radius:16px;
    border:1px solid var(--border);
}

.table{
    width:100%;
    border-collapse:collapse;
    min-width:600px;
}

.table thead{
    background:linear-gradient(135deg, var(--gold-rich), var(--gold-dim));
}

.table thead th{
    color:#000000;
    font-weight:600;
    font-size:14px;
    padding:15px 12px;
    text-align:left;
    border:none;
}

.table thead th.text-end{
    text-align:right;
}

.table tbody td{
    padding:15px 12px;
    color:var(--text);
    border-bottom:1px solid var(--border);
    background:var(--card);
    font-size:14px;
}

.table tbody tr:last-child td{
    border-bottom:none;
}

.table tbody tr:hover td{
    background:var(--hover);
}

.table tbody td.text-end{
    text-align:right;
    font-weight:600;
    color:var(--gold-rich);
}

/* Service name with icon */
.service-name{
    display:flex;
    align-items:center;
    gap:8px;
}

.service-name i{
    color:var(--gold-rich);
    font-size:14px;
}

/* Staff name */
.staff-name{
    display:flex;
    align-items:center;
    gap:8px;
    color:var(--text-soft);
    font-size:13px;
}

.staff-name i{
    color:var(--gold-rich);
    font-size:12px;
}

/* ================ TOTAL BOX ================ */
.total-section{
    margin-top:25px;
    display:flex;
    justify-content:flex-end;
}

.total-box{
    background:var(--hover);
    border-radius:18px;
    padding:25px;
    min-width:300px;
    border:1px solid var(--border);
}

.total-row{
    display:flex;
    justify-content:space-between;
    align-items:center;
    padding:8px 0;
    color:var(--text-soft);
    font-size:14px;
}

.total-row:not(:last-child){
    border-bottom:1px dashed var(--border);
}

.total-row .label{
    display:flex;
    align-items:center;
    gap:8px;
}

.total-row .label i{
    color:var(--gold-rich);
    width:18px;
}

.total-row .value{
    font-weight:600;
}

/* New payment rows */
.total-row.paid-row .value{
    color: #198754;
    font-weight:700;
}

.total-row.remaining-row .value{
    color: #dc3545;
    font-weight:700;
}

.total-row.final{
    margin-top:8px;
    padding-top:12px;
    border-top:2px solid var(--gold-rich);
}

.total-row.final .label{
    color:var(--gold-rich);
    font-weight:700;
    font-size:16px;
}

.total-row.final .value{
    color:var(--gold-rich);
    font-weight:800;
    font-size:22px;
}

/* Payment info */
.payment-info{
    margin-top:15px;
    padding-top:15px;
    border-top:1px solid var(--border);
    display:flex;
    flex-direction:column;
    gap:10px;
}

.payment-method{
    display:flex;
    align-items:center;
    gap:10px;
    color:var(--text-soft);
    font-size:13px;
}

.payment-method i{
    color:var(--gold-rich);
}

.payment-method strong{
    color:var(--text);
    margin-left:5px;
}

/* Status Badge */
.status-badge{
    display:inline-block;
    padding:8px 18px;
    border-radius:40px;
    font-size:13px;
    font-weight:600;
    margin-top:10px;
}

.status-badge.paid{
    background:rgba(25, 135, 84, 0.2);
    color:#198754;
    border:1px solid #198754;
}

.status-badge.partial{
    background:rgba(255, 193, 7, 0.2);
    color:#ffc107;
    border:1px solid #ffc107;
}

.status-badge.pending{
    background:rgba(108, 117, 125, 0.2);
    color:#6c757d;
    border:1px solid #6c757d;
}

/* Dark mode badge adjustments */
body:not(.light) .status-badge.paid{
    background:rgba(25, 135, 84, 0.3);
    color:#6fcf97;
}

body:not(.light) .status-badge.partial{
    background:rgba(255, 193, 7, 0.3);
    color:#ffe083;
}

body:not(.light) .status-badge.pending{
    background:rgba(108, 117, 125, 0.3);
    color:#adb5bd;
}

/* ================ ACTION BUTTONS ================ */
.action-buttons{
    margin-top:30px;
    display:flex;
    justify-content:flex-end;
    gap:15px;
    flex-wrap:wrap;
}

.btn-whatsapp{
    background:#25D366;
    color:#000000;
    border:none;
    border-radius:40px;
    padding:12px 25px;
    font-weight:600;
    font-size:14px;
    transition:.3s;
    display:inline-flex;
    align-items:center;
    gap:8px;
    text-decoration:none;
}

.btn-whatsapp:hover{
    background:#128C7E;
    color:#ffffff;
    transform:translateY(-3px);
    box-shadow:0 8px 20px rgba(37,211,102,0.3);
}

.btn-print{
    background:transparent;
    border:1.5px solid var(--gold-rich);
    color:var(--gold-rich);
    border-radius:40px;
    padding:12px 25px;
    font-weight:600;
    font-size:14px;
    transition:.3s;
    display:inline-flex;
    align-items:center;
    gap:8px;
    cursor:pointer;
}

.btn-print:hover{
    background:var(--gold-rich);
    color:#000000;
    transform:translateY(-3px);
    box-shadow:0 8px 20px var(--glow);
}

/* ================ LIGHT MODE ADJUSTMENTS ================ */
body.light .invoice-box{
    box-shadow:0 10px 30px rgba(0,0,0,0.05);
}

body.light .invoice-info{
    background:#f8f8f8;
}

body.light .customer-section{
    background:#f8f8f8;
}

body.light .total-box{
    background:#f8f8f8;
}

/* ================ PRINT STYLES ================ */
@media print{
    body{
        background:white;
    }
    
    .sidebar,
    .topbar,
    .action-buttons,
    .btn-print,
    .btn-whatsapp{
        display:none !important;
    }
    
    .main{
        margin:0 !important;
        padding:0 !important;
    }
    
    .invoice-wrapper{
        padding:0;
        background:white;
    }
    
    .invoice-box{
        box-shadow:none;
        border:1px solid #ddd;
        padding:30px;
    }
    
    .invoice-box::before{
        display:none;
    }
    
    .table thead{
        background:#f5f5f5;
        -webkit-print-color-adjust:exact;
        print-color-adjust:exact;
    }
    
    .status-badge{
        border:1px solid #000;
        -webkit-print-color-adjust:exact;
        print-color-adjust:exact;
    }
}

/* ================ RESPONSIVE ================ */
@media (max-width:768px){
    .invoice-box{
        padding:25px;
    }
    
    .salon-name{
        font-size:24px;
    }
    
    .invoice-header{
        flex-direction:column;
        align-items:flex-start;
    }
    
    .invoice-info{
        text-align:left;
        width:100%;
    }
    
    .total-section{
        justify-content:stretch;
    }
    
    .total-box{
        width:100%;
    }
    
    .action-buttons{
        flex-direction:column;
    }
    
    .btn-whatsapp,
    .btn-print{
        width:100%;
        justify-content:center;
    }
}
</style>

<div class="invoice-wrapper">
    <div class="invoice-box">

        <!-- Invoice Header -->
        <div class="invoice-header">
            <div>
                <div class="salon-name">A1 Makeover Salon</div>
                <div class="salon-subtitle">
                    <i class="fa fa-star me-1" style="color:var(--gold-rich);"></i>
                    Professional Beauty Studio
                </div>
            </div>

            <div class="invoice-info">
                <div class="invoice-number">
                    <i class="fa fa-hashtag me-1"></i>
                    {{ $bill->bill_number }}
                </div>
                <div class="invoice-date">
                    <i class="fa fa-calendar"></i>
                    {{ \Carbon\Carbon::parse($bill->bill_date)->format('d M, Y') }}
                </div>
            </div>
        </div>

        <!-- Divider -->
        <div class="invoice-divider"></div>

        <!-- Customer Details -->
        <div class="customer-section">
            <div class="customer-title">
                <i class="fa fa-user-circle"></i>
                Customer Details
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="customer-detail">
                        <i class="fa fa-user"></i>
                        <span class="label">Name:</span>
                        <span class="value">{{ $bill->customer_name }}</span>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="customer-detail">
                        <i class="fa fa-phone"></i>
                        <span class="label">Phone:</span>
                        <span class="value">{{ $bill->customer_phone }}</span>
                    </div>
                </div>
            </div>
        </div>

        <!-- Services Table -->
        <div class="table-container">
            <table class="table">
                <thead>
                    <tr>
                        <th>
                            <i class="fa fa-scissors me-1"></i>
                            Service
                        </th>
                        <th>
                            <i class="fa fa-user-tie me-1"></i>
                            Staff
                        </th>
                        <th class="text-end">
                            <i class="fa fa-indian-rupee-sign me-1"></i>
                            Price
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($bill->items as $item)
                    <tr>
                        <td>
                            <div class="service-name">
                                <i class="fa fa-spa"></i>
                                {{ $item->service->name }}
                            </div>
                        </td>
                        <td>
                            <div class="staff-name">
                                <i class="fa fa-user"></i>
                                {{ $item->staff->name ?? '-' }}
                            </div>
                        </td>
                        <td class="text-end">₹{{ number_format($item->price, 2) }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <!-- Total Section -->
        <div class="total-section">
            <div class="total-box">
                <div class="total-row">
                    <span class="label">
                        <i class="fa fa-file-text"></i>
                        Subtotal
                    </span>
                    <span class="value">₹{{ number_format($bill->subtotal, 2) }}</span>
                </div>

                <div class="total-row">
                    <span class="label">
                        <i class="fa fa-percent"></i>
                        Discount
                    </span>
                    <span class="value">- ₹{{ number_format($bill->discount, 2) }}</span>
                </div>

                <div class="total-row final">
                    <span class="label">
                        <i class="fa fa-money-bill-wave"></i>
                        Total Amount
                    </span>
                    <span class="value">₹{{ number_format($bill->total_amount, 2) }}</span>
                </div>

                <!-- New: Paid Amount -->
                <div class="total-row paid-row">
                    <span class="label">
                        <i class="fa fa-check-circle" style="color:#198754;"></i>
                        Paid Amount
                    </span>
                    <span class="value">₹{{ number_format($bill->paid_amount ?? 0, 2) }}</span>
                </div>

                <!-- New: Remaining Amount -->
                <div class="total-row remaining-row">
                    <span class="label">
                        <i class="fa fa-clock" style="color:#dc3545;"></i>
                        Remaining Amount
                    </span>
                    <span class="value">₹{{ number_format($bill->remaining_amount ?? $bill->total_amount, 2) }}</span>
                </div>

                <!-- Payment Info -->
                <div class="payment-info">
                    <div class="payment-method">
                        <i class="fa fa-credit-card"></i>
                        <span>Payment Method:</span>
                        <strong>{{ ucfirst($bill->payment_method) }}</strong>
                    </div>

                    <div>
                        @if($bill->payment_status == 'paid')
                            <span class="status-badge paid">
                                <i class="fa fa-check-circle me-1"></i>
                                Fully Paid
                            </span>
                        @elseif($bill->payment_status == 'partial')
                            <span class="status-badge partial">
                                <i class="fa fa-adjust me-1"></i>
                                Partially Paid
                            </span>
                        @else
                            <span class="status-badge pending">
                                <i class="fa fa-clock me-1"></i>
                                Pending
                            </span>
                        @endif
                    </div>

                    <!-- Show payment summary if partially paid -->
                    @if($bill->payment_status == 'partial' && ($bill->paid_amount ?? 0) > 0)
                    <div style="font-size:12px; color:var(--text-soft); margin-top:5px; padding-top:5px; border-top:1px dashed var(--border);">
                        <i class="fa fa-info-circle me-1" style="color:var(--gold-rich);"></i>
                        Paid: ₹{{ number_format($bill->paid_amount, 2) }} | 
                        Due: ₹{{ number_format($bill->remaining_amount, 2) }}
                    </div>
                    @endif
                </div>
            </div>
        </div>

        <!-- Action Buttons -->
        <div class="action-buttons">
            <a href="https://wa.me/{{ $bill->customer_phone }}?text={{ urlencode('Hello '.$bill->customer_name.',

🧾 *A1 Makeover Salon - Invoice*

━━━━━━━━━━━━━━━━━━
📋 Invoice: '.$bill->bill_number.'
📅 Date: '.$bill->bill_date.'
💰 Total: ₹'.number_format($bill->total_amount, 2).'
💳 Paid: ₹'.number_format($bill->paid_amount ?? 0, 2).'
⏳ Remaining: ₹'.number_format($bill->remaining_amount ?? $bill->total_amount, 2).'
📊 Status: '.strtoupper($bill->payment_status).'

━━━━━━━━━━━━━━━━━━
✨ Thank you for choosing us!
Visit again soon! 🌟') }}"
               target="_blank"
               class="btn-whatsapp">
                <i class="fa fa-whatsapp"></i>
                Send via WhatsApp
            </a>

            <button onclick="window.print()" class="btn-print">
                <i class="fa fa-print"></i>
                Print Invoice
            </button>
        </div>

    </div>
</div>

@endsection