<?php

use App\Http\Controllers\SutiController;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', function () {
    return view('home');
})->name('home');

Route::get('/database', [SutiController::class, 'index'])->name('database');

Route::get('/contact', function () {
    return view('contact');
})->name('contact');

Route::get('/diagram', 'App\Http\Controllers\DiagramController@index')->name('diagram');

Route::get('/crud', function () {
    return view('crud');
})->name('crud');

Route::post('contact', 'App\Http\Controllers\ContactFormController@postMessage');

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('messages', 'App\Http\Controllers\MessageController@read')->name('messages');

    Route::get('admin', 'App\Http\Controllers\AdminController@index')->name('admin');

    Route::get('dashboard', function () {
        return Inertia::render('dashboard');
    })->name('dashboard');
});

require __DIR__.'/settings.php';
require __DIR__.'/auth.php';
