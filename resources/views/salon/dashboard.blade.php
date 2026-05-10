@extends('salon.layouts.app')

@section('content')

<style>
/* ================ DASHBOARD PAGE - DARK GOLD THEME ================ */

/* Dashboard Title */
.dashboard-title{
    font-family:'Playfair Display', serif;
    font-weight:700;
    margin-bottom:30px;
    color:var(--gold-rich);
    font-size: clamp(24px, 4vw, 32px);
    letter-spacing:0.5px;
    text-shadow:0 2px 5px var(--glow);
    position:relative;
    display:inline-block;
}

.dashboard-title::after{
    content:'';
    position:absolute;
    bottom:-8px;
    left:0;
    width:60px;
    height:3px;
    background:linear-gradient(90deg, var(--gold-rich), var(--gold-dim));
    border-radius:2px;
}

/* Stat Cards */
.stat-card{
    background:var(--card);
    border-radius:18px;
    padding:22px 20px;
    box-shadow:0 8px 25px rgba(0,0,0,0.3);
    transition:.3s ease;
    border:1.5px solid var(--gold-dim);
    position:relative;
    overflow:hidden;
    height:100%;
}

.stat-card:hover{
    transform:translateY(-6px);
    border-color:var(--gold-rich);
    box-shadow:0 15px 35px var(--glow);
}

.stat-card::before{
    content:"";
    position:absolute;
    top:0;
    left:0;
    height:4px;
    width:100%;
    background:linear-gradient(90deg, var(--gold-rich), var(--gold-dim));
    opacity:0.7;
}

.stat-title{
    font-size:13px;
    color:var(--text-soft);
    font-weight:600;
    text-transform:uppercase;
    letter-spacing:0.5px;
    margin-bottom:6px;
}

.stat-value{
    font-size: clamp(24px, 3vw, 32px);
    font-weight:700;
    color:var(--text);
    font-family:'Playfair Display', serif;
    line-height:1.2;
}

.stat-icon{
    width:54px;
    height:54px;
    border-radius:16px;
    display:flex;
    align-items:center;
    justify-content:center;
    font-size:24px;
    background:var(--hover);
    color:var(--gold-rich) !important;
    border:1.5px solid var(--gold-dim);
    box-shadow:0 6px 14px var(--glow);
    transition:.3s;
}

.stat-card:hover .stat-icon{
    background:var(--gold-rich);
    color:#000000 !important;
    transform:scale(1.08) rotate(3deg);
    border-color:var(--gold-glow);
    box-shadow:0 0 25px var(--glow);
}

/* Icons - All Gold */
.icon-blue, .icon-purple, .icon-green, .icon-orange,
.icon-teal, .icon-pink, .icon-dark{
    color:var(--gold-rich) !important;
}

/* Chart Boxes */
.chart-box{
    background:var(--card);
    border-radius:18px;
    padding:22px;
    box-shadow:0 8px 25px rgba(0,0,0,0.3);
    border:1.5px solid var(--gold-dim);
    height:100%;
    min-height:350px;
    transition:.3s;
    display:flex;
    flex-direction:column;
}

.chart-box:hover{
    border-color:var(--gold-rich);
    box-shadow:0 15px 35px var(--glow);
}

.chart-box h6{
    color:var(--text);
    font-weight:600;
    margin-bottom:15px;
    font-family:'Playfair Display', serif;
    font-size:18px;
    padding-bottom:8px;
    border-bottom:1px solid var(--border);
}

.chart-box h6::after{
    content:'';
    display:block;
    width:50px;
    height:2px;
    background:var(--gold-rich);
    margin-top:5px;
    opacity:0.5;
}

.chart-box canvas{
    max-height:280px !important;
    width:100% !important;
    flex:1;
}

/* Card Link */
.card-link{
    text-decoration:none;
    color:inherit;
    display:block;
    height:100%;
}

/* Light Mode Adjustments */
body.light .stat-card{
    box-shadow:0 8px 20px rgba(0,0,0,0.05);
}

/* Responsive */
@media (max-width: 768px) {
    .stat-icon{
        width:48px;
        height:48px;
        font-size:20px;
    }
    .chart-box{
        min-height:300px;
        padding:18px;
    }
    .chart-box canvas{
        max-height:220px !important;
    }
}
</style>

<div class="container-fluid px-3 px-md-4">
    
    <!-- Dashboard Title -->
    <h4 class="dashboard-title">
        <i class="fa fa-chart-pie me-2"></i>
        Dashboard Overview
    </h4>

    <!-- Stats Cards Row -->
    <div class="row g-4">
        <!-- STAFF -->
        <div class="col-lg-3 col-md-6 col-sm-6">
            <a href="{{ route('staff.index') }}" class="card-link">
                <div class="stat-card">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <div class="stat-title">Total Staff</div>
                            <div class="stat-value">{{ $totalStaff ?? 0 }}</div>
                        </div>
                        <div class="stat-icon icon-blue">
                            <i class="fa fa-users"></i>
                        </div>
                    </div>
                </div>
            </a>
        </div>

        <!-- SERVICES -->
        <div class="col-lg-3 col-md-6 col-sm-6">
            <a href="{{ route('services.index') }}" class="card-link">
                <div class="stat-card">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <div class="stat-title">Total Services</div>
                            <div class="stat-value">{{ $totalServices ?? 0 }}</div>
                        </div>
                        <div class="stat-icon icon-purple">
                            <i class="fa fa-scissors"></i>
                        </div>
                    </div>
                </div>
            </a>
        </div>

        <!-- APPOINTMENTS -->
        <div class="col-lg-3 col-md-6 col-sm-6">
            <a href="{{ route('appointments.index') }}" class="card-link">
                <div class="stat-card">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <div class="stat-title">Appointments</div>
                            <div class="stat-value">{{ $totalAppointments ?? 0 }}</div>
                        </div>
                        <div class="stat-icon icon-green">
                            <i class="fa fa-calendar-check"></i>
                        </div>
                    </div>
                </div>
            </a>
        </div>

        <!-- ENQUIRIES -->
        <div class="col-lg-3 col-md-6 col-sm-6">
            <a href="{{ route('salon.enquiries.index') }}" class="card-link">
                <div class="stat-card">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <div class="stat-title">Enquiries</div>
                            <div class="stat-value">{{ $totalEnquiries ?? 0 }}</div>
                        </div>
                        <div class="stat-icon icon-orange">
                            <i class="fa fa-envelope"></i>
                        </div>
                    </div>
                </div>
            </a>
        </div>

        <!-- TOTAL INCOME -->
        <div class="col-lg-4 col-md-4 col-sm-6">
            <div class="stat-card">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <div class="stat-title">Total Income</div>
                        <div class="stat-value">₹{{ number_format($totalIncome ?? 0, 0) }}</div>
                    </div>
                    <div class="stat-icon icon-teal">
                        <i class="fa fa-chart-line"></i>
                    </div>
                </div>
            </div>
        </div>

        <!-- MONTH INCOME -->
        <div class="col-lg-4 col-md-4 col-sm-6">
            <div class="stat-card">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <div class="stat-title">This Month Income</div>
                        <div class="stat-value">₹{{ number_format($thisMonthIncome ?? 0, 0) }}</div>
                    </div>
                    <div class="stat-icon icon-pink">
                        <i class="fa fa-coins"></i>
                    </div>
                </div>
            </div>
        </div>

        <!-- SALARY -->
        <div class="col-lg-4 col-md-4 col-sm-6">
            <div class="stat-card">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <div class="stat-title">Total Staff Salary</div>
                        <div class="stat-value">₹{{ number_format($totalSalary ?? 0, 0) }}</div>
                    </div>
                    <div class="stat-icon icon-dark">
                        <i class="fa fa-money-bill-wave"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Charts Row -->
    <div class="row mt-5 g-4">
        <div class="col-lg-6 col-md-12">
            <div class="chart-box">
                <h6>
                    <i class="fa fa-chart-line me-2" style="color:var(--gold-rich);"></i>
                    Income Trend (6 Months)
                </h6>
                <canvas id="incomeChart"></canvas>
            </div>
        </div>

        <div class="col-lg-6 col-md-12">
            <div class="chart-box">
                <h6>
                    <i class="fa fa-chart-pie me-2" style="color:var(--gold-rich);"></i>
                    Appointments vs Enquiries
                </h6>
                <canvas id="compareChart"></canvas>
            </div>
        </div>
    </div>
</div>

<!-- Chart.js -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<!-- Dashboard Charts Script with Theme Toggle Integration -->
<script>
// ================ DASHBOARD CHARTS ================
document.addEventListener('DOMContentLoaded', function() {
    
    // Chart instances
    let incomeChart, compareChart;
    
    // Get chart data from server
    const months = @json($months );
    const incomeData = @json($incomeData );
    const totalAppointments = {{ $totalAppointments ?? 0 }};
    const totalEnquiries = {{ $totalEnquiries ?? 0 }};
    
    // Chart elements
    const incomeChartEl = document.getElementById('incomeChart');
    const compareChartEl = document.getElementById('compareChart');
    
    if(!incomeChartEl || !compareChartEl) return;
    
    // ========== FUNCTION TO GET THEME COLORS ==========
    function getThemeColors() {
        const isLight = document.body.classList.contains('light');
        
        return {
            gold: '#8B6B3E',
            goldLight: '#A07D4A',
            goldDim: '#745A31',
            textColor: isLight ? '#4A4A4A' : '#E0E0E0',
            cardBg: isLight ? '#FFFFFF' : '#0F0F0F',
            gridColor: `rgba(139, 107, 62, ${isLight ? 0.1 : 0.2})`,
            pointBorderColor: isLight ? '#FFFFFF' : '#000000'
        };
    }
    
    // ========== FUNCTION TO CREATE CHARTS ==========
    function createCharts() {
        const colors = getThemeColors();
        
        // Destroy existing charts if they exist
        if(incomeChart) incomeChart.destroy();
        if(compareChart) compareChart.destroy();
        
        // Income Chart (Line)
        incomeChart = new Chart(incomeChartEl, {
            type: 'line',
            data: {
                labels: months,
                datasets: [{
                    label: 'Income (₹)',
                    data: incomeData,
                    borderColor: colors.gold,
                    backgroundColor: `rgba(139, 107, 62, 0.1)`,
                    borderWidth: 3,
                    tension: 0.4,
                    fill: true,
                    pointBackgroundColor: colors.goldLight,
                    pointBorderColor: colors.pointBorderColor,
                    pointRadius: 5,
                    pointHoverRadius: 8,
                    pointHoverBackgroundColor: colors.gold
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        display: false
                    },
                    tooltip: {
                        backgroundColor: colors.cardBg,
                        titleColor: colors.gold,
                        bodyColor: colors.textColor,
                        borderColor: colors.gold,
                        borderWidth: 1,
                        callbacks: {
                            label: function(context) {
                                return '₹ ' + context.parsed.y.toFixed(2);
                            }
                        }
                    }
                },
                scales: {
                    y: {
                        beginAtZero: true,
                        grid: {
                            color: colors.gridColor,
                            drawBorder: false
                        },
                        ticks: {
                            color: colors.textColor,
                            callback: function(value) {
                                return '₹' + value;
                            }
                        }
                    },
                    x: {
                        grid: {
                            display: false
                        },
                        ticks: {
                            color: colors.textColor
                        }
                    }
                }
            }
        });
        
        // Compare Chart (Doughnut)
        compareChart = new Chart(compareChartEl, {
            type: 'doughnut',
            data: {
                labels: ['Appointments', 'Enquiries'],
                datasets: [{
                    data: [totalAppointments, totalEnquiries],
                    backgroundColor: [colors.gold, colors.goldLight],
                    borderColor: colors.cardBg,
                    borderWidth: 3,
                    hoverOffset: 8,
                    hoverBackgroundColor: [colors.goldLight, colors.gold]
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                cutout: '65%',
                plugins: {
                    legend: {
                        position: 'bottom',
                        labels: {
                            color: colors.textColor,
                            font: {
                                family: 'Inter',
                                size: 12,
                                weight: '500'
                            },
                            padding: 15,
                            usePointStyle: true,
                            pointStyle: 'circle'
                        }
                    },
                    tooltip: {
                        backgroundColor: colors.cardBg,
                        titleColor: colors.gold,
                        bodyColor: colors.textColor,
                        borderColor: colors.gold,
                        borderWidth: 1,
                        callbacks: {
                            label: function(context) {
                                const label = context.label || '';
                                const value = context.raw || 0;
                                const total = context.dataset.data.reduce((a, b) => a + b, 0);
                                const percentage = total > 0 ? ((value / total) * 100).toFixed(1) : 0;
                                return `${label}: ${value} (${percentage}%)`;
                            }
                        }
                    }
                }
            }
        });
    }
    
    // ========== INITIAL CHARTS CREATION ==========
    createCharts();
    
    // ========== LISTEN FOR THEME CHANGES ==========
    window.addEventListener('themeChanged', function() {
        console.log('Theme changed, updating charts...');
        createCharts(); // Recreate charts with new theme colors
    });
    
    // Also listen for storage events (if theme changed in another tab)
    window.addEventListener('storage', function(e) {
        if(e.key === 'theme') {
            createCharts();
        }
    });
});
</script>

<!-- Optional: Add this if you want manual theme toggle in dashboard -->
<script>
// ================ MANUAL THEME TOGGLE (if not already in app.blade.php) ================
document.addEventListener('DOMContentLoaded', function() {
    // Check if theme toggle already exists in app layout
    const themeSwitch = document.getElementById('themeSwitch');
    
    if(!themeSwitch) {
        // If no theme toggle in app layout, add one to dashboard
        const topbarRight = document.querySelector('.topbar-right');
        if(topbarRight) {
            const toggleHtml = `
                <div class="theme-toggle ms-3">
                    <button id="dashboardThemeSwitch" class="theme-btn">
                        <i class="fa ${document.body.classList.contains('light') ? 'fa-sun-o' : 'fa-moon-o'}" id="dashboardThemeIcon"></i>
                        <span class="theme-text">${document.body.classList.contains('light') ? 'Light Mode' : 'Dark Mode'}</span>
                    </button>
                </div>
            `;
            topbarRight.insertAdjacentHTML('afterbegin', toggleHtml);
            
            // Add click handler
            document.getElementById('dashboardThemeSwitch').addEventListener('click', function() {
                document.body.classList.toggle('light');
                const icon = document.getElementById('dashboardThemeIcon');
                const text = this.querySelector('.theme-text');
                
                if(document.body.classList.contains('light')) {
                    icon.classList.remove('fa-moon-o');
                    icon.classList.add('fa-sun-o');
                    text.textContent = 'Light Mode';
                    localStorage.setItem('theme', 'light');
                } else {
                    icon.classList.remove('fa-sun-o');
                    icon.classList.add('fa-moon-o');
                    text.textContent = 'Dark Mode';
                    localStorage.setItem('theme', 'dark');
                }
                
                // Dispatch theme change event
                window.dispatchEvent(new Event('themeChanged'));
            });
        }
    }
});
</script>

@endsection