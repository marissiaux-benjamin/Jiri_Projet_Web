<?php

//HOME
//Route::get('/', [App\Http\Controllers\JiriController::class, 'index'])->name('jiris.home');

//JIRIS

Route::middleware(['auth', 'verified'])->group(function () {
    //Read
    Route::get('/jiris', [App\Http\Controllers\JiriController::class, 'index'])->name('jiris.index');
    Route::get('/jiris/create', [App\Http\Controllers\JiriController::class, 'create'])->name('jiri.create');
    Route::get('/jiris/{jiri}', [App\Http\Controllers\JiriController::class, 'show'])
        ->name('jiri.show')
        ->can('view', 'jiri');

    Route::get('/jiris/{jiri}/edit', [App\Http\Controllers\JiriController::class, 'edit'])
        ->name('jiri.edit')
        ->can('update', 'jiri');

    Route::patch('/jiri/{jiri}', [App\Http\Controllers\JiriController::class, 'update'])
        ->name('jiri.update')
        ->can('update', 'jiri');
    Route::delete('/jiri/{jiri}', [App\Http\Controllers\JiriController::class, 'destroy'])
        ->name('jiri.destroy')
        ->can('delete', 'jiri');

    Route::post('/jiris', [App\Http\Controllers\JiriController::class, 'store'])->name('jiri.store');
});
