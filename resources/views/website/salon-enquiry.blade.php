<!DOCTYPE html>
<html lang="en">
<head>

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Salon & Academy</title>

<script src="https://cdn.tailwindcss.com"></script>

<link rel="stylesheet"
href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

<style>
body{
background:linear-gradient(135deg,#000,#0f172a,#1f2937);
}
.gold-text{ color:#D4AF37; }
.gold-bg{
background:linear-gradient(135deg,#C9A227,#D4AF37,#B8962E);
}
.input{
width:100%;
padding:12px;
background:#1f2937;
border:1px solid #374151;
border-radius:8px;
color:white;
}
</style>

</head>

<body class="min-h-screen flex items-center justify-center p-6">

<div class="max-w-6xl w-full bg-gray-900 rounded-3xl shadow-2xl grid md:grid-cols-2 overflow-hidden">

<!-- LEFT IMAGE -->
<div class="relative hidden md:block">
<img src="https://images.unsplash.com/photo-1560066984-138dadb4c035"
class="h-full w-full object-cover">

<div class="absolute inset-0 bg-black/60 flex items-center justify-center">
<h2 class="text-3xl font-bold gold-text">
Luxury Salon & Academy
</h2>
</div>
</div>

<!-- RIGHT SIDE -->
<div class="p-10 text-white">

<h2 class="text-3xl font-bold gold-text text-center mb-6">
Choose Service
</h2>

<!-- BUTTON SWITCH -->
<div class="flex gap-4 mb-8">

<button onclick="showForm('appointment')"
class="w-1/2 gold-bg py-3 rounded-lg font-semibold">
Book Appointment
</button>

<button onclick="showForm('academy')"
class="w-1/2 border border-yellow-500 py-3 rounded-lg">
Join Academy
</button>

</div>


{{-- ================= APPOINTMENT FORM ================= --}}
<form id="appointmentForm"
method="POST"
action="{{ route('salon.enquiry.store') }}"
class="space-y-5">

@csrf

<h3 class="gold-text text-xl">Salon Appointment</h3>

<input name="name" placeholder="Your Name" required class="input">

<input name="contact" placeholder="Phone" required class="input">

<select name="gender" id="gender" class="input">
<option value="">Select Gender</option>
<option value="male">Male</option>
<option value="female">Female</option>
<option value="unisex">Unisex</option>
</select>

<select name="service" id="service" class="input">
<option>Select Service</option>
</select>

<div id="priceShow" class="gold-text"></div>

<textarea name="message" placeholder="Message" class="input"></textarea>

<button class="gold-bg w-full py-3 rounded-lg">
Submit Appointment
</button>

</form>



{{-- ================= ACADEMY FORM ================= --}}
<form id="academyForm"
method="POST"
action="{{ route('academy.enquiry.store') }}"
class="space-y-5 hidden">

@csrf

<h3 class="gold-text text-xl">Join Academy</h3>

<input name="name" required placeholder="Your Name" class="input">

<input name="phone" required placeholder="Phone" class="input">

<input name="email" placeholder="Email" class="input">

<select name="course_id" class="input" required>
<option value="">Select Course</option>

@foreach($courses as $course)
<option value="{{ $course->id }}">
{{ $course->title }}
(₹{{ $course->fees }} / {{ $course->duration }})
</option>
@endforeach

</select>

<textarea name="message"
placeholder="Why you want to join?"
class="input"></textarea>

<button class="gold-bg w-full py-3 rounded-lg">
Submit Academy Enquiry
</button>

</form>

</div>
</div>


{{-- ================= FORM SWITCH SCRIPT ================= --}}
<script>

function showForm(type){

document.getElementById('appointmentForm').style.display='none';
document.getElementById('academyForm').style.display='none';

if(type==='appointment'){
document.getElementById('appointmentForm').style.display='block';
}

if(type==='academy'){
document.getElementById('academyForm').style.display='block';
}

}


// SERVICE AJAX
document.getElementById('gender')
.addEventListener('change',function(){

fetch('/get-services/'+this.value)
.then(res=>res.json())
.then(data=>{

let service=document.getElementById('service');
service.innerHTML='<option>Select Service</option>';

data.forEach(item=>{
service.innerHTML+=`
<option data-price="${item.price}">
${item.name}
</option>`;
});

});
});


// PRICE SHOW
document.getElementById('service')
.addEventListener('change',function(){

let price=this.options[this.selectedIndex].dataset.price;

document.getElementById('priceShow').innerHTML=
price ? "Service Price : ₹ "+price : "";

});

</script>

</body>
</html>