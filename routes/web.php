<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\User\CurriculumController;

use App\Http\Controllers\Admin\LoginController;
use App\Http\Controllers\Admin\RegisterController;
use App\Http\Controllers\Admin\TopController;
use App\Http\Controllers\Admin\BannerController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

/*
Route::get('/', function () {
    return view('welcome');
});'
*/

//ユーザー画面
Route::prefix('user')->namespace('User')->name('user.')->group(function () {
    Route::get('/curriculum_list', 'CurriculumController@showCurriculumList')->name('show.curriculum');
});

//管理画面
Route::prefix('user')->namespace('Admin')->name('admin.')->group(function () {
    Route::get('/login', [LoginController::class, 'showLoginForm'])->name('show.login');
    Route::get('/register', [RegisterController::class, 'showRegisterForm'])->name('show.register');
    Route::get('/top', [TopController::class, 'showTop'])->name('show.top');
    Route::get('/banner_edit', [BannerController::class, 'showBannerEdit'])->name('show.edit');
});