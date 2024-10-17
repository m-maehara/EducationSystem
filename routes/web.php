<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminAuthController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\UserTopController;


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

Route::get('/', function () {
    return view('welcome');
});

// 生徒（User）用のルート
Auth::routes(); // Laravelのデフォルト認証ルートを有効化

Route::get('/student/dashboard', [StudentController::class, 'index'])
    ->middleware('auth:web')
    ->name('student.dashboard');
Route::post('/logout', [App\Http\Controllers\Auth\LoginController::class, 'logout'])->name('logout');
Route::get('/user/top', [UserTopController::class, 'index'])->name('user.top');
Route::get('/schedule', 'ScheduleController@index')->name('schedule');
Route::get('/progress', 'ProgressController@index')->name('progress');
Route::get('/profile', 'ProfileController@index')->name('profile');
Route::get('/timetable', [TimetableController::class, 'index']);
Route::get('/progress', [ProgressController::class, 'index']);
Route::get('/profile', [ProfileController::class, 'index']);


// 管理者用のルート
Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('login', [AdminAuthController::class, 'showLoginForm'])->name('login');
    Route::post('login', [AdminAuthController::class, 'login']);
    Route::post('logout', [AdminAuthController::class, 'logout'])->name('logout');
    Route::get('dashboard', [AdminController::class, 'index'])->middleware('auth:admin')->name('dashboard');
});

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
