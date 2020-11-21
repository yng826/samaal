<?php

use App\Http\Controllers\aboutUs\HeritageController;
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

Route::get('sample', function () {
    return view('sample');
});

Route::prefix('about-us')->group(function() {
    // /about-us/heriatage
    Route::get('ci', function () {
        return view('aboutUs.aboutCi');
    });
    Route::get('story-news', function () {
        return view('aboutUs.storyNews');
    });
    Route::get('heritage', [HeritageController::class, 'index']);
});

Route::prefix('admin')->middleware('auth')->group(function () {
    Route::resource('menu', Admin\MenuController::class);
    // Route::get('menu/test', [Admin\MenuController::class, 'test']);
    Route::get('library', function () {
        return view('admin.test.library');
    });
});

Route::prefix('admin')->middleware('auth')->group(function () {
    Route::resource('finance_info', Admin\FinanceInfoController::class);
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
