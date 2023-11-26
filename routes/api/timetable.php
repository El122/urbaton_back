<?php

use App\Http\Controllers\Timetable\TimetableController;
use Illuminate\Support\Facades\Route;

Route::group([
    'middleware' => [
        'auth:sanctum',
        'role:' . \App\Enums\UserRoles::ROLE_ADMIN->value
    ]], function()
    {
        Route::group([
            'as' => 'timetable.',
            'prefix' => 'timetable',
        ], function()
            {
                Route::get('/generate', [TimetableController::class, 'generate'])->name('generate');
                Route::post('/save', [TimetableController::class, 'save'])->name('save');
            });
    });

Route::group([
    'middleware' => [
        'auth:sanctum',
        'role:' . \App\Enums\UserRoles::ROLE_ADMIN->value . '|' . \App\Enums\UserRoles::ROLE_TEACHER->value . '|' . \App\Enums\UserRoles::ROLE_STUDENT->value . '|' . \App\Enums\UserRoles::ROLE_PARENT->value
    ]], function()
    {
        Route::group([
            'as' => 'timetable.',
            'prefix' => 'timetable',
        ], function()
            {
                Route::get('/', [TimetableController::class, 'get'])->name('get');
            });
    });
