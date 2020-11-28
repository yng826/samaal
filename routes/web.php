<?php

use App\Http\Controllers\aboutUs\HeritageController;
use App\Http\Controllers\JobController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\MenuController as AdminMenuController;
use App\Http\Controllers\Admin\NewsInfoController as NewsInfoController;
use App\Http\Controllers\Admin\IsoCertificationController as IsoCertificationController;
use Illuminate\Support\Facades\Session;

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

Route::prefix('business')->group(function() {
    Route::get('foil', function () {
        return view('business.foil.main');
    });
    Route::get('foil/capacitor', function () {
        return view('business.foil.capacitor');
    });
});

Route::prefix('work-with-us')->middleware('web')->group(function(){
    // Route::resource('recruit', RecruitController::class);
    Route::get('job', [JobController::class, 'index'])
    ->name('work.job');
    Route::get('job/{id}', [JobController::class, 'show'])
        ->where('id', '[0-9]+');
    Route::post('job', [JobController::class, 'store']);
    Route::post('job/{id}', [JobController::class, 'store'])
        ->where('id', '[0-9]+');
    Route::post('job/check', [JobController::class, 'check']);

    Route::resource('edu', Job\EducationController::class);
});

Route::get('role', function () {
    return 'auth';
})->middleware(['roles:admin']);

Route::prefix('admin')->middleware(['auth', 'roles:admin'])->group(function () {
    Route::post('menu/order-update', [AdminMenuController::class, 'orderUpdate']);
    Route::resource('menu', Admin\MenuController::class);
    Route::get('library', function () {
        return view('admin.test.library');
    });
});

Route::prefix('admin')->middleware(['auth', 'roles:admin'])->group(function () {
    Route::resource('finance_info', Admin\FinanceInfoController::class);
});

Route::prefix('admin')->middleware('auth')->group(function () {
    Route::get('news_info/file-download', [NewsInfoController::class, 'fileDownload']);
    Route::resource('news_info', Admin\NewsInfoController::class);
});

Route::prefix('admin')->middleware('auth')->group(function () {
    Route::get('iso_certification/file-download', [IsoCertificationController::class, 'fileDownload']);
    Route::resource('iso_certification', Admin\IsoCertificationController::class);
});

Route::prefix('admin')->middleware('auth')->group(function () {
    Route::resource('faq', Admin\FaqController::class);
});

Auth::routes();

Route::get('/confirm-password', function () {
    return view('auth.passwords.confirm');
})->middleware(['auth'])->name('auth.passwords.confirm');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('passport', function() {
    return view('test.passport');
})->middleware('auth');

Route::get('/test', function() {
    return view('test.vue');
});

Route::get('session', function () {
    return Session::get('access_token');
});
