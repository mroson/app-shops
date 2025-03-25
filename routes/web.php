<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\Auth\PasswordResetLinkController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\BusinessController;
use App\Http\Controllers\PasswordController;
use App\Http\Controllers\OfferController;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use App\Http\Controllers\OfferRedemptionController;


Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/login', [AuthenticatedSessionController::class, 'create'])->name('login');
Route::post('/login', [AuthenticatedSessionController::class, 'store']);
Route::get('/register', [RegisteredUserController::class, 'create'])->name('register');
Route::post('/register', [RegisteredUserController::class, 'store']);

// VISTA USERS
Route::get('/users', [UserController::class, 'index'])->name('users.index');
Route::get('/users', [UserController::class, 'index'])->middleware('auth');

//VISTA NEGOCIOS

// Add this route for businesses
Route::get('/businesses', [BusinessController::class, 'index'])->name('businesses.index');
Route::resource('businesses', BusinessController::class);
Route::post('/businesses', [BusinessController::class, 'store'])->name('businesses.store');
Route::put('/businesses/{business}', [BusinessController::class, 'update'])->name('businesses.update');
Route::get('/businesses/create', [BusinessController::class, 'create'])->name('businesses.create');
Route::get('/businesses/{id}', [BusinessController::class, 'show'])->name('businesses.show');

// PRofile 
Route::middleware(['auth'])->group(function () {
// Ruta para mostrar el perfil del usuario
Route::get('/profile', [ProfileController::class, 'showProfile'])->name('profile.profile');

// Ruta para editar el perfil del usuario
Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');

// Ruta para actualizar el perfil del usuario
Route::put('/profile', [ProfileController::class, 'update'])->name('profile.update');

// Ruta para eliminar la cuenta del usuario
Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    
// Ruta para manejar la actualización de la contraseña
Route::put('/profile/password', [PasswordController::class, 'update'])->name('password.update');
Route::middleware('auth')->put('/profile/password', [PasswordController::class, 'update'])->name('password.update');

// Ruta para mostrar el formulario de cambio de contraseña
Route::get('/profile/password', [PasswordController::class, 'showChangePasswordForm'])->name('password.form');
    
// Ruta para actualizar la contraseña
Route::put('/profile/password', [PasswordController::class, 'update'])->name('password.update');

});

require __DIR__.'/auth.php';

// Ruta para OFFERS
Route::resource('offers', OfferController::class);

Route::get('/admin', function () {
    return "Welcome Admin";
})->middleware('role:admin_user');

Route::get('/offers/redeem/{token}', [OfferRedemptionController::class, 'redeem'])->name('offers.redeem');
