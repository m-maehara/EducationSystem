<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\User\CurriculumController;

use App\Http\Controllers\Admin\Auth\LoginController;
use App\Http\Controllers\Admin\Auth\RegisterController;
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
    //承認機能 ----------------------------------------承認機能は別の方の担当のため、コメントアウト
    //Route::middleware('auth:user')->group(function () {
        Route::get('/curriculum_list', [CurriculumController::class, 'showCurriculumList'])->name('show.curriculum');
    //});
});

//管理画面
Route::prefix('user')->namespace('Admin')->name('admin.')->group(function () {
    Route::namespace('Auth')->group(function () {
        //新規ユーザー登録画面
        Route::get('register', [RegisterController::class, 'showRegisterForm'])->name('show.register');
        Route::post('register_exe', [RegisterController::class, 'exeRegisterForm'])->name('exe.register');

        //ログイン画面
        Route::get('login', [LoginController::class, 'showLoginForm'])->name('show.login');
        Route::post('login_exe', [LoginController::class, 'exeLoginForm'])->name('exe.login');
    });

    //承認機能
    Route::middleware('auth:admin', 'check.admin.approval')->group(function () {
        Route::get('/top', [TopController::class, 'showTop'])->name('show.top');

        Route::get('/banner_edit', [BannerController::class, 'showBannerEdit'])->name('show.banner.edit');
        Route::post('/banner_update', [BannerController::class, 'exeBannerEdit'])->name('exe.banner.edit');
        
        //ログアウト
        Route::post('logout', [LoginController::class, 'logout'])->name('exe.logout');
    });

});