<?php

Route::delete('/assignment/{assignment}', [\App\Http\Controllers\AssignmentController::class, 'destroy'])
    ->can('delete','assignment')
    ->name('assignment.destroy');
