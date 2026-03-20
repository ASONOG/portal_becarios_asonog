<?php

use App\Http\Controllers\PayPalController;
use App\Livewire\Admin\AssignmentManage;
use App\Livewire\Admin\BecarioShow;
use App\Livewire\Admin\BecariosList;
use App\Livewire\Admin\Dashboard as AdminDashboard;
use App\Livewire\Admin\DocumentsReview;
use App\Livewire\Becario\Dashboard as BecarioDashboard;
use App\Livewire\Becario\DocumentUpload;
use Illuminate\Support\Facades\Route;

// -------------------------
// Páginas públicas
// -------------------------
Route::view('/', 'welcome')->name('home');
Route::view('/nosotros', 'pages.about')->name('about');
Route::view('/programas', 'pages.programs')->name('programs');
Route::view('/contacto', 'pages.contact')->name('contact');
Route::view('/donar', 'pages.donate')->name('donate');

// -------------------------
// PayPal (donaciones)
// -------------------------
Route::post('/paypal/create-order', [PayPalController::class, 'createOrder'])->name('paypal.create-order');
Route::post('/paypal/capture-order', [PayPalController::class, 'captureOrder'])->name('paypal.capture-order');

// -------------------------
// Redirección post-login según rol
// -------------------------
Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('dashboard', function () {
        return auth()->user()->isAdmin()
            ? redirect()->route('admin.dashboard')
            : redirect()->route('becario.dashboard');
    })->name('dashboard');
});

// -------------------------
// Área Becario
// -------------------------
Route::middleware(['auth', 'verified', 'role:becario'])
    ->prefix('becario')
    ->name('becario.')
    ->group(function () {
        Route::livewire('dashboard', BecarioDashboard::class)->name('dashboard');
        Route::livewire('documentos', DocumentUpload::class)->name('documents');
    });

// -------------------------
// Área Admin
// -------------------------
Route::middleware(['auth', 'verified', 'role:admin'])
    ->prefix('admin')
    ->name('admin.')
    ->group(function () {
        Route::livewire('dashboard', AdminDashboard::class)->name('dashboard');
        Route::livewire('solicitudes', AssignmentManage::class)->name('assignments.index');
        Route::livewire('becarios', BecariosList::class)->name('becarios.index');
        Route::livewire('becarios/{user}', BecarioShow::class)->name('becarios.show');
        Route::livewire('documentos', DocumentsReview::class)->name('documents.index');
    });

require __DIR__.'/settings.php';

