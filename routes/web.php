<?php

use App\Http\Controllers\userController;

use App\Http\Controllers\PageController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('components.form');
})->name('home');

Route::get('/load-page/{page}', [PageController::class, 'loadPage'])->name('load-page');

Route::post('/submit-form', [PageController::class, 'submitForm'])->name('submit-form');
Route::post('/submit-form1', [PageController::class, 'submitForm1'])->name('submit-form1');