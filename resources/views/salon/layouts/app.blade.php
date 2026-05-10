<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>A1 Makeover</title>
    
    <!-- Bootstrap & Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:opsz,wght@14..32,500&family=Lavishly+Yours&display=swap" rel="stylesheet">
    
    <style>
        /* Google Fonts - Premium */
        @import url('https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;500;600;700;800&family=Inter:wght@400;500&display=swap');

        /* ================ THEME VARIABLES ================ */
        :root{
            /* DARK MODE - RICH DARK GOLD */
            --bg-dark:#000000;
            --sidebar-dark:#0A0A0A;
            --card-dark:#0F0F0F;
            --text-dark:#FFFFFF;
            --text-soft-dark:#E0E0E0;
            --border-dark:#1E1E1E;
            --hover-dark:#151515;

            /* LIGHT MODE - WARM GOLD */
            --bg-light:#F8F7F4;
            --sidebar-light:#FFFFFF;
            --card-light:#FFFFFF;
            --text-light:#1A1A1A;
            --text-soft-light:#4A4A4A;
            --border-light:#E5E0D8;
            --hover-light:#F0EDE8;

            /* GOLD - SAME FOR BOTH */
            --gold-deep:#8B6B3E;
            --gold-rich:#A07D4A;
            --gold-dim:#745A31;
            --gold-glow:#B68F5C;

            /* DARK MODE (default) */
            --bg:var(--bg-dark);
            --sidebar:var(--sidebar-dark);
            --card:var(--card-dark);
            --text:var(--text-dark);
            --text-soft:var(--text-soft-dark);
            --border:var(--border-dark);
            --hover:var(--hover-dark);
            --glow:rgba(160, 125, 74, 0.25);
        }

        /* ================ LIGHT MODE ================ */
        body.light{
            --bg:var(--bg-light);
            --sidebar:var(--sidebar-light);
            --card:var(--card-light);
            --text:var(--text-light);
            --text-soft:var(--text-soft-light);
            --border:var(--border-light);
            --hover:var(--hover-light);
            --glow:rgba(139, 107, 62, 0.15);
        }

        /* ================ BODY ================ */
        body{
            margin:0;
         font-family:'Great Vibes', cursive;
            background:var(--bg);
            color:var(--text);
            transition:background .3s, color .3s;
        }

        /* ================ PREMIUM FONTS ================ */
        h1, h2, h3, .logo, .fancy-text{
            font-family:'Playfair Display', serif;
            font-weight:700;
        }

        /* ================ SIDEBAR ================ */
        .sidebar{
            position:fixed;
            top:0;
            left:0;
            height:100vh;
            width:70px;
            background:var(--sidebar);
            transition:.35s ease;
            overflow:hidden;
            display:flex;
            flex-direction:column;
            z-index:1000;
            border-right:2px solid var(--gold-rich);
            box-shadow:2px 0 15px var(--glow);
        }

        .sidebar:hover{
            width:220px;
        }

        /* Logo */
        .logo{
            padding:20px 16px;
            font-weight:800;
            border-bottom:1px solid var(--border);
            white-space:nowrap;
            font-size:22px;
            letter-spacing:0.5px;
            color:var(--gold-rich);
            text-shadow:0 2px 5px var(--glow);
            font-family:'Playfair Display', serif;
        }

        .logo span{
            opacity:0;
            transition:.3s;
            margin-left:6px;
            color:var(--text-soft);
            font-size:16px;
        }

        .sidebar:hover .logo span{
            opacity:1;
        }

        /* Menu */
        .menu{
            flex:1;
            padding-top:10px;
        }

        .sidebar a{
            display:flex;
            align-items:center;
            padding:12px 16px;
            color:var(--text-soft);
            text-decoration:none;
            transition:.25s;
            white-space:nowrap;
            margin:2px 4px;
            border-radius:10px;
        }

        .sidebar a i{
            min-width:38px;
            text-align:center;
            font-size:20px;
            color:var(--gold-rich);
        }

        .sidebar a span{
            opacity:0;
            transition:.3s;
            font-size:16px;
            font-weight:600;
            font-family:'Playfair Display', serif;
        }

        .sidebar:hover a span{
            opacity:1;
        }

        .sidebar a:hover{
            background:var(--hover);
            border-left:3px solid var(--gold-rich);
            box-shadow:0 2px 8px var(--glow);
        }

        .sidebar a:hover i{
            color:var(--gold-glow);
            transform:scale(1.05);
        }

        /* Logout */
        .logout-section{
            padding:5px 6px;
            border-top:1px solid var(--border);
        }

        .logout-btn{
            width:100%;
            padding:5px;
            border-radius:10px;
            background:transparent;
            border:1.5px solid var(--gold-rich);
            color:var(--gold-rich);
            transition:.25s;
            cursor:pointer;
            font-weight:600;
            font-size:14px;
            font-family:'Playfair Display', serif;
        }

        .logout-btn:hover{
            background:var(--gold-dim);
            border-color:var(--gold-glow);
            color:var(--text);
            box-shadow:0 0 12px var(--glow);
        }

        /* ================ TOPBAR ================ */
        .topbar{
            position:fixed;
            top:0;
            left:70px;
            right:0;
            height:60px;
            background:var(--card);
            display:flex;
            align-items:center;
            justify-content:space-between;
            padding:0 25px;
            font-weight:600;
            box-shadow:0 2px 10px rgba(0,0,0,0.2);
            transition:.35s ease;
            z-index:999;
            border-bottom:1px solid var(--gold-dim);
        }

        .sidebar:hover ~ .topbar{
            left:220px;
        }

        /* Topbar gold accent */
        .topbar::after{
            content:'';
            position:absolute;
            bottom:-1px;
            left:0;
            width:150px;
            height:2px;
            background:linear-gradient(90deg, var(--gold-rich), var(--gold-dim), transparent);
        }

        /* ================ THEME TOGGLE BUTTON ================ */
        .theme-toggle{
            margin-left:auto;
            display:flex;
            align-items:center;
        }

        .theme-btn{
            background:var(--hover);
            border:1.5px solid var(--gold-dim);
            border-radius:40px;
            padding:8px 18px;
            display:flex;
            align-items:center;
            gap:8px;
            cursor:pointer;
            transition:.3s;
            color:var(--text-soft);
            font-size:14px;
            font-weight:500;
        }

        .theme-btn:hover{
            border-color:var(--gold-rich);
            box-shadow:0 0 15px var(--glow);
            color:var(--gold-rich);
        }

        .theme-btn i{
            font-size:16px;
            color:var(--gold-rich);
        }

        /* Light mode specific */
        body.light .theme-btn{
            background:var(--hover);
        }

        /* ================ MAIN CONTENT ================ */
        .main{
            margin-left:60px;
            margin-top:50px;
            padding:25px;
            transition:.35s ease;
            min-height:calc(100vh - 70px);
            background:var(--bg);
        }

        .sidebar:hover ~ .main{
            margin-left:220px;
        }
        /* SIDEBAR */

.sidebar{
position:fixed;
top:0;
left:0;
height:100vh;
width:70px;
background:var(--sidebar);
transition:.35s ease;
display:flex;
flex-direction:column;
z-index:1000;
border-right:2px solid var(--gold-rich);
box-shadow:2px 0 15px var(--glow);
overflow:hidden;
}

.sidebar:hover{
width:220px;
}


/* MENU SCROLL */

.menu{
flex:1;
overflow-y:auto;
padding-top:15px;
}

/* Scrollbar styling */

.menu::-webkit-scrollbar{
width:1px;
}

.menu::-webkit-scrollbar-thumb{
background:var(--gold-rich);
border-radius:4px;
}
.logout-btn span{
opacity:0;
transition:.3s;
margin-left:6px;
}

.sidebar:hover .logout-btn span{
opacity:1;
}
.logout-btn{

align-items:center;
justify-content:center;
gap:6px;
}


/* LOGOUT FIXED BOTTOM */

.logout-section{
margin-top:auto;
padding:15px 12px;
border-top:1px solid var(--border);
background:var(--sidebar);
}

        /* ================ SCROLLBAR ================ */
        ::-webkit-scrollbar{
            width:6px;
        }

        ::-webkit-scrollbar-track{
            background:var(--bg);
        }

        ::-webkit-scrollbar-thumb{
            background:var(--gold-rich);
            border-radius:3px;
        }

        ::-webkit-scrollbar-thumb:hover{
            background:var(--gold-glow);
        }.logo{
display:flex;
align-items:center;
gap:8px;
padding:18px 16px;
border-bottom:1px solid var(--border);
}

.logo-img{
width:32px;
height:32px;
object-fit:contain;
}
.logo span{
opacity:0;
transition:.3s;
}

.sidebar:hover .logo span{
opacity:1;
}
    </style>
</head>

<body>

<!-- Sidebar -->
<div class="sidebar">
    <div class="logo">
        <img src="{{ asset('images/a1-logo.png') }}" alt="A1 Makeover Logo" class="logo-img"><span>A1 Makeover</span>
    </div>

    <div class="menu">
        <a href="/salon/dashboard">
            <i class="fa fa-home"></i>
            <span>Dashboard</span>
        </a>
       
        <a href="{{ route('services.index') }}">
            <i class="fa fa-scissors"></i>
            <span>Services</span>
        </a>
         <a href="{{ route('staff.index') }}">
            <i class="fa fa-users"></i>
            <span>Staff</span>
        </a>
        <a href="{{ route('appointments.index') }}">
            <i class="fa fa-calendar"></i>
            <span>Appointments</span>
        </a>
        <a href="{{ route('billing.index') }}">
            <i class="fa fa-file-invoice"></i>
            <span>Billing</span>
        </a>
        <a href="{{ route('staff-salary.index') }}">
            <i class="fa fa-money-bill-wave"></i>
            <span>Staff Salary</span>
        </a>
        <a href="{{ route('salary.generate.form') }}">
            <i class="fa fa-calculator"></i>
            <span>Generate Salary</span>
        </a>
        <a href="{{ route('salon.enquiries.index') }}">
            <i class="fa fa-envelope"></i>
            <span>Salon Enquiries</span>
        </a>
        <a href="/admin/dashboard" class="academy-btn">
            <i class="fa fa-graduation-cap"></i>
            <span>Academy Panel</span>
        </a>
    </div>

    <!-- Logout -->
    <div class="logout-section">
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit" class="logout-btn">
                <i class="fa fa-sign-out-alt"></i>
                <span> Logout</span>
            </button>
        </form>
    </div>
</div>

<!-- Topbar -->
<div class="topbar">
    <div>
        <i class="fa-solid fa-scissors me-2"></i>
        Salon Management Dashboard
    </div>
    
    <!-- THEME TOGGLE BUTTON -->
    <div class="theme-toggle">
        <button id="themeSwitch" class="theme-btn">
            <i class="fa fa-moon-o" id="themeIcon"></i>
            <span class="theme-text">Dark Mode</span>
        </button>
    </div>
    
    <!-- <div>
        <i class="fa-solid fa-bell me-3"></i>
        <i class="fa-solid fa-user-circle"></i>
    </div> -->
</div>

<!-- Main Content -->
<div class="main">
    @yield('content')
</div>

<!-- ================ THEME TOGGLE SCRIPT - YAHI PE RAKHO ================ -->
<script>
// ================ THEME TOGGLE ================
document.addEventListener('DOMContentLoaded', function() {
    console.log('Theme toggle script loaded');
    
    // Get elements
    const themeSwitch = document.getElementById('themeSwitch');
    const themeIcon = document.getElementById('themeIcon');
    const themeText = document.querySelector('.theme-text');
    
    // Check if elements exist
    if(!themeSwitch) {
        console.log('Theme switch button not found');
        return;
    }
    
    // Check for saved theme
    const savedTheme = localStorage.getItem('theme');
    console.log('Saved theme:', savedTheme);
    
    // Apply saved theme on load
    if(savedTheme === 'light') {
        document.body.classList.add('light');
        if(themeIcon) {
            themeIcon.classList.remove('fa-moon-o');
            themeIcon.classList.add('fa-sun-o');
        }
        if(themeText) themeText.textContent = 'Light Mode';
    }
    
    // Toggle theme function
    function toggleTheme(e) {
        e.preventDefault();
        console.log('Toggle clicked');
        
        document.body.classList.toggle('light');
        
        // Update icon and text
        if(document.body.classList.contains('light')) {
            if(themeIcon) {
                themeIcon.classList.remove('fa-moon-o');
                themeIcon.classList.add('fa-sun-o');
            }
            if(themeText) themeText.textContent = 'Light Mode';
            localStorage.setItem('theme', 'light');
            console.log('Switched to light mode');
        } else {
            if(themeIcon) {
                themeIcon.classList.remove('fa-sun-o');
                themeIcon.classList.add('fa-moon-o');
            }
            if(themeText) themeText.textContent = 'Dark Mode';
            localStorage.setItem('theme', 'dark');
            console.log('Switched to dark mode');
        }
        
        // Trigger theme change event for charts
        window.dispatchEvent(new Event('themeChanged'));
    }
    
    // Add click event
    themeSwitch.addEventListener('click', toggleTheme);
});
</script>

<!-- Bootstrap JS (optional) -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

<!-- @stack('scripts') for page-specific scripts -->


</body>
</html>