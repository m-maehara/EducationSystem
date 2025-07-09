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

Auth::routes();

Route::get('/', function () {
    return view('welcome');
});


//ユーザー画面
Route::prefix('user')->namespace('User')->name('user.')->group(function () {
    Route::get('/article/{id}', [App\Http\Controllers\User\ArticleController::class, 'showArticle'])->name('show.article');
    
    
    Route::middleware('auth')->group(function(){
        Route::get('/profile_edit', [App\Http\Controllers\User\ProfileController::class, 'showProfileForm'])->name('show.profile.edit');
        Route::post('/profile_update', [App\Http\Controllers\User\ProfileController::class, 'updateProfile'])->name('update.profile');
        Route::get('/password_edit', [App\Http\Controllers\User\ProfileController::class, 'showPasswordForm'])->name('show.password.edit');
        Route::post('/password_update', [App\Http\Controllers\User\ProfileController::class, 'updatePassword'])->name('update.password');
        Route::get('/progress', [App\Http\Controllers\User\ProgressController::class, 'showProgress'])->name('show.progress');
        Route::get('/curriculum_list', [App\Http\Controllers\User\CurriculumController::class, 'showCurriculum'])->name('show.curriculum');
    });
});


//管理画面
Route::prefix('admin')->namespace('Admin')->name('admin.')->group(function () {
    Route::get('/login', [LoginController::class, 'showLoginForm'])->name('show.login');
    Route::get('/register', [RegisterController::class, 'showRegisterForm'])->name('show.register');
    Route::get('/top', [TopController::class, 'showTop'])->name('show.top');
    Route::get('/banner_edit', [BannerController::class, 'showBannerEdit'])->name('show.edit');
    Route::get('/article_list', [App\Http\Controllers\Admin\ArticleController::class, 'showArticleList'])->name('show.article.list');
    Route::delete('/destroy/{id}', [App\Http\Controllers\Admin\ArticleController::class, 'destroyArticle'])->name('destroy.article');
    Route::get('/article_create', [App\Http\Controllers\Admin\ArticleController::class, 'showArticleCreate'])->name('show.article.create');
    Route::post('/store', [App\Http\Controllers\Admin\ArticleController::class, 'storeArticle'])->name('store.article');
    Route::get('/article_edit/{id}', [App\Http\Controllers\Admin\ArticleController::class, 'showArticleEdit'])->name('show.article.edit');
    Route::post('/update/{id}', [App\Http\Controllers\Admin\ArticleController::class, 'updateArticle'])->name('update.article');
});
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
