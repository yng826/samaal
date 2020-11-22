<?php

use App\Http\Controllers\aboutUs\HeritageController;
use Illuminate\Support\Facades\Auth;
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
    Route::get('location/poseung', function () {
        return view('aboutUs.locationPoseung');
    })->name('about-us.location.poseung');
    Route::get('location/seoul', function () {
        return view('aboutUs.locationSeoul');
    })->name('about-us.location.seoul');
    Route::get('location/busan', function () {
        return view('aboutUs.locationBusan');
    })->name('about-us.location.busan');
    Route::get('location/heritage', function () {
        return view('aboutUs.locationHeritage');
    })->name('about-us.location.heritage');
    Route::get('ceo', function () {
        return view('aboutUs.ceo');
    })->name('about-us.ceo');
    Route::get('ci', function () {
        return view('aboutUs.aboutCi');
    })->name('about-us.ci');
    Route::get('story-news', function () {
        return view('aboutUs.storyNews');
    })->name('about-us.story');
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
