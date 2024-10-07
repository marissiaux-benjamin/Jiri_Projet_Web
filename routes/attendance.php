<?php

Route::patch('/attendance/{attendance}', [\App\Http\Controllers\AttendanceController::class, 'update'])
    ->can('update','attendance')
    ->name('attendance.update');
