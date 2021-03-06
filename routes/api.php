<?php

use App\Http\Controllers\Board\QuestionBoardController;
use App\Http\Controllers\JobController;
use App\Http\Controllers\Recruit\MemberController;
use App\Http\Controllers\RecruitController;
use App\Models\User;
use App\Models\UserInfo;
use App\Models\work\Job;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::post('login', [MemberController::class, 'login']);

Route::post('join', [MemberController::class, 'join']);

Route::post('find', [MemberController::class, 'find']);

Route::prefix('work-with-us')->middleware('auth:api')->group(function () {
    Route::get('job', [JobController::class, 'index']);
    Route::get('job/{id}', [JobController::class, 'show'])
    ->where('id', '[0-9]+');
    Route::get('job/info', [JobController::class, 'index']);
    Route::get('job/search/{recruit_id}', [JobController::class, 'search']);
    Route::post('job', [JobController::class, 'store']);
    Route::put('job/{id}', [JobController::class, 'update']);
    Route::delete('job/{id}', [JobController::class, 'destroy']);
    Route::put('job/submit/{id}', [JobController::class, 'submit']);

    Route::get('recruit/{id}', [RecruitController::class, 'show']);
});


Route::prefix('job-detail')->middleware(['auth:api'])->group(function () {
    Route::resource('award', JobDetail\AwardController::class);
    Route::resource('career', JobDetail\CareerController::class);
    Route::resource('certificate', JobDetail\CertificateController::class);
    Route::resource('highschool', JobDetail\HighSchoolController::class);
    Route::resource('education', JobDetail\EducationController::class);
    Route::resource('language', JobDetail\LanguageController::class);
    Route::resource('military', JobDetail\MilitaryController::class);
    Route::resource('oa', JobDetail\OaController::class);
    Route::resource('overseas_study', JobDetail\OverseasStudyController::class);
    Route::resource('school_activities', JobDetail\SchoolActivitiesController::class);
    Route::resource('hobby_specialty', JobDetail\HobbySpecialtyController::class);
});

Route::post('board', [QuestionBoardController::class, 'store'])->middleware(['csrf']);
