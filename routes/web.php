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

Route::get('/sutik', 'App\Http\Controllers\CrudController@read')->name('sutik.index');
Route::get('/sutik/create', 'App\Http\Controllers\CrudController@create')->name('sutik.create');
Route::post('/sutik', 'App\Http\Controllers\CrudController@store')->name('sutik.store');
Route::get('/sutik/{suti}', 'App\Http\Controllers\CrudController@show')->name('sutik.show');
Route::get('/sutik/{suti}/edit', 'App\Http\Controllers\CrudController@edit')->name('sutik.edit');
Route::put('/sutik/{suti}', 'App\Http\Controllers\CrudController@update')->name('sutik.update');
Route::delete('/sutik/{suti}', 'App\Http\Controllers\CrudController@destroy')->name('sutik.destroy');

Route::post('contact', 'App\Http\Controllers\ContactFormController@postMessage');

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('messages', 'App\Http\Controllers\MessageController@read')->name('messages');

    Route::get('admin', 'App\Http\Controllers\AdminController@index')->name('admin');
    Route::get('admin/users/{user}/edit', 'App\Http\Controllers\AdminController@edit')->name('admin.users.edit');
    Route::put('admin/users/{user}', 'App\Http\Controllers\AdminController@updateRole')->name('admin.users.update');

    Route::get('dashboard', function () {
        return Inertia::render('dashboard');
    })->name('dashboard');
});

require __DIR__.'/settings.php';
require __DIR__.'/auth.php';
