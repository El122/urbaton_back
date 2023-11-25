<?php

use App\Http\Controllers\Subject\GetSubjectController;
use App\Http\Controllers\Subject\CreateSubjectController;
use App\Http\Controllers\Subject\UpdateSubjectController;
use App\Http\Controllers\Subject\DeleteSubjectController;
use Illuminate\Support\Facades\Route;

Route::group(['middleware' => [
    'auth:sanctum',
    'role:' . \App\Enums\UserRoles::ROLE_ADMIN->value
]], function () {
    Route::group([
        'as' => 'subjects.',
        'prefix' => 'subjects',
    ], function () {
        Route::get('/', [GetSubjectController::class, 'all'])->name('all');
        Route::post('/create', [CreateSubjectController::class, 'create'])->name('create');
        Route::get('/{subject}', [GetSubjectController::class, 'byId'])->name('byId');
        Route::post('/{subject}/update', [UpdateSubjectController::class, 'update'])->name('update');
        Route::post('/{subject}/delete', [DeleteSubjectController::class, 'delete'])->name('delete');
    });
});
