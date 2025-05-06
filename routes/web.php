<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::resource('lecturer', App\Http\Controllers\LecturerController::class);
Route::resource('student', App\Http\Controllers\StudentController::class);
Route::resource('subject', App\Http\Controllers\SubjectController::class);