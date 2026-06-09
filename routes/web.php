<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::post('/resume/ask', [App\Http\Controllers\ResumeQaController::class, 'ask'])->name('resume.ask');

Route::get('/usman', function () {
    return view('usman');
});
