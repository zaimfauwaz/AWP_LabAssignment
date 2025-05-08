<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('indexer');
})->name('main');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::resource('lecturer', App\Http\Controllers\LecturerController::class)->except(['create', 'store']);
Route::resource('student', App\Http\Controllers\StudentController::class)->except(['create', 'store']);
Route::resource('subject', App\Http\Controllers\SubjectController::class);
Route::resource('assessment', App\Http\Controllers\AssessmentController::class);