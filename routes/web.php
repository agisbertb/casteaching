<?php

use App\Http\Controllers\VideosController;
use App\Http\Controllers\VideosManageController;
use App\Http\Controllers\UsersManageController;
use App\Models\Video;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/videos/{id}', [VideosController::class,'show']);

Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified',])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::get('/manage/videos', [VideosManageController::class,'index'])->middleware(['can:videos_manage_index'])
        ->name('manage.videos');

    Route::get('/manage/users', [ UsersManageController::class,'index'])->middleware(['can:users_manage_index'])
    ->name('manage.users');

});
