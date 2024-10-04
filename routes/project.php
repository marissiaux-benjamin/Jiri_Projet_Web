<?php

//projects
Route::middleware(['auth', 'verified'])->group(function () {

    //read
    Route::get('/projects', [App\Http\Controllers\ProjectController::class, 'index'])->name('projects.index');
    Route::get('/projects/create', [App\Http\Controllers\ProjectController::class, 'create'])->name('project.create');
    Route::get('/projects/{project}', [App\Http\Controllers\ProjectController::class, 'show'])
        ->can('view','project')
        ->name('project.show');

    Route::get('/projects/{project}/edit', [App\Http\Controllers\ProjectController::class, 'edit'])
        ->can('update','project')
        ->name('project.edit');

    Route::patch('/projects/{project}', [App\Http\Controllers\ProjectController::class, 'update'])
        ->can('update','project')
        ->name('project.update');

    Route::delete('/projects/{project}', [App\Http\Controllers\ProjectController::class, 'destroy'])
        ->can('destroy','project')
        ->name('project.destroy');

    Route::post('/project', [App\Http\Controllers\ProjectController::class, 'store'])->name('project.store');

});

