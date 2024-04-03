<?php

use App\Http\Controllers\LandingPageController;
use App\Http\Controllers\VideosController;
use App\Http\Controllers\VideosManageController;
use App\Http\Controllers\UsersManageController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [LandingPageController::class, 'show']);

Route::get('/videos/{id}', [VideosController::class,'show']);

Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified',])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::get('/manage/videos', [VideosManageController::class,'index'])->middleware(['can:videos_manage_index'])
        ->name('manage.videos');
    Route::post('/manage/videos', [VideosManageController::class,'store'])->middleware(['can:videos_manage_store']);
    Route::get('/manage/videos/{id}', [VideosManageController::class,'edit'])->middleware(['can:videos_manage_edit']);
    Route::put('/manage/videos/{id}', [VideosManageController::class,'update'])->middleware(['can:videos_manage_update']);
    Route::delete('/manage/videos/{id}', [VideosManageController::class,'destroy'])->middleware(['can:videos_manage_destroy']);

    Route::get('/manage/users', [ UsersManageController::class,'index'])->middleware(['can:users_manage_index'])
    ->name('manage.users');
    Route::post('/manage/users',[ UsersManageController::class,'store' ])->middleware(['can:users_manage_store']);
    Route::get('/manage/users/{id}', [UsersManageController::class,'edit'])->middleware(['can:users_manage_edit']);
    Route::put('/manage/users/{id}', [UsersManageController::class,'update'])->middleware(['can:users_manage_update']);
    Route::delete('/manage/users/{id}',[ UsersManageController::class,'destroy' ])->middleware(['can:users_manage_destroy']);

});
