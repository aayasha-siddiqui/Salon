<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>A1 Makeover – Premium Unisex Salon & Academy</title>
    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- Google Fonts - Enhanced with more elegant options -->
    <link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:wght@400;500;600;700&family=Montserrat:wght@300;400;500;600;700&family=Dancing+Script:wght@400;700&display=swap" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <!-- AOS Animation -->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <!-- Animate.css for additional animations -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
    <style>
        * { margin:0; padding:0; box-sizing:border-box; }
        body { 
            font-family:'Montserrat', sans-serif; 
            background:#0a0a0a; 
            color:#fff; 
            overflow-x:hidden;
        }
        h1,h2,h3,.logo { 
            font-family:'Cormorant Garamond', serif; 
            font-weight:700;
        }
        .script-font {
            font-family:'Dancing Script', cursive;
        }

        /* Custom Animations */
        @keyframes float {
            0%{transform:translateY(0px) rotate(0deg);}
            50%{transform:translateY(-20px) rotate(2deg);}
            100%{transform:translateY(0px) rotate(0deg);}
        }
        @keyframes glow {
            0%{box-shadow:0 0 15px rgba(197,160,89,0.3);}
            50%{box-shadow:0 0 50px rgba(197,160,89,0.8), 0 0 30px rgba(197,160,89,0.5);}
            100%{box-shadow:0 0 15px rgba(197,160,89,0.3);}
        }
        @keyframes shimmer {
            0%{background-position:-1000px 0;}
            100%{background-position:1000px 0;}
        }
        @keyframes pulse-gold {
            0%{opacity:0.6; transform:scale(1);}
            50%{opacity:1; transform:scale(1.05);}
            100%{opacity:0.6; transform:scale(1);}
        }
        @keyframes slideInLeft {
            from{transform:translateX(-100px); opacity:0;}
            to{transform:translateX(0); opacity:1;}
        }
        @keyframes slideInRight {
            from{transform:translateX(100px); opacity:0;}
            to{transform:translateX(0); opacity:1;}
        }
        @keyframes fadeInUp {
            from{transform:translateY(50px); opacity:0;}
            to{transform:translateY(0); opacity:1;}
        }
        @keyframes rotateIn {
            from{transform:rotate(-180deg) scale(0); opacity:0;}
            to{transform:rotate(0) scale(1); opacity:1;}
        }
        
        .animate-float { animation:float 4s ease-in-out infinite; }
        .animate-glow { animation:glow 2s ease-in-out infinite; }
        .animate-shimmer { 
            background: linear-gradient(90deg, transparent, rgba(197,160,89,0.2), transparent);
            background-size: 1000px 100%;
            animation:shimmer 3s infinite;
        }
        .animate-pulse-gold { animation:pulse-gold 2s ease-in-out infinite; }
        .animate-slide-left { animation:slideInLeft 1s ease-out; }
        .animate-slide-right { animation:slideInRight 1s ease-out; }
        .animate-fade-up { animation:fadeInUp 1s ease-out; }
        .animate-rotate { animation:rotateIn 1s ease-out; }
        
        /* Hover Animations */
        .hover-gold-spin:hover i { transform:rotate(360deg); transition:transform 0.6s; }
        .hover-gold-glow:hover { filter:drop-shadow(0 0 15px #C5A059); transition:all 0.3s; }
        .hover-scale { transition:transform 0.3s ease; }
        .hover-scale:hover { transform:scale(1.05); }
        .hover-lift { transition:transform 0.3s ease, box-shadow 0.3s ease; }
        .hover-lift:hover { transform:translateY(-10px) scale(1.02); box-shadow:0 20px 40px -10px rgba(197,160,89,0.5); }
        .hover-border-expand { position:relative; overflow:hidden; }
        .hover-border-expand::after { content:''; position:absolute; bottom:0; left:50%; width:0; height:2px; background:#C5A059; transition:all 0.3s; transform:translateX(-50%); }
        .hover-border-expand:hover::after { width:100%; }
        
        /* gold */
        .gold-gradient { 
            background:linear-gradient(135deg,#C5A059 0%,#E5C687 50%,#C5A059 100%); 
            -webkit-background-clip:text; 
            -webkit-text-fill-color:transparent; 
            background-clip:text;
            background-size:200% 200%;
            animation:gradientMove 3s ease infinite;
        }
        @keyframes gradientMove {
            0%{background-position:0% 50%;}
            50%{background-position:100% 50%;}
            100%{background-position:0% 50%;}
        }
        
        .gold-bg { 
            background:linear-gradient(135deg,#C5A059 0%,#E5C687 50%,#C5A059 100%);
            background-size:200% 200%;
            animation:gradientMove 3s ease infinite;
        }
        .gold-text { color:#C5A059; }
        .hover-gold:hover { color:#C5A059; transition:all 0.3s; }

        /* cards with enhanced hover */
        .premium-card { 
            background:linear-gradient(145deg,#1a1a1a,#0d0d0d); 
            border:1px solid #333; 
            border-radius:30px; 
            overflow:hidden; 
            transition:0.5s;
            position:relative;
        }
        .premium-card::before {
            content:'';
            position:absolute;
            top:0;
            left:-100%;
            width:100%;
            height:100%;
            background:linear-gradient(90deg, transparent, rgba(197,160,89,0.2), transparent);
            transition:left 0.7s;
        }
        .premium-card:hover::before {
            left:100%;
        }
        .premium-card:hover { 
            transform:translateY(-10px) scale(1.02); 
            border-color:#C5A059; 
            box-shadow:0 30px 50px -15px rgba(197,160,89,0.5);
        }
        .premium-card img { 
            height:220px; 
            object-fit:cover; 
            width:100%; 
            transition:0.7s;
        }
        .premium-card:hover img { 
            transform:scale(1.1) rotate(1deg); 
        }

        /* sliders */
        .slider-container { position:relative; overflow:hidden; border-radius:30px; padding:15px 0; }
        .slider-track { display:flex; transition:transform 0.6s cubic-bezier(0.4, 0, 0.2, 1); gap:20px; padding:5px; }
        .slider-item { min-width:calc(33.333% - 14px); flex-shrink:0; transition:0.3s; }
        .slider-item:hover { transform:scale(1.02) translateY(-5px); }
        @media (max-width:768px){ .slider-item { min-width:calc(100% - 20px); } }
        .slider-nav { 
            position:absolute; 
            top:50%; 
            transform:translateY(-50%); 
            width:45px; 
            height:45px; 
            border-radius:50%; 
            background:rgba(197,160,89,0.2); 
            backdrop-filter:blur(8px); 
            border:1px solid rgba(197,160,89,0.3); 
            display:flex; 
            align-items:center; 
            justify-content:center; 
            cursor:pointer; 
            z-index:20; 
            color:white;
            transition:all 0.3s;
        }
        .slider-nav:hover { 
            background:#C5A059; 
            box-shadow:0 0 30px #C5A059;
            transform:translateY(-50%) scale(1.1);
        }
        .slider-dot { 
            width:12px; 
            height:12px; 
            border-radius:50%; 
            background:#444; 
            margin:0 5px; 
            cursor:pointer; 
            transition:0.3s;
        }
        .slider-dot:hover { 
            background:#C5A059; 
            transform:scale(1.3);
            box-shadow:0 0 15px #C5A059;
        }
        .slider-dot.active { 
            background:#C5A059; 
            transform:scale(1.6); 
            box-shadow:0 0 20px #C5A059;
        }

        /* hero section with parallax */
        .hero-section { 
            position:relative; 
            min-height:100vh; 
            display:flex; 
            align-items:center; 
            overflow:hidden; 
        }
        .hero-bg { 
            position:absolute; 
            inset:0; 
            background-size:cover; 
            background-position:center; 
            transition:opacity 1.5s;
            animation:slowZoom 20s infinite alternate;
        }
        @keyframes slowZoom {
            from{transform:scale(1);}
            to{transform:scale(1.1);}
        }
        .hero-overlay { 
            position:absolute; 
            inset:0; 
            background:radial-gradient(circle at 70% 30%,rgba(197,160,89,0.2),transparent 70%), 
                        linear-gradient(135deg,rgba(0,0,0,0.96) 0%,rgba(0,0,0,0.7) 50%,transparent 100%);
        }
        .floating-shape { 
            position:absolute; 
            border-radius:50%; 
            background:rgba(197,160,89,0.1); 
            filter:blur(70px); 
            z-index:0;
            animation:floatShape 8s infinite alternate;
        }
        @keyframes floatShape {
            0%{transform:translate(0,0) scale(1);}
            100%{transform:translate(50px,50px) scale(1.5);}
        }

        .section-title { 
            font-size:3rem; 
            font-weight:800; 
            line-height:1.2;
            letter-spacing:-1px;
        }
        @media (max-width:768px){ .section-title{font-size:2.2rem;} }

        /* academic cards */
        .academic-card { 
            background:linear-gradient(145deg,#1a1a1a,#0d0d0d); 
            border:1px solid #333; 
            border-radius:30px; 
            padding:40px 25px; 
            transition:0.5s; 
            text-align:center;
            position:relative;
            overflow:hidden;
        }
        .academic-card:hover { 
            border-color:#C5A059; 
            transform:translateY(-15px) scale(1.02); 
            box-shadow:0 30px 40px -15px rgba(197,160,89,0.5);
        }
        .academic-card::after {
            content:'';
            position:absolute;
            top:-50%;
            right:-50%;
            width:200%;
            height:200%;
            background:radial-gradient(circle, rgba(197,160,89,0.1) 0%, transparent 70%);
            opacity:0;
            transition:opacity 0.5s;
        }
        .academic-card:hover::after {
            opacity:1;
        }
        .academic-icon { 
            width:90px; 
            height:90px; 
            background:linear-gradient(135deg,#C5A059 0%,#E5C687 100%); 
            border-radius:50%; 
            display:flex; 
            align-items:center; 
            justify-content:center; 
            margin:0 auto 25px; 
            font-size:38px; 
            color:#000;
            transition:all 0.6s;
            position:relative;
            z-index:1;
        }
        .academic-card:hover .academic-icon { 
            transform:rotate(360deg) scale(1.1); 
            box-shadow:0 0 40px #C5A059;
        }

        /* form style with animations */
        .input-custom { 
            width:100%; 
            padding:14px; 
            background:#1f2937; 
            border:1px solid #374151; 
            border-radius:12px; 
            color:white; 
            outline:none;
            transition:all 0.3s;
            font-family:'Montserrat', sans-serif;
        }
        .input-custom:focus { 
            border-color:#C5A059; 
            box-shadow:0 0 20px rgba(197,160,89,0.3);
            transform:translateY(-2px);
        }
        .input-custom:hover { 
            border-color:#C5A059; 
        }
        
        .form-switch-btn { 
            width:50%; 
            padding:14px; 
            border-radius:12px; 
            font-weight:600; 
            transition:0.3s; 
            text-align:center; 
            cursor:pointer;
            letter-spacing:1px;
        }
        .btn-gold { 
            background:linear-gradient(135deg,#C9A227,#D4AF37); 
            color:black;
            transition:all 0.3s;
        }
        .btn-gold:hover { 
            transform:translateY(-3px) scale(1.02); 
            box-shadow:0 15px 30px -5px #D4AF37;
        }
        
        .btn-outline-gold { 
            border:1px solid #D4AF37; 
            color:white; 
            transition:all 0.3s;
        }
        .btn-outline-gold:hover { 
            background:#D4AF37; 
            color:black; 
            transform:translateY(-3px) scale(1.02);
            box-shadow:0 15px 30px -5px #D4AF37;
        }

        /* gallery hover effect */
        .gallery-item {
            position:relative;
            overflow:hidden;
            border-radius:20px;
            cursor:pointer;
        }
        .gallery-item img {
            transition:transform 0.6s;
        }
        .gallery-item:hover img {
            transform:scale(1.15) rotate(2deg);
        }
        .gallery-overlay {
            position:absolute;
            inset:0;
            background:linear-gradient(to top, rgba(197,160,89,0.4), transparent);
            opacity:0;
            transition:opacity 0.4s;
        }
        .gallery-item:hover .gallery-overlay {
            opacity:1;
        }
        .gallery-caption {
            position:absolute;
            bottom:-50px;
            left:0;
            right:0;
            text-align:center;
            color:white;
            font-weight:600;
            transition:bottom 0.4s;
            z-index:2;
        }
        .gallery-item:hover .gallery-caption {
            bottom:20px;
        }

        /* Loading animation */
        .loading-spinner {
            width:40px;
            height:40px;
            border:3px solid rgba(197,160,89,0.3);
            border-top-color:#C5A059;
            border-radius:50%;
            animation:spin 1s linear infinite;
        }
        @keyframes spin {
            to{transform:rotate(360deg);}
        }

        /* text gradient animation */
        .animate-text-gradient {
            background:linear-gradient(90deg, #C5A059, #E5C687, #C5A059);
            background-size:200% auto;
            -webkit-background-clip:text;
            -webkit-text-fill-color:transparent;
            animation:textShine 3s linear infinite;
        }
        @keyframes textShine {
            to{background-position:200% center;}
        }

        /* counter animation */
        .counter-number {
            display:inline-block;
            animation:countPop 0.3s ease-out;
        }
        @keyframes countPop {
            0%{transform:scale(1);}
            50%{transform:scale(1.2);}
            100%{transform:scale(1);}
        }
    </style>
</head>
<body>

    <!-- Navigation with enhanced hover -->
  <nav class="fixed w-full z-50 bg-black/25 backdrop-blur-md border-b border-gray-800">
        <div class="max-w-7xl mx-auto px-3 lg:px-4">
            <div class="flex justify-between items-center h-16">
                <!-- Logo with animation -->
                <div class="logo group cursor-pointer">
    <img src="{{ asset('images/a1-logo.png') }}" 
         alt="A1 Makeover Logo"
         class="h-14 w-auto transition-transform duration-300 group-hover:scale-110">
</div>
                
                <!-- Desktop Menu with Icons -->
                <div class="hidden md:flex items-center space-x-8">
                    <a href="#home" class="nav-link flex items-center gap-2 text-sm font-medium">
                        <i class="fas fa-home text-gold"></i>
                        <span>Home</span>
                    </a>
                    <a href="#services" class="nav-link flex items-center gap-2 text-sm font-medium">
                        <i class="fas fa-cut text-gold"></i>
                        <span>Services</span>
                    </a>
                    <a href="#academic" class="nav-link flex items-center gap-2 text-sm font-medium">
                        <i class="fas fa-graduation-cap text-gold"></i>
                        <span>Academic</span>
                    </a>
                    <a href="#gallery" class="nav-link flex items-center gap-2 text-sm font-medium">
                        <i class="fas fa-images text-gold"></i>
                        <span>Gallery</span>
                    </a>
                    <a href="#contact" class="nav-link flex items-center gap-2 text-sm font-medium">
                        <i class="fas fa-phone-alt text-gold"></i>
                        <span>Contact</span>
                    </a>
                </div>
                
                <!-- Enquiry Button -->
                <div class="hidden md:flex gap-4">

    <!-- Enquiry Button -->
    <a href="#contact"
       class="gold-bg text-black px-6 py-1 rounded-full text-sm font-semibold uppercase hover:shadow-xl transition-all hover:scale-110 flex items-center gap-2 group">
        <i class="fas fa-calendar-check group-hover:rotate-12 transition-transform"></i>
        Enquiry Now
    </a>

    <!-- Login Button -->
    <a href="{{ route('login') }}"
       class="border-2 border-[#B68F5C] text-dark px-7 py-1 rounded-full text-base font-semibold hover:bg-[:#A07D4A] hover:text-black transition-all hover:scale-105 flex items-center gap-2">
        <i class="fas fa-user"></i>
        Login
    </a>

</div>
                
                <!-- Mobile Menu Button -->
                <div class="md:hidden">
                    <button id="menu-btn" class="text-white text-2xl p-2 hover:bg-gray-800 rounded-lg transition">
                        <i class="fas fa-bars"></i>
                    </button>
                </div>
            </div>
        </div>
        
        <!-- Mobile Menu -->
        <div id="mobile-menu" class="hidden md:hidden bg-black/95 px-4 py-4 border-t border-gray-800">
            <a href="#home" class="flex items-center gap-3 py-3 hover:bg-gray-800 px-3 rounded-lg transition">
                <i class="fas fa-home text-gold w-5"></i> Home
            </a>
            <a href="#services" class="flex items-center gap-3 py-3 hover:bg-gray-800 px-3 rounded-lg transition">
                <i class="fas fa-cut text-gold w-5"></i> Services
            </a>
            <a href="#academic" class="flex items-center gap-3 py-3 hover:bg-gray-800 px-3 rounded-lg transition">
                <i class="fas fa-graduation-cap text-gold w-5"></i> Academic
            </a>
            <a href="#gallery" class="flex items-center gap-3 py-3 hover:bg-gray-800 px-3 rounded-lg transition">
                <i class="fas fa-images text-gold w-5"></i> Gallery
            </a>
            <a href="#contact" class="flex items-center gap-3 py-3 hover:bg-gray-800 px-3 rounded-lg transition">
                <i class="fas fa-phone-alt text-gold w-5"></i> Contact
            </a>
            <a href="#contact" class="gold-bg text-black px-5 py-3 rounded-full text-center block mt-4 font-semibold">
                <i class="fas fa-calendar-check mr-2"></i> Enquiry Now
            </a>
             <a href="{{ route('login') }}"
       class="border-2 border-[#B68F5C] text-dark gap-3 px-5 py-1 rounded-full mt-4 text-base font-semibold hover:bg-[:#A07D4A] hover:text-light transition-all hover:scale-105 flex items-center gap-2">
        <i class="fas fa-user"></i>
        Login
    </a>
        </div>
    </nav>

    <!-- Hero with parallax and animations -->
    <section id="home" class="hero-section ">
        <div class="floating-shape animate-float" style="width:300px;height:300px;top:5%;left:2%;"></div>
        <div class="floating-shape animate-float" style="width:400px;height:400px;bottom:5%;right:2%; animation-delay:1s;"></div>
        <div id="hero-bg" class="hero-bg"></div>
        <div class="hero-overlay"></div>
        <div class="relative max-w-6xl mx-auto px-4 lg:px-6 py-24 w-full z-10">
            <div class="grid md:grid-cols-2 gap-8 items-center">
                <div data-aos="fade-right" data-aos-duration="1200">
                    <h1 class="text-5xl md:text-6xl font-bold leading-tight mb-2 animate__animated animate__fadeInUp">
                        Welcome to <br>
                        <span class="gold-gradient text-6xl md:text-7xl animate-text-gradient">A1 MAKEOVER</span>
                    </h1>
                    <h2 class="text-4xl md:text-5xl font-bold mb-4 animate__animated animate__fadeInUp animate__delay-1s">
                        Where <span class="gold-gradient hover-scale inline-block">Luxury</span><br>
                        Meets <span class="gold-gradient hover-scale inline-block">Perfection</span>
                    </h2>
                    <p class="text-lg text-gray-300 mb-6 animate__animated animate__fadeInUp animate__delay-2s">
                        <i class="fas fa-venus-mars gold-text animate-pulse"></i> Premium Unisex Salon | 100% Hygiene
                    </p>
                    <div class="grid grid-cols-3 gap-3 mb-6 animate__animated animate__fadeInUp animate__delay-3s">
                        <div class="hover-scale cursor-pointer">
                            <div class="text-2xl font-bold gold-gradient counter" data-target="50">50+</div>
                            <div class="text-gray-400 text-xs">Expert Stylists</div>
                        </div>
                        <div class="hover-scale cursor-pointer">
                            <div class="text-2xl font-bold gold-gradient counter" data-target="15000">15k+</div>
                            <div class="text-gray-400 text-xs">Happy Clients</div>
                        </div>
                        <div class="hover-scale cursor-pointer">
                            <div class="text-2xl font-bold gold-gradient counter" data-target="14">14</div>
                            <div class="text-gray-400 text-xs">Years Legacy</div>
                        </div>
                    </div>
                    <div class="flex flex-wrap gap-4 animate__animated animate__fadeInUp animate__delay-4s">
                        <a href="#contact" class="gold-bg text-black px-8 py-3 rounded-full text-base font-semibold hover:scale-105 hover:shadow-xl transition-all inline-flex items-center group">
                            <i class="fas fa-calendar-check mr-2 group-hover:rotate-12 transition"></i>Enquiry Now
                        </a>
                        <a href="#services" class="border-2 border-yellow-600 text-white px-8 py-3 rounded-full text-base font-semibold hover:gold-bg hover:text-black transition-all hover:scale-105">
                            Explore
                        </a>
                    </div>
                </div>
                <div class="hidden md:block animate__animated animate__fadeInRight animate__delay-1s">
                    <!-- Decorative element -->
                </div>
            </div>
        </div>
    </section>

    <!-- SERVICES SECTION with animations -->
    <section id="services" class="py-20 bg-gradient-to-b from-black to-gray-900">
        <div class="max-w-6xl mx-auto px-4 lg:px-6">
            <div class="text-center mb-12" data-aos="fade-up" data-aos-duration="1000">
                <span class="gold-text uppercase tracking-wider text-xs animate-pulse">Premium Services</span>
                <h2 class="section-title">Our <span class="gold-gradient">Signature</span> Services</h2>
                <p class="text-gray-400 max-w-xl mx-auto">Luxury beauty for everyone — now with more men's treatments</p>
            </div>
            
            <!-- Unisex -->
            <div class="mb-16" data-aos="fade-up" data-aos-duration="1200">
                <h3 class="text-2xl font-bold mb-5 flex items-center gap-2 hover-scale">
                    <i class="fas fa-venus-mars gold-text text-3xl animate-rotate"></i>
                    Premium Unisex Services
                </h3>
                <div class="slider-container" id="unisex-slider">
                    <div class="slider-track" id="unisex-track"></div>
                    <div class="slider-nav left" onclick="slideUnisex('left')" style="left:5px;"><i class="fas fa-chevron-left"></i></div>
                    <div class="slider-nav right" onclick="slideUnisex('right')" style="right:5px;"><i class="fas fa-chevron-right"></i></div>
                    <div class="absolute bottom-0 left-1/2 flex gap-2 z-30" id="unisex-dots"></div>
                </div>
            </div>
            
            <!-- Women -->
            <div class="mb-16" data-aos="fade-up" data-aos-duration="1400">
                <h3 class="text-2xl font-bold mb-5 flex items-center gap-2 hover-scale">
                    <i class="fas fa-female gold-text text-3xl animate-rotate"></i>
                    For Women
                </h3>
                <div class="slider-container" id="women-slider">
                    <div class="slider-track" id="women-track"></div>
                    <div class="slider-nav left" onclick="slideWomen('left')" style="left:5px;"><i class="fas fa-chevron-left"></i></div>
                    <div class="slider-nav right" onclick="slideWomen('right')" style="right:5px;"><i class="fas fa-chevron-right"></i></div>
                    <div id="women-dots" class="absolute bottom-0 left-1/2 flex gap-2"></div>
                </div>
            </div>
            
            <!-- MEN -->
            <div class="mb-12" data-aos="fade-up" data-aos-duration="1600">
                <h3 class="text-2xl font-bold mb-5 flex items-center gap-2 hover-scale">
                    <i class="fas fa-male gold-text text-3xl animate-rotate"></i>
                    For Men – complete grooming
                </h3>
                <div class="slider-container" id="men-slider">
                    <div class="slider-track" id="men-track"></div>
                    <div class="slider-nav left" onclick="slideMen('left')" style="left:5px;"><i class="fas fa-chevron-left"></i></div>
                    <div class="slider-nav right" onclick="slideMen('right')" style="right:5px;"><i class="fas fa-chevron-right"></i></div>
                    <div id="men-dots" class="absolute bottom-0 left-1/2 flex gap-2"></div>
                </div>
            </div>
        </div>
    </section>

    <!-- Academic Training with hover animations -->
    <section id="academic" class="py-20 bg-gradient-to-b from-gray-900 to-black">
        <div class="max-w-7xl mx-auto px-4 lg:px-6">
            <div class="text-center mb-12" data-aos="fade-up">
                <span class="gold-text uppercase text-xs animate-pulse">Learn With Us</span>
                <h2 class="section-title"><span class="gold-gradient">Academic</span> Training</h2>
            </div>
            <div class="grid md:grid-cols-3 gap-6">
                <div class="academic-card" data-aos="flip-left" data-aos-duration="1000">
                    <div class="academic-icon"><i class="fas fa-cut"></i></div>
                    <h3 class="text-xl font-bold mb-2">Professional Hair Styling</h3>
                    <p class="text-gray-400 mb-3 text-sm">6 Months Diploma</p>
                    <ul class="text-gray-500 text-xs space-y-1 mb-4">
                        <li class="hover:text-gold transition">✓ Advanced Cutting</li>
                        <li class="hover:text-gold transition">✓ Color Theory</li>
                        <li class="hover:text-gold transition">✓ Salon Management</li>
                    </ul>
                    <a href="#contact" class="gold-text hover:text-white text-sm transition relative group">
                        Enquire → 
                        <span class="absolute -bottom-1 left-0 w-0 h-0.5 gold-bg transition-all group-hover:w-full"></span>
                    </a>
                </div>
                <div class="academic-card" data-aos="flip-left" data-aos-duration="1200">
                    <div class="academic-icon"><i class="fas fa-spa"></i></div>
                    <h3 class="text-xl font-bold mb-2">Advanced Makeup Artistry</h3>
                    <p class="text-gray-400 mb-3 text-sm">3 Months Certificate</p>
                    <ul class="text-gray-500 text-xs space-y-1 mb-4">
                        <li class="hover:text-gold transition">✓ Bridal & Fashion</li>
                        <li class="hover:text-gold transition">✓ Airbrush</li>
                        <li class="hover:text-gold transition">✓ Portfolio</li>
                    </ul>
                    <a href="#contact" class="gold-text hover:text-white text-sm transition relative group">
                        Enquire → 
                        <span class="absolute -bottom-1 left-0 w-0 h-0.5 gold-bg transition-all group-hover:w-full"></span>
                    </a>
                </div>
                <div class="academic-card" data-aos="flip-left" data-aos-duration="1400">
                    <div class="academic-icon"><i class="fas fa-hand-sparkles"></i></div>
                    <h3 class="text-xl font-bold mb-2">Skin & Spa Therapy</h3>
                    <p class="text-gray-400 mb-3 text-sm">4 Months Diploma</p>
                    <ul class="text-gray-500 text-xs space-y-1 mb-4">
                        <li class="hover:text-gold transition">✓ Advanced Facials</li>
                        <li class="hover:text-gold transition">✓ Body Massage</li>
                        <li class="hover:text-gold transition">✓ Consultation</li>
                    </ul>
                    <a href="#contact" class="gold-text hover:text-white text-sm transition relative group">
                        Enquire → 
                        <span class="absolute -bottom-1 left-0 w-0 h-0.5 gold-bg transition-all group-hover:w-full"></span>
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- Gallery with animations -->
    <section id="gallery" class="py-20 bg-gradient-to-b from-black to-gray-900">
        <div class="max-w-7xl mx-auto px-4 lg:px-6">
            <div class="text-center mb-12" data-aos="fade-up">
                <span class="gold-text uppercase text-xs animate-pulse">Our Work</span>
                <h2 class="section-title"><span class="gold-gradient">Premium</span> Gallery</h2>
            </div>
            <div class="grid grid-cols-2 md:grid-cols-4 gap-3" id="gallery-images"></div>
        </div>
    </section>

    <!-- CONTACT SECTION with enhanced form animations -->
    <section id="contact" class="py-20 bg-gradient-to-b from-gray-900 to-black">
        <div class="max-w-6xl mx-auto px-4 lg:px-6">
            <!-- heading -->
            <div class="text-center mb-12" data-aos="fade-up">
                <span class="gold-text uppercase text-xs animate-pulse">Get in Touch</span>
                <h2 class="section-title"><span class="gold-gradient">Book</span> Your Session or Join Academy</h2>
            </div>

            <!-- main form card -->
            <div class="bg-gray-900 rounded-3xl shadow-2xl grid md:grid-cols-2 overflow-hidden border border-gray-800 hover:border-gold transition-all" data-aos="zoom-in" data-aos-duration="1000">
                <!-- LEFT IMAGE -->
                <div class="relative hidden md:block h-full min-h-[500px] overflow-hidden group">
                    <img src="https://images.unsplash.com/photo-1560066984-138dadb4c035?auto=format&fit=crop&w=800&q=80" 
                         class="h-full w-full object-cover transition-transform duration-700 group-hover:scale-110">
                    <div class="absolute inset-0 bg-black/60 flex items-center justify-center transition-all group-hover:bg-black/40">
                        <h2 class="text-3xl font-bold gold-text text-center px-4 transform transition-all group-hover:scale-110 group-hover:rotate-2">
                            Luxury Salon & Academy
                        </h2>
                    </div>
                </div>

                <!-- RIGHT SIDE: form area -->
                <div class="p-8 text-white">
                    <!-- toggle buttons -->
                    <div class="flex gap-4 mb-8">
                        <button onclick="showForm('appointment')" class="w-1/2 btn-gold py-3 rounded-lg font-semibold" id="btnAppoint">
                            Book Appointment 
                        </button>
                        <button onclick="showForm('academy')" class="w-1/2 btn-outline-gold py-3 rounded-lg font-semibold" id="btnAcademy">
                            Join Academy
                        </button>
                    </div>

                    <!-- APPOINTMENT FORM -->
                    <form id="appointmentForm" method="POST" action="{{ route('salon.enquiry.store') }}" class="space-y-4 animate__animated animate__fadeIn">
                        @csrf
                        <h3 class="gold-text text-xl font-bold">Salon Appointment</h3>
                        <input type="text" name="name" placeholder="Your Name" required class="input-custom">
                        <input type="text" name="contact" placeholder="Phone" required class="input-custom">
                        
                        <select name="gender" id="gender" class="input-custom" required>
                            <option value="">Select Gender</option>
                            <option value="male">Male</option>
                            <option value="female">Female</option>
                            <option value="unisex">Unisex</option>
                        </select>

                        <select name="service" id="service" class="input-custom" required>
                            <option value="">First select gender</option>
                        </select>

                        <div id="priceShow" class="gold-text font-medium animate-pulse"></div>

                        <textarea name="message" placeholder="Message (optional)" class="input-custom" rows="2"></textarea>

                        <button type="submit" class="gold-bg w-full py-3 rounded-lg font-semibold text-black hover:scale-105 transition-all hover:shadow-xl">
                            Submit Appointment
                        </button>
                    </form>

                    <!-- ACADEMY FORM -->
                    <form id="academyForm" method="POST" action="{{ route('academy.enquiry.store') }}" class="space-y-4 hidden animate__animated animate__fadeIn">
                        @csrf
                        <h3 class="gold-text text-xl font-bold">Join Academy</h3>
                        <input type="text" name="name" placeholder="Your Name" required class="input-custom">
                        <input type="text" name="phone" placeholder="Phone" required class="input-custom">
                        <input type="email" name="email" placeholder="Email" class="input-custom">
                        
                        <select name="course_id" class="input-custom" required>
                            <option value="">Select Course</option>
                            @foreach($courses as $course)
                            <option value="{{ $course->id }}" 
                                    data-fees="{{ $course->fees }}" 
                                    data-duration="{{ $course->duration }}">
                                {{ $course->title }} (₹{{ $course->fees }} / {{ $course->duration }})
                            </option>
                            @endforeach
                        </select>

                        <textarea name="message" placeholder="Why you want to join?" class="input-custom" rows="2"></textarea>

                        <button type="submit" class="gold-bg w-full py-3 rounded-lg font-semibold text-black hover:scale-105 transition-all hover:shadow-xl">
                            Submit Academy Enquiry
                        </button>
                    </form>

                    <!-- success message -->
                    @if(session('success'))
                    <div class="mt-4 p-3 bg-green-600 text-white rounded-lg text-center animate__animated animate__bounceIn">
                        {{ session('success') }}
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </section>

    <!-- Footer with animations -->
    <footer class="bg-black border-t border-gray-800 py-12">
        <div class="max-w-7xl mx-auto px-4 lg:px-6">
            <div class="grid md:grid-cols-4 gap-8">
                <div data-aos="fade-right">
                    <h3 class="logo text-2xl font-bold mb-3 hover-scale inline-block">
                        <span class="gold-gradient">A1</span> <span class="text-white">MAKEOVER</span>
                    </h3>
                    <p class="text-gray-400 text-sm mb-3">India's most trusted premium unisex salon.</p>
                    <div class="flex gap-3">
                        <a href="#" class="w-9 h-9 rounded-full border border-gray-700 flex items-center justify-center hover:gold-bg transition-all hover:scale-110 hover:rotate-12">
                            <i class="fab fa-instagram"></i>
                        </a>
                        <a href="#" class="w-9 h-9 rounded-full border border-gray-700 flex items-center justify-center hover:gold-bg transition-all hover:scale-110 hover:rotate-12">
                            <i class="fab fa-facebook-f"></i>
                        </a>
                        <a href="#" class="w-9 h-9 rounded-full border border-gray-700 flex items-center justify-center hover:gold-bg transition-all hover:scale-110 hover:rotate-12">
                            <i class="fab fa-youtube"></i>
                        </a>
                    </div>
                </div>
                <div data-aos="fade-up">
                    <h4 class="text-base font-semibold mb-3">Quick Links</h4>
                    <ul class="space-y-1 text-gray-400 text-sm">
                        <li><a href="#home" class="hover-gold transition block hover:pl-2">Home</a></li>
                        <li><a href="#services" class="hover-gold transition block hover:pl-2">Services</a></li>
                        <li><a href="#academic" class="hover-gold transition block hover:pl-2">Academic</a></li>
                        <li><a href="#gallery" class="hover-gold transition block hover:pl-2">Gallery</a></li>
                    </ul>
                </div>
                <div data-aos="fade-up" data-aos-delay="200">
                    <h4 class="text-base font-semibold mb-3">Popular</h4>
                    <ul class="space-y-1 text-gray-400 text-sm">
                        <li><a href="#" class="hover-gold transition block hover:pl-2">Hair Styling</a></li>
                        <li><a href="#" class="hover-gold transition block hover:pl-2">Bridal Makeup</a></li>
                        <li><a href="#" class="hover-gold transition block hover:pl-2">Facial & Spa</a></li>
                        <li><a href="#" class="hover-gold transition block hover:pl-2">Manicure</a></li>
                    </ul>
                </div>
                <div data-aos="fade-left">
                    <h4 class="text-base font-semibold mb-3">Newsletter</h4>
                    <p class="text-gray-400 text-sm mb-2">Subscribe for offers</p>
                    <div class="flex group">
                        <input type="email" placeholder="Email" class="bg-gray-800 border border-gray-700 rounded-l-lg px-3 py-2 text-sm w-full focus:border-gold focus:outline-none transition-all">
                        <button class="gold-bg text-black px-3 rounded-r-lg transition-all hover:scale-105 hover:shadow-lg">
                            <i class="fas fa-paper-plane"></i>
                        </button>
                    </div>
                </div>
            </div>
            <div class="border-t border-gray-800 mt-8 pt-5 text-center text-gray-500 text-xs animate-pulse">
                &copy; 2024 A1 Makeover. Premium Unisex Salon Chain.
            </div>
        </div>
    </footer>
<a href="https://wa.me/918949878232?text=Hello%20I%20want%20to%20book%20an%20appointment"
   target="_blank"
   class="fixed bottom-6 right-6 bg-green-500 text-white w-14 h-14 flex items-center justify-center rounded-full shadow-lg hover:scale-110 transition z-50">
   <i class="fab fa-whatsapp text-2xl"></i>
</a>
    <!-- scripts -->
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        AOS.init({
            duration: 1000,
            once: true,
            offset: 100,
            easing: 'ease-in-out'
        });

        // mobile menu
        const menuBtn = document.getElementById('menu-btn');
        const mobileMenu = document.getElementById('mobile-menu');
        menuBtn.addEventListener('click', () => {
            mobileMenu.classList.toggle('hidden');
            menuBtn.querySelector('i').classList.toggle('fa-bars');
            menuBtn.querySelector('i').classList.toggle('fa-times');
        });

        // hero bg
        const heroImages = [
             "{{ asset('images/2.png') }}",  
            'https://previews.123rf.com/images/wavebreakmediamicro/wavebreakmediamicro1409/wavebreakmediamicro140923030/31895092-hairdressers-washing-their-clients-hair-at-the-hair-salon.jpg',
            'https://images.unsplash.com/photo-1562322140-8baeececf3df?auto=format&fit=crop&w=2000&q=80',
            'https://images.unsplash.com/photo-1633681926022-84c23e8cb2d6?auto=format&fit=crop&w=2000&q=80',
            'https://images.unsplash.com/photo-1570172619644-dfd03ed5d881?auto=format&fit=crop&w=2000&q=80'
        ];
        let currentImage = 0;
        const heroBg = document.getElementById('hero-bg');
        
        function changeHeroBg() {
            heroBg.style.backgroundImage = `url('${heroImages[currentImage]}')`;
            heroBg.classList.add('animate__animated', 'animate__fadeIn');
            setTimeout(() => heroBg.classList.remove('animate__animated', 'animate__fadeIn'), 1000);
            currentImage = (currentImage + 1) % heroImages.length;
        }
        changeHeroBg();
        setInterval(changeHeroBg, 5000);

        // service data
        const unisexServices = [
            { name: 'Premium Haircut & Styling', icon: 'fa-cut', image: 'https://thumbs.dreamstime.com/b/young-long-haired-female-barber-gently-makes-undercut-hairstyle-using-scissors-comb-bearded-happy-man-salon-chair-modern-401644062.jpg' },
            { name: 'Luxury Spa & Massage', icon: 'fa-spa', image: 'https://c8.alamy.com/comp/2M8T6WP/male-manicure-female-nail-service-master-doing-manicure-for-man-happy-man-enjoying-result-at-beauty-salon-2M8T6WP.jpg' },
          { 
    name: 'Professional Makeup', 
    icon: 'fa-brush', 
    image: "{{ asset('images/2.png') }}" 
},

{ 
    name: 'Skin Care & Facial', 
    icon: 'fa-face-smile', 
    image: "{{ asset('images/3.png') }}" 
}, { name: 'Manicure & Pedicure', icon: 'fa-hand', image: 'https://images.unsplash.com/photo-1604654894610-df63bc536371?auto=format&fit=crop&w=600&q=80' },
            { name: 'Hair Color & Treatment', icon: 'fa-droplet', image: 'https://images.unsplash.com/photo-1562322140-8baeececf3df?auto=format&fit=crop&w=600&q=80' }
        ];
        
        const womenServices = [
            { name: 'Bridal Makeup', icon: 'fa-crown', image: 'https://images.unsplash.com/photo-1520854221256-17451cc331bf?auto=format&fit=crop&w=600&q=80' },
            { name: 'Women Hair', icon: 'fa-scissors', image: 'https://images.unsplash.com/photo-1562322140-8baeececf3df?auto=format&fit=crop&w=600&q=80' },
            { name: 'Facial', icon: 'fa-spa', image: 'https://images.unsplash.com/photo-1570172619644-dfd03ed5d881?auto=format&fit=crop&w=600&q=80' },
            { name: 'Waxing', icon: 'fa-eye', image: 'https://images.unsplash.com/photo-1516975080664-ed2fc6a32937?auto=format&fit=crop&w=600&q=80' },
            { name: 'Nail Art', icon: 'fa-hand', image: 'https://images.unsplash.com/photo-1604654894610-df63bc536371?auto=format&fit=crop&w=600&q=80' }
        ];
        
        const menServices = [
            { name: 'Signature Beard Sculpt', icon: 'fa-scissors', image: 'https://media.istockphoto.com/id/623477902/photo/man-gets-a-haircut-at-his-barber.jpg?s=612x612&w=0&k=20&c=Gxrsli5A3O5g2ptwsWwca3I39UP-KtexqoGXGYsgyhY=' },
            { name: 'Luxury Hair Wash & Cut', icon: 'fa-cut', image: 'https://img.freepik.com/free-photo/close-up-image-female-hairdresser-washing-bearded-men-s-hair-before-haircut-saloon_613910-5463.jpg?semt=ais_hybrid&w=740&q=80' },
            { name: 'Professional Hair Styling', icon: 'fa-paint-roller', image: 'https://media.istockphoto.com/id/1773270658/photo/professional-hairdresser-working-with-bearded-client-in-barbershop-closeup-black-and-white.jpg?s=612x612&w=0&k=20&c=VmQ_uvNngyD9nMayihYVZARK9FAmUQiMI6rqiT9ZwOM=' },
            { name: 'Relaxing Head Massage', icon: 'fa-hand-sparkles', image: 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRxZZ6M28DR0lmq2stMYyRLlfoHkLCwtEZhmw&s' },
            { name: 'Men’s Facial & Detan', icon: 'fa-star', image: 'https://images.unsplash.com/photo-1570172619644-dfd03ed5d881?auto=format&fit=crop&w=600&q=80' },
            { name: 'Men’s Manicure & Grooming', icon: 'fa-hand', image: 'https://images.unsplash.com/photo-1616394584738-fc6e612e71b9?auto=format&fit=crop&w=600&q=80' },
            { name: 'Hot Towel Shave', icon: 'fa-face-smile', image: 'https://images.unsplash.com/photo-1501196354995-cbb51c65aaea?auto=format&fit=crop&w=600&q=80' }
        ];

        const galleryImages = [
            'https://images.unsplash.com/photo-1562322140-8baeececf3df?auto=format&fit=crop&w=600&q=80',
            'https://images.unsplash.com/photo-1570172619644-dfd03ed5d881?auto=format&fit=crop&w=600&q=80',
            'https://images.unsplash.com/photo-1487412947147-5cebf100ffc2?auto=format&fit=crop&w=600&q=80',
            
    "{{ asset('images/2.png') }}",
    "{{ asset('images/a1.png') }}",
    'https://images.unsplash.com/photo-1622286342621-4bd786c2447c?auto=format&fit=crop&w=600&q=80'
  ,
    "{{ asset('images/3.png') }}", 'https://images.unsplash.com/photo-1585747860715-2ba37e788b70?auto=format&fit=crop&w=600&q=80'
                  ];

        // Gallery rendering with animations
        document.getElementById('gallery-images').innerHTML = galleryImages.map((img, i) => `
            <div class="gallery-item" data-aos="zoom-in" data-aos-delay="${i * 100}">
                <img src="${img}" alt="Gallery" class="w-full h-56 object-cover">
                <div class="gallery-overlay"></div>
                <div class="gallery-caption">View Gallery</div>
            </div>
        `).join('');

        // Service cards creation
        function createServiceCards(services) {
            return services.map(s => `
                <div class="slider-item">
                    <div class="premium-card">
                        <img src="${s.image}" alt="${s.name}" loading="lazy">
                        <div class="p-4">
                            <h4 class="text-lg font-semibold mb-1 flex items-center gap-2">
                                <i class="fas ${s.icon} gold-text"></i>${s.name}
                            </h4>
                            <p class="text-gray-400 text-xs">Premium service</p>
                        </div>
                        <div class="absolute bottom-[-100%] left-0 right-0 bg-gradient-to-t from-black/95 p-4 transition-all duration-500 hover:bottom-0">
                            <a href="#contact" class="gold-bg text-black px-3 py-1 rounded-full text-xs hover:scale-105 transition inline-block">
                                Book Now
                            </a>
                        </div>
                    </div>
                </div>
            `).join('');
        }

        document.getElementById('unisex-track').innerHTML = createServiceCards(unisexServices);
        document.getElementById('women-track').innerHTML = createServiceCards(womenServices);
        document.getElementById('men-track').innerHTML = createServiceCards(menServices);

        // Slider functionality
        let unisexIndex = 0, womenIndex = 0, menIndex = 0;
        const itemsPerView = window.innerWidth < 768 ? 1 : 3;

        function createDots(containerId, count, curr) {
            const c = document.getElementById(containerId);
            if (!c) return;
            c.innerHTML = '';
            for (let i = 0; i < count; i++) {
                let d = document.createElement('div');
                d.className = `slider-dot ${i === curr ? 'active' : ''}`;
                d.onclick = () => slideTo(containerId.replace('-dots', ''), i);
                c.appendChild(d);
            }
        }

        createDots('unisex-dots', unisexServices.length, 0);
        createDots('women-dots', womenServices.length, 0);
        createDots('men-dots', menServices.length, 0);

        function slideUnisex(d) {
            const track = document.getElementById('unisex-track');
            const max = unisexServices.length - itemsPerView;
            d === 'left' ? unisexIndex = Math.max(0, unisexIndex - 1) : unisexIndex = Math.min(max, unisexIndex + 1);
            track.style.transform = `translateX(-${unisexIndex * (100 / itemsPerView)}%)`;
            createDots('unisex-dots', unisexServices.length, unisexIndex);
        }

        function slideWomen(d) {
            const track = document.getElementById('women-track');
            const max = womenServices.length - itemsPerView;
            d === 'left' ? womenIndex = Math.max(0, womenIndex - 1) : womenIndex = Math.min(max, womenIndex + 1);
            track.style.transform = `translateX(-${womenIndex * (100 / itemsPerView)}%)`;
            createDots('women-dots', womenServices.length, womenIndex);
        }

        function slideMen(d) {
            const track = document.getElementById('men-track');
            const max = menServices.length - itemsPerView;
            d === 'left' ? menIndex = Math.max(0, menIndex - 1) : menIndex = Math.min(max, menIndex + 1);
            track.style.transform = `translateX(-${menIndex * (100 / itemsPerView)}%)`;
            createDots('men-dots', menServices.length, menIndex);
        }

        function slideTo(sliderId, idx) {
            let maxIdx = (sliderId === 'unisex' ? unisexServices.length : sliderId === 'women' ? womenServices.length : menServices.length) - itemsPerView;
            let newIndex = Math.min(idx, maxIdx);
            if (sliderId === 'unisex') {
                unisexIndex = newIndex;
                document.getElementById('unisex-track').style.transform = `translateX(-${unisexIndex * (100 / itemsPerView)}%)`;
                createDots('unisex-dots', unisexServices.length, unisexIndex);
            } else if (sliderId === 'women') {
                womenIndex = newIndex;
                document.getElementById('women-track').style.transform = `translateX(-${womenIndex * (100 / itemsPerView)}%)`;
                createDots('women-dots', womenServices.length, womenIndex);
            } else if (sliderId === 'men') {
                menIndex = newIndex;
                document.getElementById('men-track').style.transform = `translateX(-${menIndex * (100 / itemsPerView)}%)`;
                createDots('men-dots', menServices.length, menIndex);
            }
        }

        // Auto slide
        setInterval(() => {
            slideUnisex('right');
            slideWomen('right');
            slideMen('right');
        }, 5000);

        // FORM TOGGLE with animations
        function showForm(type){
            const appForm=document.getElementById('appointmentForm');
            const acaForm=document.getElementById('academyForm');
            const btnApp=document.getElementById('btnAppoint');
            const btnAca=document.getElementById('btnAcademy');
            if(type==='appointment'){
                appForm.classList.remove('hidden');
                acaForm.classList.add('hidden');
                btnApp.classList.add('btn-gold'); btnApp.classList.remove('btn-outline-gold');
                btnAca.classList.add('btn-outline-gold'); btnAca.classList.remove('btn-gold');
            } else {
                appForm.classList.add('hidden');
                acaForm.classList.remove('hidden');
                btnAca.classList.add('btn-gold'); btnAca.classList.remove('btn-outline-gold');
                btnApp.classList.add('btn-outline-gold'); btnApp.classList.remove('btn-gold');
            }
        }

        // dummy service ajax (demo)
       document.getElementById('gender')?.addEventListener('change', function() {
    let gender = this.value;
    let serviceSelect = document.getElementById('service');
    
    if(!gender) {
        serviceSelect.innerHTML = '<option value="">Select Gender first</option>';
        return;
    }
    
    // Show loading
    serviceSelect.innerHTML = '<option value="">Loading services...</option>';
    
    // FETCH FROM DATABASE
    fetch('/get-services/' + gender)
        .then(res => {
            if(!res.ok) throw new Error('Network error');
            return res.json();
        })
        .then(data => {
            serviceSelect.innerHTML = '<option value="">Select Service</option>';
            
            if(data.length === 0) {
                serviceSelect.innerHTML += '<option value="" disabled>No services available</option>';
            } else {
                data.forEach(item => {
                    serviceSelect.innerHTML += `
                        <option value="${item.name}" data-price="${item.price}">
                            ${item.name} - ₹${item.price}
                        </option>
                    `;
                });
            }
        })
        .catch(error => {
            console.error('Error:', error);
            serviceSelect.innerHTML = '<option value="">Error loading services</option>';
        });
});

// Show price when service selected
document.getElementById('service')?.addEventListener('change', function() {
    let price = this.options[this.selectedIndex]?.dataset.price;
    document.getElementById('priceShow').innerHTML = price ? "💰 Price: ₹" + price : "";
});

// ========== ACADEMY FORM - COURSE DETAILS ==========
document.querySelector('select[name="course_id"]')?.addEventListener('change', function() {
    let option = this.options[this.selectedIndex];
    let fees = option.dataset.fees;
    let duration = option.dataset.duration;
    
    if(fees) {
        // Optional: show course details
        console.log(`Course: ${option.text}, Fees: ₹${fees}, Duration: ${duration}`);
    }
});

// ========== FORM TOGGLE BUTTONS ==========
function showForm(type) {
    const appForm = document.getElementById('appointmentForm');
    const acaForm = document.getElementById('academyForm');
    const btnApp = document.querySelector('button[onclick="showForm(\'appointment\')"]');
    const btnAca = document.querySelector('button[onclick="showForm(\'academy\')"]');
    
    if(type === 'appointment') {
        appForm.classList.remove('hidden');
        acaForm.classList.add('hidden');
        btnApp.classList.add('gold-bg');
        btnApp.classList.remove('border', 'border-yellow-500');
        btnAca.classList.add('border', 'border-yellow-500');
        btnAca.classList.remove('gold-bg');
    } else {
        appForm.classList.add('hidden');
        acaForm.classList.remove('hidden');
        btnAca.classList.add('gold-bg');
        btnAca.classList.remove('border', 'border-yellow-500');
        btnApp.classList.add('border', 'border-yellow-500');
        btnApp.classList.remove('gold-bg');
    }
}

        // Start counters when they come into view
        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    const counter = entry.target;
                    const target = parseInt(counter.getAttribute('data-target'));
                    animateCounter(counter, target);
                }
            });
        });

        document.querySelectorAll('.counter').forEach(counter => observer.observe(counter));

        // Smooth scroll for anchor links
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function(e) {
                e.preventDefault();
                const target = document.querySelector(this.getAttribute('href'));
                if (target) {
                    target.scrollIntoView({
                        behavior: 'smooth',
                        block: 'start'
                    });
                }
            });
        });

        // Parallax effect on scroll
        window.addEventListener('scroll', () => {
            const scrolled = window.pageYOffset;
            const hero = document.querySelector('.hero-section');
            if (hero) {
                hero.style.backgroundPositionY = scrolled * 0.5 + 'px';
            }
        });
    </script>
</body>
</html>