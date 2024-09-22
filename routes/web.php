<?php

use Illuminate\Support\Facades\Route;

Route::get('/', [App\Http\Controllers\JiriController::class, 'index'])->name('jiris.home');
Route::get('/jiris', [App\Http\Controllers\JiriController::class, 'index'])->name('jiris.index');
Route::get('/jiris/create', [App\Http\Controllers\JiriController::class, 'create'])->name('jiri.create');
Route::get('/jiris/{id}', [App\Http\Controllers\JiriController::class, 'show'])->name('jiris.show');
Route::post('/jiris', [App\Http\Controllers\JiriController::class, 'store'])->name('jiri.index');

Route::get('/contacts', [App\Http\Controllers\ContactController::class, 'index'])->name('contacts.index');
Route::get('/contacts/{id}', [App\Http\Controllers\ContactController::class, 'show'])->name('contact.show');

Route::get('/projects', [App\Http\Controllers\ProjectController::class, 'index'])->name('projects.index');
Route::get('/projects/{id}', [App\Http\Controllers\ProjectController::class, 'show'])->name('project.show');
