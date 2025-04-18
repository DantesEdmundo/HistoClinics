<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\PatientController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BillerController;
use App\Models\appointments;


Route::get('/', function () {
    return view('welcome');
});

//ADMIN ROUTES
Route::get('admin/users', [AdminController::class, 'getUsersView'])
    ->middleware(['auth', 'verified'])
    ->name('admin.users');

Route::get('admin/users/create', [AdminController::class, 'createNewUserView'])
    ->middleware(['auth', 'verified'])
    ->name('admin.create_user.view');

Route::post('admin/users/create', [AdminController::class, 'createUser'])
    ->middleware(['auth', 'verified'])
    ->name('admin.create_user.post');

Route::get('admin/users/edit/{userId}', [AdminController::class, 'editUserView'])
    ->middleware(['auth', 'verified'])
    ->name('admin.edit_user.view');

//BILLER ROUTES

Route::get('/biller/management', [BillerController::class, 'biller_management'])->middleware(['auth', 'verified'])->name('biller.management');

Route::get('biller/create', [billerController::class, 'biller_create'])->middleware(['auth', 'verified'])->name('biller.create');

Route::post('biller/store', [billerController::class, 'biller_store'])->middleware(['auth', 'verified'])->name('biller.store');

Route::get('biller/edit/{appointment_id}', [billerController::class, 'biller_edit'])->middleware(['auth', 'verified'])->name('biller.edit');

Route::post('/biller/update', [BillerController::class, 'biller_update'])->middleware(['auth', 'verified'])->name('biller.update');


Route::get('/biller/delete/{appointment_id}', [BillerController::class, 'biller_delete'])->name('biller.delete');

//PATIENT ROUTES

Route::get('/patient/management', [PatientController::class, 'management'])->middleware(['auth', 'verified'])->name('patient.management');

Route::get('patient/create', [PatientController::class, 'patient_create'])->middleware(['auth', 'verified'])->name('patient.create');

Route::post('patient/store', [PatientController::class, 'patient_store'])->middleware(['auth', 'verified'])->name('patient.store');

Route::get('patient/edit/{id}', [PatientController::class, 'edit'])->middleware(['auth', 'verified'])->name('patient.edit');

Route::post('patient/update/{id}', [PatientController::class, 'update'])->middleware(['auth', 'verified'])->name('patient.update');

Route::get('patient/delete/{id}', [PatientController::class, 'delete'])->name('patient.delete');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
require __DIR__ . '/auth.php';
