<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Queue\Events\JobAttempted;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Models\Doctor;
use App\Http\Controllers\AppointmentController;
use App\Models\Appointment;

Route::get('/about', function () {
    $doctors = Doctor::all(); // get all doctors from database
    return view('about', compact('doctors'));
})->name('about');

Route::middleware('auth')->group(function () {
    Route::get('/userappointments', [AppointmentController::class, 'userAppointments'])->name('userappointments');
});

// Show contact page
Route::get('/contact', function () {
    $doctors = Doctor::all(); // fetch doctors
    return view('contact', compact('doctors'));
})->name('contact');

Route::get('/', [UserController::class,'Index'])->name(name: 'index');

Route::get('/alldoctors', [UserController::class,'allDoctors'])->name('alldoctors');
Route::post('/appointment', [UserController::class,'makeAnAppointment'])->name('appointment');

Route::get('/', [UserController::class, 'Index'])->name('index');

Route::get('/dashboard', [UserController::class,'Dashboard'])->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware(['auth', 'admin'])->group(function () {
    // Doctors management
    Route::get('/add_doctors', [AdminController::class,'addDoctors'])->name('add_doctors');
    Route::post('/add_doctors', [AdminController::class,'postAddDoctors'])->name('post_add_doctors');
    Route::get('/view_doctors', [AdminController::class,'viewDoctors'])->name('view_doctors');
    Route::get('/delete_doctor/{id}', [AdminController::class,'deleteDoctor'])->name('delete_doctor');
    Route::get('/update_doctor/{id}', [AdminController::class,'updateDoctor'])->name('update_doctor');
    Route::post('/post_update_doctor/{id}', [AdminController::class,'postUpdateDoctor'])->name('post_update_doctor');

    // Appointments management
    Route::get('/view_appointment', [AdminController::class,'viewAppointment'])->name('view_appointment');
    Route::get('/view_patients', [AdminController::class,'viewPatients'])->name('view_patients');
    Route::get('/delete_patient/{id}', [AdminController::class, 'deletePatient'])
     ->name('delete_patient');
    Route::get('/request', [AdminController::class, 'request'])->name('request');
    Route::get('/appointment/edit/{id}', [AppointmentController::class, 'edit'])->name('create_appointment');
    Route::post('/appointment/update/{id}', [AppointmentController::class, 'update'])->name('update_appointment');
    Route::get('/appointment/delete/{id}', [AppointmentController::class, 'destroy'])->name('delete_appointment');


    // Appointment creation flow
    Route::get('/create_appointment/{id}', [AdminController::class,'createAppointment'])->name('create_appointment');
    Route::post('/store_appointment', [AdminController::class,'storeAppointment'])->name('store_appointment');

    // Change status
    Route::post('/changestatus/{id}', [AdminController::class,'changeStatus'])->name('changestatus');

    // Route for updating an appointment
    Route::get('/appointment/edit/{id}', [AppointmentController::class, 'edit'])->name('edit_appointment');
    Route::put('/appointment/update/{id}', [AppointmentController::class, 'update'])->name('update_appointment');
    Route::get('/admin/add_patient', [AdminController::class, 'addPatient'])->name('add_patient');
    Route::post('/admin/store_patient_appointment', [AdminController::class, 'storePatientAppointment'])->name('store_appointment');
});


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

use App\Http\Controllers\ContactController;

Route::post('/contact/send', [ContactController::class, 'send'])
    ->name('contact.send');


require __DIR__.'/auth.php';