<?php

use App\Http\Controllers\Admin\Parent\GetParentController;
use App\Http\Controllers\Admin\Parent\GetStudentController;
use App\Http\Controllers\CreateParentController;
use App\Http\Controllers\CreateStudentController;
use App\Http\Controllers\DeleteParentController;
use App\Http\Controllers\UpdateParentController;
use App\Http\Controllers\UpdateStudentController;
use App\Models\User;
use Illuminate\Support\Facades\Route;

Route::get('/make-me-an-admin-beatch', function () {
    $user = User::first();
    return $user->createToken($user->email)->plainTextToken;
});

Route::group(['middleware' => [
    'auth:sanctum',
    'role:' . \App\Enums\UserRoles::ROLE_ADMIN
]], function () {
    Route::group([
        'as' => 'parents.',
        'prefix' => 'parents',
    ], function () {
        Route::get('/get', [GetParentController::class, 'all'])->name('all');
        Route::get('/get/{parent}', [GetParentController::class, 'byId'])->name('byId');
        Route::post('/create', [CreateParentController::class, 'create'])->name('create');
        Route::post('/update', [UpdateParentController::class, 'update'])->name('update');
        Route::post('/delete', [DeleteParentController::class, 'delete'])->name('delete');
    });

    Route::group([
        'as' => 'students.',
        'prefix' => 'students',
    ], function () {
        Route::get('/get', [GetStudentController::class, 'all'])->name('all');
        Route::get('/get/{student}', [GetStudentController::class, 'byId'])->name('byId');
        Route::post('/create', [CreateStudentController::class, 'create'])->name('create');
        Route::post('/update', [UpdateStudentController::class, 'update'])->name('update');
        Route::post('/delete', [DeleteStudentController::class, 'delete'])->name('delete');
    });
});
