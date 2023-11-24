<?php

use App\Http\Controllers\Admin\Parent\GetParentController;
use App\Http\Controllers\Admin\Parent\GetStudentController;
use App\Http\Controllers\Admin\Parent\CreateParentController;
use App\Http\Controllers\Admin\Student\CreateStudentController;
use App\Http\Controllers\Admin\Parent\DeleteParentController;
use App\Http\Controllers\Admin\Parent\UpdateParentController;
use App\Http\Controllers\Admin\Student\UpdateStudentController;
use App\Models\User;
use Illuminate\Support\Facades\Route;

Route::get('/make-me-an-admin-beatch', function () {
    $user = User::first();
    return $user->createToken($user->email)->plainTextToken;
});

Route::group(['middleware' => [
    'auth:sanctum',
    'role:' . \App\Enums\UserRoles::ROLE_ADMIN->value
]], function () {
    Route::group([
        'as' => 'parents.',
        'prefix' => 'parents',
    ], function () {
        Route::get('/get', [GetParentController::class, 'all'])->name('all');
        Route::get('/get/{parent}', [GetParentController::class, 'byId'])->name('byId');
        Route::post('/create', [CreateParentController::class, 'create'])->name('create');
        Route::post('/update/{parent}', [UpdateParentController::class, 'update'])->name('update');
        Route::post('/delete/{parent}', [DeleteParentController::class, 'delete'])->name('delete');
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
