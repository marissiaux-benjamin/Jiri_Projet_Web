<?php

//HOME
//Route::get('/', [App\Http\Controllers\JiriController::class, 'index'])->name('jiris.home');

//JIRIS

Route::middleware(['auth', 'verified'])->group(function () {
    //Read
    Route::get('/jiris', [App\Http\Controllers\JiriController::class, 'index'])->name('jiris.index');
    Route::get('/jiris/create', [App\Http\Controllers\JiriController::class, 'create'])->name('jiri.create');
    Route::get('/jiris/{jiri}', [App\Http\Controllers\JiriController::class, 'show'])->name('jiri.show');
    Route::get('/jiris/{jiri}/edit', [App\Http\Controllers\JiriController::class, 'edit'])->name('jiri.edit');
    Route::patch('/jiris/{jiri}', [App\Http\Controllers\JiriController::class, 'update'])->name('jiri.update');
    Route::delete('/jiri/{jiri}', [App\Http\Controllers\JiriController::class, 'destroy'])->name('jiri.destroy');
    Route::post('/jiris', [App\Http\Controllers\JiriController::class, 'store'])->name('jiri.store');

});
