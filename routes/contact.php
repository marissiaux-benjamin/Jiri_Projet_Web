<?php

//contacts
Route::middleware(['auth', 'verified'])->group(function () {

    //read
    Route::get('/contacts', [App\Http\Controllers\ContactController::class, 'index'])->name('contacts.index');
    Route::get('/contact/create', [App\Http\Controllers\ContactController::class, 'create'])->name('contact.create');
    Route::get('/contacts/{contact}', [App\Http\Controllers\ContactController::class, 'show'])
        ->can('view', 'contact')
        ->name('contact.show');

    Route::get('/contacts/{contact}/edit', [App\Http\Controllers\ContactController::class, 'edit'])
        ->can('update', 'contact')
        ->name('contact.edit');

    //update,delete,edit
    Route::patch('/contacts/{contact}', [App\Http\Controllers\ContactController::class, 'update'])
        ->can('update', 'contact')
        ->name('contact.update');

    Route::delete('/contacts/{contact}', [App\Http\Controllers\ContactController::class, 'destroy'])
        ->can('delete', 'contact')
        ->name('contact.destroy');

    Route::post('/contact', [App\Http\Controllers\ContactController::class, 'store'])->name('contact.store');

});
