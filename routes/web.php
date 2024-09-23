<?php

use Illuminate\Support\Facades\Route;

Route::get('/', [App\Http\Controllers\JiriController::class, 'index'])->name('jiris.home');

Route::get('/jiris', [App\Http\Controllers\JiriController::class, 'index'])->name('jiris.index');
Route::get('/jiris/create', [App\Http\Controllers\JiriController::class, 'create'])->name('jiri.create');
Route::get('/jiris/{jiri}', [App\Http\Controllers\JiriController::class, 'show'])->name('jiri.show');
Route::get('/jiris/{jiri}/edit', [App\Http\Controllers\JiriController::class, 'edit'])->name('jiri.edit');
Route::patch('/jiris/{jiri}', [App\Http\Controllers\JiriController::class, 'update'])->name('jiri.update');
Route::delete('/jiri/{jiri}', [App\Http\Controllers\JiriController::class, 'destroy'])->name('jiri.destroy');
Route::post('/jiris', [App\Http\Controllers\JiriController::class, 'store'])->name('jiri.store');

Route::get('/contacts', [App\Http\Controllers\ContactController::class, 'index'])->name('contacts.index');
Route::get('/contact/create', [App\Http\Controllers\ContactController::class, 'create'])->name('contact.create');
Route::post('/contact', [App\Http\Controllers\ContactController::class, 'store'])->name('contact.store');
Route::get('/contacts/{contact}', [App\Http\Controllers\ContactController::class, 'show'])->name('contact.show');

Route::get('/projects', [App\Http\Controllers\ProjectController::class, 'index'])->name('projects.index');
Route::get('/projects/create', [App\Http\Controllers\ProjectController::class, 'create'])->name('project.create');
Route::post('/project', [App\Http\Controllers\ProjectController::class, 'store'])->name('project.store');
Route::get('/projects/{project}', [App\Http\Controllers\ProjectController::class, 'show'])->name('project.show');

