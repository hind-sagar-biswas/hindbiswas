<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactHindController;

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::get('/contact', function () {
       return view('contact_output', ['title' => 'Success!', 'message' => 'Message sent successfully!']); 
    });
    Route::post('/contact', [ContactHindController::class, 'contact'])->name('contact');
});
