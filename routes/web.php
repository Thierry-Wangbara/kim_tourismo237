<?php

use App\Livewire\Settings\Appearance;
use App\Livewire\Settings\Password;
use App\Livewire\Settings\Profile;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('home');

// Pages publiques
Route::get('/sites', [App\Http\Controllers\PublicSiteController::class, 'index'])->name('sites');
Route::get('/explore/{site}', [App\Http\Controllers\ExploreController::class, 'show'])->name('explore.show');

// Routes de réservation (authentification requise)
Route::middleware(['auth'])->group(function () {
    Route::get('/bookings', [App\Http\Controllers\BookingController::class, 'index'])->name('bookings.index');
    Route::get('/bookings/{booking}', [App\Http\Controllers\BookingController::class, 'show'])->name('bookings.show');
    Route::get('/sites/{site}/book', [App\Http\Controllers\BookingController::class, 'create'])->name('bookings.create');
    Route::post('/sites/{site}/book', [App\Http\Controllers\BookingController::class, 'store'])->name('bookings.store');
    Route::patch('/bookings/{booking}/cancel', [App\Http\Controllers\BookingController::class, 'cancel'])->name('bookings.cancel');
    
    // Routes de gestion des réservations pour les gestionnaires de sites
    Route::get('/site-manager/bookings', [App\Http\Controllers\SiteManagerBookingController::class, 'index'])->name('site-manager.bookings.index');
    Route::get('/site-manager/bookings/{booking}', [App\Http\Controllers\SiteManagerBookingController::class, 'show'])->name('site-manager.bookings.show');
    Route::patch('/site-manager/bookings/{booking}/status', [App\Http\Controllers\SiteManagerBookingController::class, 'updateStatus'])->name('site-manager.bookings.update-status');
    Route::patch('/site-manager/bookings/{booking}/approve', [App\Http\Controllers\SiteManagerBookingController::class, 'approve'])->name('site-manager.bookings.approve');
    Route::patch('/site-manager/bookings/{booking}/reject', [App\Http\Controllers\SiteManagerBookingController::class, 'reject'])->name('site-manager.bookings.reject');
    Route::get('/site-manager/sites/{site}/bookings', [App\Http\Controllers\SiteManagerBookingController::class, 'siteBookings'])->name('site-manager.sites.bookings');
});

Route::get('/hotel', function () {
    return view('hotel');
})->name('hotel');

Route::get('/vehicule', function () {
    return view('vehicule');
})->name('vehicule');

Route::get('/contact', function () {
    return view('contact');
})->name('contact');

Route::get('/a-propos', function () {
    return view('a-propos');
})->name('a-propos');

// Dashboard Admin
Route::get('/admin/dashboard', [App\Http\Controllers\Admin\AdminDashboardController::class, 'index'])->name('admin.dashboard');

// Les routes d'authentification sont définies dans routes/auth.php


// Page de profil
Route::get('/profil', [App\Http\Controllers\AuthController::class, 'showProfile'])->name('profile');

// Sélection du type de compte
Route::get('/choisir-compte', [App\Http\Controllers\AuthController::class, 'showAccountTypeSelection'])->name('account-type-selection');

// Dashboards par type de compte (authentification requise)
Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard/tourist', [App\Http\Controllers\DashboardController::class, 'tourist'])->name('dashboard.tourist');
    Route::get('/dashboard/site-manager', [App\Http\Controllers\DashboardController::class, 'siteManager'])->name('dashboard.site-manager');
});


Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

// Routes de gestion des sites pour les gestionnaires
Route::middleware(['auth'])->prefix('sites/manager')->name('sites.manager.')->group(function () {
    Route::get('/', [App\Http\Controllers\SiteController::class, 'index'])->name('index');
    Route::get('/create', [App\Http\Controllers\SiteController::class, 'create'])->name('create');
    Route::post('/', [App\Http\Controllers\SiteController::class, 'store'])->name('store');
    Route::get('/{site}', [App\Http\Controllers\SiteController::class, 'show'])->name('show');
    Route::get('/{site}/edit', [App\Http\Controllers\SiteController::class, 'edit'])->name('edit');
    Route::put('/{site}', [App\Http\Controllers\SiteController::class, 'update'])->name('update');
    Route::delete('/{site}', [App\Http\Controllers\SiteController::class, 'destroy'])->name('destroy');
    Route::patch('/{site}/toggle-status', [App\Http\Controllers\SiteController::class, 'toggleStatus'])->name('toggle-status');
});

Route::middleware(['auth'])->group(function () {
    Route::redirect('settings', 'settings/profile');

    Route::get('settings/profile', Profile::class)->name('settings.profile');
    Route::get('settings/password', Password::class)->name('settings.password');
    Route::get('settings/appearance', Appearance::class)->name('settings.appearance');
});

require __DIR__.'/auth.php';
