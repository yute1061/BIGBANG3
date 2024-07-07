<?php

use Illuminate\Support\Facades\Route;

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

use App\Http\Controllers\Admin\ArticleController;
Route::controller(ArticleController::class)->prefix('admin')->name('admin.')->middleware('auth')->group(function() {
    Route::get('article/create', 'add')->name('article.add');
    Route::post('article/create', 'create')->name('article.create'); 
    Route::post('article/preview', 'preview')->name('article.preview'); 
    Route::get('article', 'index')->name('article.index');
    Route::get('article/edit', 'edit')->name('article.edit');
    Route::post('article/edit_preview', 'edit_preview')->name('article.edit_preview'); 
    Route::post('article/edit', 'update')->name('article.update');
    Route::get('article/delete', 'delete')->name('article.delete');
});

use App\Http\Controllers\Admin\UserController;
Route::controller(UserController::class)->prefix('admin')->name('admin.')->middleware('auth')->group(function() {
    Route::get('user/edit', 'edit')->name('user.edit'); 
    Route::post('user/edit', 'update')->name('user.update');
    Route::get('user/mypage', 'mypage')->name('user.index');
});

//----adminここまで----//

Auth::routes();

use App\Http\Controllers\NavController as PublicNavController;
Route::controller(PublicNavController::class)->group(function() {
    Route::get('/', 'toppage')->name('toppage');
    Route::get('about', 'about')->name('about');
    Route::get('article/page', 'article_page')->name('article.page');
    Route::get('schedule', 'schedule')->name('schedule');
});

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
