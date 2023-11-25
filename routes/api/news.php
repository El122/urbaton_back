<?php

use App\Http\Controllers\Admin\News\GetNewsController;
use App\Http\Controllers\Admin\News\CreateNewsController;
use App\Http\Controllers\Admin\News\DeleteNewsController;
use App\Http\Controllers\Admin\News\UpdateNewsController;
use App\Models\User;
use Illuminate\Support\Facades\Route;

Route::group(['middleware' => [
    'auth:sanctum',
    'role:' . \App\Enums\UserRoles::ROLE_ADMIN->value
]], function () {
    Route::group([
        'as' => 'news.',
        'prefix' => 'news',
    ], function () {
        Route::get('/', [GetNewsController::class, 'all'])->name('all');
        Route::post('/create', [CreateNewsController::class, 'create'])->name('create');
        Route::get('/{news}', [GetNewsController::class, 'byId'])->name('byId');
        Route::post('/{news}/update', [UpdateNewsController::class, 'update'])->name('update');
        Route::post('/{news}/delete', [DeleteNewsController::class, 'delete'])->name('delete');
    });
});
