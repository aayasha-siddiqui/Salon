<!DOCTYPE html>
<html>
<head>
<title>A1 Makeover - Luxury Studio</title>

<meta name="viewport" content="width=device-width, initial-scale=1">

<!-- Bootstrap -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

<!-- Fonts -->
<link href="https://fonts.googleapis.com/css2?family=Cinzel:wght@500;700&family=Great+Vibes&display=swap" rel="stylesheet">

<!-- Icons -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" rel="stylesheet">

<style>

/* ===== Background Luxury Texture Effect ===== */
body{
    margin:0;
    background:
    radial-gradient(circle at top left,#e2c39a,transparent 60%),
    radial-gradient(circle at bottom right,#8b5e3c,transparent 60%),
    linear-gradient(to bottom,#c49a6c,#a47149,#8b5e3c);
    font-family:'Cinzel', serif;
    color:#fff;
}

/* ===== Navbar ===== */
.navbar{
    background:rgba(0,0,0,0.35);
    backdrop-filter:blur(8px);
    padding:15px 0;
}

.brand{
    font-family:'Great Vibes', cursive;
    font-size:42px;
    color:#fbe7c6;
}

.login-btn{
    background:linear-gradient(45deg,#e6c07b,#b8893c);
    border:none;
    border-radius:30px;
    padding:6px 25px;
    font-weight:bold;
}

/* ===== Slider ===== */
.carousel-item{
    position:relative;
}

.carousel-item img{
    height:650px;
    object-fit:cover;
    filter:brightness(75%);
}

.slider-content{
    position:absolute;
    bottom:25%;
    left:8%;
    animation:fadeUp 1.8s ease;
}

.slider-content h2{
    font-family:'Great Vibes', cursive;
    font-size:55px;
}

.slider-content p{
    font-size:20px;
}

@keyframes fadeUp{
    from{opacity:0; transform:translateY(50px);}
    to{opacity:1; transform:translateY(0);}
}

/* ===== Section Title ===== */
.section-title{
    font-family:'Great Vibes', cursive;
    font-size:48px;
    text-align:center;
    margin:60px 0 30px;
    color:#fff3d4;
}

/* ===== Service Card ===== */
.service-card{
    background:rgba(255,255,255,0.15);
    backdrop-filter:blur(10px);
    border-radius:15px;
    overflow:hidden;
    transition:0.4s;
    box-shadow:0 8px 20px rgba(0,0,0,0.4);
}

.service-card img{
    height:230px;
    object-fit:cover;
}

.service-card:hover{
    transform:translateY(-10px);
    box-shadow:0 15px 35px rgba(0,0,0,0.6);
}

/* ===== Gallery ===== */
.gallery img{
    height:200px;
    object-fit:cover;
    border-radius:12px;
    transition:0.4s;
    box-shadow:0 5px 15px rgba(0,0,0,0.4);
}

.gallery img:hover{
    transform:scale(1.05);
}

/* ===== Review ===== */
.review-box{
    background:rgba(255,255,255,0.15);
    backdrop-filter:blur(10px);
    padding:20px;
    border-radius:15px;
    box-shadow:0 8px 20px rgba(0,0,0,0.4);
    margin-bottom:20px;
}

/* ===== Footer ===== */
footer{
    background:rgba(0,0,0,0.4);
    padding:25px 0;
    text-align:center;
}

.social-icons a{
    font-size:22px;
    margin:0 12px;
    color:#fff3d4;
    transition:0.3s;
}

.social-icons a:hover{
    color:#fff;
    transform:scale(1.3);
}

</style>
</head>
<body>

<!-- NAVBAR -->
<nav class="navbar fixed-top">
<div class="container d-flex justify-content-between align-items-center">
    <div class="brand">A1 Makeover</div>
    <a href="#" class="btn login-btn">Login</a>
</div>
</nav>

<!-- SLIDER -->
<div id="slider" class="carousel slide" data-bs-ride="carousel" data-bs-interval="3500">
<div class="carousel-inner">

<div class="carousel-item active">
<img src="https://images.unsplash.com/photo-1600948836101-f9ffda59d250" class="d-block w-100">
<div class="slider-content">
<h2>Luxury Bridal Studio</h2>
<p>Elegance in Every Detail</p>
</div>
</div>

<div class="carousel-item">
<img src="https://images.unsplash.com/photo-1594824475317-2c9d3b48b8d2" class="d-block w-100">
<div class="slider-content">
<h2>Professional Hair Experts</h2>
<p>Style That Defines You</p>
</div>
</div>

<div class="carousel-item">
<img src="https://images.unsplash.com/photo-1522337360788-8b13dee7a37e" class="d-block w-100">
<div class="slider-content">
<h2>Premium Nail Art</h2>
<p>Beauty Beyond Imagination</p>
</div>
</div>

</div>
</div>

<!-- SERVICES -->
<div class="container">
<h2 class="section-title">Our Services</h2>
<div class="row text-center">

<div class="col-md-3 mb-4">
<div class="service-card">
<img src="https://images.unsplash.com/photo-1606813902915-1a6f4cfd6a6b" class="w-100">
<div class="p-3">Bridal Makeover</div>
</div>
</div>

<div class="col-md-3 mb-4">
<div class="service-card">
<img src="https://images.unsplash.com/photo-1596464716127-f2a82984de30" class="w-100">
<div class="p-3">Hair Styling</div>
</div>
</div>

<div class="col-md-3 mb-4">
<div class="service-card">
<img src="https://images.unsplash.com/photo-1522337360788-8b13dee7a37e" class="w-100">
<div class="p-3">Nail Art</div>
</div>
</div>

<div class="col-md-3 mb-4">
<div class="service-card">
<img src="https://images.unsplash.com/photo-1556228720-195a672e8a03" class="w-100">
<div class="p-3">Spa & Facial</div>
</div>
</div>

</div>
</div>

<!-- GALLERY -->
<div class="container gallery">
<h2 class="section-title">Our Gallery</h2>
<div class="row">
@for($i=0;$i<8;$i++)
<div class="col-md-3 mb-4">
<img src="https://images.unsplash.com/photo-1522337360788-8b13dee7a37e" class="img-fluid">
</div>
@endfor
</div>
</div>

<!-- LOCATION + REVIEW -->
<div class="container my-5">
<div class="row">

<div class="col-md-6">
<h2 class="section-title">Our Location</h2>
<iframe
src="https://maps.google.com/maps?q=A1%20Makeover%20Sri%20Ganganagar%20Rajasthan&t=&z=14&ie=UTF8&iwloc=&output=embed"
width="100%" height="300" style="border-radius:15px;"></iframe>
</div>

<div class="col-md-6">
<h2 class="section-title">Client Reviews</h2>
<div class="review-box">
<strong>Riya K.</strong>
<p>Amazing bridal makeover service. Highly recommend!</p>
</div>
<div class="review-box">
<strong>Adeel M.</strong>
<p>Professional team and relaxing atmosphere.</p>
</div>
</div>

</div>
</div>

<!-- FOOTER -->
<footer>
<div class="social-icons">
<a href="#"><i class="fab fa-instagram"></i></a>
<a href="#"><i class="fab fa-facebook"></i></a>
<a href="#"><i class="fab fa-youtube"></i></a>
<a href="#"><i class="fab fa-whatsapp"></i></a>
</div>
<p class="mt-3">© 2026 A1 Makeover | All Rights Reserved</p>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
