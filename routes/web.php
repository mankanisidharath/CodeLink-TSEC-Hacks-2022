<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('layout');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';

/** Projects Routes */
Route::get('/projects/getProjectsJson', [\App\Http\Controllers\ProjectsController::class, 'getProjectsJson'])->name('projects.getProjectsJson');
Route::resource('projects', \App\Http\Controllers\ProjectsController::class);
