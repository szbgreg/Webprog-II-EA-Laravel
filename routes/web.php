<?php

use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', function () {
    return view('home');
})->name('home');

Route::get('/database', function () {
    return view('database');
})->name('database');

Route::get('/contact', function () {
    return view('contact');
})->name('contact');

Route::get('/diagram', function () {
    return view('diagram');
})->name('diagram');

Route::get('/crud', function () {
    return view('crud');
})->name('crud');

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('messages', function () {
        return view('messages');
    })->name('messages');

    Route::get('admin', 'App\Http\Controllers\AdminController@index')->name('admin');

    Route::get('dashboard', function () {
        return Inertia::render('dashboard');
    })->name('dashboard');
});

require __DIR__ . '/settings.php';
require __DIR__ . '/auth.php';
