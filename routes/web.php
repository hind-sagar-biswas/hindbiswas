<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactHindController;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::post('/contact', [ContactHindController::class, 'contact'])->name('contact');
});
