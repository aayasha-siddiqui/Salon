<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\CourseController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Admin\TrainerController;
use App\Http\Controllers\Admin\PaymentController;
use App\Http\Controllers\Admin\StudentController;
use App\Http\Controllers\Admin\EnquiryController;
use App\Http\Controllers\Salon\DashboardController as SalonDashboardController;
use App\Http\Controllers\Salon\StaffController;
use App\Http\Controllers\HomeController;
  use App\Http\Controllers\Salon\ServiceController;
use App\Http\Controllers\AyeshaController;

Route::get('/ayesha-users', [AyeshaController::class, 'index']);

/*
|--------------------------------------------------------------------------
| Auth Routes
|--------------------------------------------------------------------------
*/

Route::get('/login', [LoginController::class, 'showLogin'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

Route::redirect('/', '/home');
Route::middleware(['auth'])->group(function () {
Route::get('/salon/dashboard', [SalonDashboardController::class, 'index']);
});
Route::get('/welcome', function () {
    return view('welcome');
});
/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
|
| All /admin/* routes are protected by 'auth' middleware.
| Optionally, you can add 'admin' middleware if you create it.
*/

Route::middleware(['auth'])->prefix('admin')->name('admin.')->group(function () {

    // Dashboard
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // Courses
    Route::resource('courses', CourseController::class);

    // Trainers
    Route::resource('trainers', TrainerController::class);

    // Students
    Route::resource('students', StudentController::class);

    
});

// Public route to submit enquiry (no auth required)
Route::post('enquiry', [EnquiryController::class,'store'])->name('enquiry.store');


Route::middleware(['auth'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('enquiries', [EnquiryController::class, 'index'])->name('enquiries.index');
    Route::get('enquiries/create', [EnquiryController::class, 'create'])->name('enquiries.create');
    Route::post('enquiries', [EnquiryController::class,'store'])->name('enquiries.store');
});

Route::get('/send-whatsapp/{id}', [EnquiryController::class, 'sendWhatsapp'])
     ->name('send.whatsapp');

     use App\Http\Controllers\Admin\CertificateController;

Route::prefix('admin')->middleware(['auth'])->group(function () {
    Route::get('certificate', [CertificateController::class, 'create'])->name('admin.certificate.create');
    Route::post('certificate/generate', [CertificateController::class, 'generate'])->name('admin.certificate.generate');
});
// Show certificate template
Route::get('/admin/certificate/{student}', [App\Http\Controllers\Admin\CertificateController::class, 'show'])
    ->name('admin.certificate.show');
Route::get('/payments',[PaymentController::class,'indexx'])
    ->name('admin.payments.indexx');
Route::prefix('admin')->group(function(){


Route::get('/payments',[PaymentController::class,'index'])
    ->name('admin.payments.index');

Route::get('/payments/create/{student_id}',[PaymentController::class,'create'])
    ->name('admin.payments.create');

Route::post('/payments/store',[PaymentController::class,'store'])
    ->name('admin.payments.store');

Route::get('/payments/student/{student_id}',[PaymentController::class,'studentPayments'])
    ->name('admin.payments.student');

Route::delete('/payments/{payment}',[PaymentController::class,'destroy'])
    ->name('admin.payments.destroy');

});

  Route::resource('staff', StaffController::class);   


// OR if you want explicit route:
    Route::get('/staff/{staff}/view', [App\Http\Controllers\Salon\StaffController::class, 'show'])
         ->name('staff.show');

Route::prefix('salon')->middleware('auth')->group(function () {

    Route::get('services', [ServiceController::class, 'index'])
        ->name('services.index');

    Route::get('services/create', [ServiceController::class, 'create'])
        ->name('services.create');

    Route::post('services', [ServiceController::class, 'store'])
        ->name('services.store');

    Route::get('services/{service}/edit', [ServiceController::class, 'edit'])
        ->name('services.edit');

    Route::put('services/{service}', [ServiceController::class, 'update'])
        ->name('services.update');

    Route::delete('services/{service}', [ServiceController::class, 'destroy'])
        ->name('services.destroy');

});
Use App\Http\Controllers\Salon\AppointmentController;
use App\Http\Controllers\Salon\BillController;
use App\Http\Controllers\Salon\StaffSalaryController;
use App\Http\Controllers\Salon\SalaryGenerateController;
Route::prefix('salon')
->middleware('auth')
->group(function(){

Route::resource('appointments', AppointmentController::class);
Route::resource('billing', BillController::class);

});
// Customer check route (for AJAX)
Route::get('/customer/check/{phone}', [App\Http\Controllers\Salon\BillController::class, 'checkCustomer']);

// Customer khata routes
Route::get('/customer/{customer}/khata', [App\Http\Controllers\Salon\BillController::class, 'customerKhata'])->name('customer.khata');
Route::post('/customer/{customer}/collect-payment', [App\Http\Controllers\Salon\BillController::class, 'collectPayment'])->name('customer.collect-payment');
Route::get('/salary-slip/{id}', [StaffSalaryController::class,'showSlip']);

Route::resource('staff-salary', StaffSalaryController::class);

Route::prefix('salary')->group(function () {
Route::get('/salary', 
    [StaffSalaryController::class,'index']
)->name('salary.index');
    // 🔹 1. Monthly Salary Report
    Route::get('/report',
        [StaffSalaryController::class,'index'])
        ->name('salary.report');

    // 🔹 2. Open Generate Salary Page
    Route::get('/generate',
        [StaffSalaryController::class,'generateForm'])
        ->name('salary.generate.form');

    // 🔹 3. Calculate Salary (Staff Select + Bonus)
    Route::post('/calculate',
        [StaffSalaryController::class,'calculate'])
        ->name('salary.calculate');

    // 🔹 4. Save Generated Salary
    Route::post('/store',
        [StaffSalaryController::class,'store'])
        ->name('salary.store');

});
use App\Http\Controllers\Salon\SalonEnquiryController;


/* WEBSITE */
Route::get('/salon-enquiry',
[SalonEnquiryController::class,'create'])
->name('salon.enquiry.form');

Route::post('/salon-enquiry/store',
[SalonEnquiryController::class,'store'])
->name('salon.enquiry.store');

Route::get('/get-services/{gender}',
[SalonEnquiryController::class,'getServices']);

Route::post('/appointment-store',
[SalonEnquiryController::class,'store'])
->name('salon.enquiry.store');
// routes/web.php


Route::get('/home', [HomeController::class, 'index']); // YEH USE KARO
Route::post('/academy-enquiry',
[EnquiryController::class,'store'])
->name('academy.enquiry.store');
/* ADMIN PANEL */
Route::get('/admin/salon-enquiries',
[SalonEnquiryController::class,'index'])
->name('salon.enquiries.index');

Route::get('/admin/salon-enquiries/{id}',
[SalonEnquiryController::class,'show'])
->name('salon.enquiries.show');

Route::delete('/admin/salon-enquiries/{id}',
[SalonEnquiryController::class,'destroy'])
->name('salon.enquiries.destroy');

use App\Http\Controllers\Admin\SalaryController;

Route::get('/admin/salary-report',
[SalaryController::class,'salaryReport'])
->name('admin.salary.report');

Route::get(
'/salary/staff/{id}',
[App\Http\Controllers\Salon\StaffSalaryController::class,'staffDetails']
)->name('salary.staff.details');
Route::delete('/salary/{id}',[App\Http\Controllers\Salon\StaffSalaryController::class,'destroy'])->name('salary.delete');
Route::get('/salary/{id}/edit',[StaffSalaryController::class,'edit'])
->name('salary.edit');

Route::put('/salary/{id}',[StaffSalaryController::class,'update'])
->name('salary.update');