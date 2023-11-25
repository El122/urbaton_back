<?php

use App\Http\Controllers\Group\GetGroupController;
use App\Http\Controllers\Group\CreateGroupController;
use App\Http\Controllers\Group\UpdateGroupController;
use App\Http\Controllers\Group\DeleteGroupController;
use Illuminate\Support\Facades\Route;

Route::group(['middleware' => [
    'auth:sanctum',
    'role:' . \App\Enums\UserRoles::ROLE_ADMIN->value
]], function () {
    Route::group([
        'as' => 'groups.',
        'prefix' => 'groups',
    ], function () {
        Route::get('/', [GetGroupController::class, 'all'])->name('all');
        Route::post('/create', [CreateGroupController::class, 'create'])->name('create');
        Route::get('/{group}', [GetGroupController::class, 'byId'])->name('byId');
        Route::post('/{group}/update', [UpdateGroupController::class, 'update'])->name('update');
        Route::post('/{group}/delete', [DeleteGroupController::class, 'delete'])->name('delete');
    });
});
