<?php

Route::patch('/attendance/{attendance}', [\App\Http\Controllers\AttendanceController::class, 'update'])
    ->name('attendance.update');
