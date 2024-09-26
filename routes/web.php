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
Route::get('/contacts/{contact}', [App\Http\Controllers\ContactController::class, 'show'])->name('contact.show');
Route::get('/contacts/{contact}/edit', [App\Http\Controllers\ContactController::class, 'edit'])->name('contact.edit');
Route::patch('/contacts/{contact}', [App\Http\Controllers\ContactController::class, 'update'])->name('contact.update');
Route::delete('/contacts/{contact}', [App\Http\Controllers\ContactController::class, 'destroy'])->name('contact.destroy');
Route::post('/contact', [App\Http\Controllers\ContactController::class, 'store'])->name('contact.store');

Route::get('/projects', [App\Http\Controllers\ProjectController::class, 'index'])->name('projects.index');
Route::get('/projects/create', [App\Http\Controllers\ProjectController::class, 'create'])->name('project.create');
Route::get('/projects/{project}', [App\Http\Controllers\ProjectController::class, 'show'])->name('project.show');
Route::get('/projects/{project}/edit', [App\Http\Controllers\ProjectController::class, 'edit'])->name('project.edit');
Route::patch('/projects/{project}', [App\Http\Controllers\ProjectController::class, 'update'])->name('project.update');
Route::delete('/projects/{project}', [App\Http\Controllers\ProjectController::class, 'destroy'])->name('project.destroy');
Route::post('/project', [App\Http\Controllers\ProjectController::class, 'store'])->name('project.store');

