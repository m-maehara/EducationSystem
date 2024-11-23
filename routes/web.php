<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminAuthController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\UserTopController;
use App\Http\Controllers\ScheduleController;
use App\Http\Controllers\ProgressController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TimetableController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\DeliveryController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ArticleController;

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

// アプリケーションのトップページにアクセスした場合、ログインページにリダイレクト
Route::get('/', function () {
    return redirect()->route('login'); // ログインページにリダイレクト
});

// 生徒（User）用のルート
Auth::routes(); // Laravelのデフォルト認証ルートを有効化

Route::get('/student/dashboard', [StudentController::class, 'index'])
    ->middleware('auth:web')
    ->name('student.dashboard');

Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

// ユーザー関連のルート
Route::get('/user/top', [UserTopController::class, 'index'])->name('user.top');
Route::get('/schedule', [ScheduleController::class, 'index'])->name('schedule');
Route::get('/progress', [ProgressController::class, 'index'])->name('progress');
Route::get('/profile', [ProfileController::class, 'index'])->name('profile');
Route::get('/timetable', [TimetableController::class, 'index'])->name('timetable');

// 管理者用のルート
Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('login', [AdminAuthController::class, 'showLoginForm'])->name('login');
    Route::post('login', [AdminAuthController::class, 'login']);
    Route::post('logout', [AdminAuthController::class, 'logout'])->name('logout');
    Route::get('dashboard', [AdminController::class, 'index'])->middleware('auth:admin')->name('dashboard');
});

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');



Route::middleware('auth')->get('/user/delivery', [DeliveryController::class, 'index'])->name('user.delivery');
Route::get('/curriculum_list', [CurriculumController::class, 'index'])->name('curriculum_list');
Route::get('/article/{id}', [ArticleController::class, 'show'])->name('article.show');