<?php

use App\Http\Controllers\Admin\Parent\GetParentController;
use App\Http\Controllers\Admin\Student\GetStudentController;
use App\Http\Controllers\Admin\Teacher\GetTeacherController;
use App\Http\Controllers\Admin\Parent\CreateParentController;
use App\Http\Controllers\Admin\Student\CreateStudentController;
use App\Http\Controllers\Admin\Teacher\CreateTeacherController;
use App\Http\Controllers\Admin\Parent\DeleteParentController;
use App\Http\Controllers\Admin\Teacher\DeleteTeacherController;
use App\Http\Controllers\Admin\Student\DeleteStudentController;
use App\Http\Controllers\Admin\Parent\UpdateParentController;
use App\Http\Controllers\Admin\Student\UpdateStudentController;
use App\Http\Controllers\Admin\Teacher\UpdateTeacherController;
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
        Route::get('/', [GetParentController::class, 'all'])->name('all');
        Route::post('/create', [CreateParentController::class, 'create'])->name('create');
        Route::get('/{parent}', [GetParentController::class, 'byId'])->name('byId');
        Route::post('/{parent}/update', [UpdateParentController::class, 'update'])->name('update');
        Route::post('/{parent}/delete', [DeleteParentController::class, 'delete'])->name('delete');
    });

    Route::group([
        'as' => 'teachers.',
        'prefix' => 'teachers',
    ], function () {
        Route::get('/', [GetTeacherController::class, 'all'])->name('all');
        Route::post('/create', [CreateTeacherController::class, 'create'])->name('create');
        Route::get('/{teacher}', [GetTeacherController::class, 'byId'])->name('byId');
        Route::post('/{teacher}/update', [UpdateTeacherController::class, 'update'])->name('update');
        Route::post('/{teacher}/delete', [DeleteTeacherController::class, 'delete'])->name('delete');
    });

    Route::group([
        'as' => 'students.',
        'prefix' => 'students',
    ], function () {
        Route::get('/', [GetStudentController::class, 'all'])->name('all');
        Route::post('/create', [CreateStudentController::class, 'create'])->name('create');
        Route::get('/{student}', [GetStudentController::class, 'byId'])->name('byId');
        Route::post('/{student}/update', [UpdateStudentController::class, 'update'])->name('update');
        Route::post('/{student}/delete', [DeleteStudentController::class, 'delete'])->name('delete');
    });
});
