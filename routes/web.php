<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AppointmentController;
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

Route::get('biller/edit/{appointments}', [billerController::class, 'biller_edit'])->middleware(['auth', 'verified'])->name('biller.edit');

Route::put('/biller/update/{appointments}', [BillerController::class, 'biller_update'])->middleware(['auth', 'verified'])->name('biller.update');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
require __DIR__ . '/auth.php';
