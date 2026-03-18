<?php

use Illuminate\Support\Facades\Route;

// Página principal
Route::view('/', 'welcome')->name('home');

// Páginas informativas públicas (implementadas en feature/public-pages)
Route::view('/nosotros', 'pages.about')->name('about');
Route::view('/programas', 'pages.programs')->name('programs');
Route::view('/contacto', 'pages.contact')->name('contact');

// Donaciones (implementada en feature/donations)
Route::view('/donar', 'pages.donate')->name('donate');

// Área privada
Route::middleware(['auth', 'verified'])->group(function () {
    Route::view('dashboard', 'dashboard')->name('dashboard');
});

require __DIR__.'/settings.php';
