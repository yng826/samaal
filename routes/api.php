<?php

use App\Http\Controllers\JobController;
use App\Http\Controllers\RecruitController;
use App\Models\User;
use App\Models\work\Job;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
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

Route::post('login', function (Request $request) {
    $credentials = $request->only('email', 'password');
    $logged = false;
    $user = null;
    $token = null;
    if (Auth::attempt($credentials)) {
        $logged = true;
        // $user = DB::table('users')->where('email', $credentials['email'])->first();
        $user = User::where('email', $credentials['email'])->first();
        $token = $user->createToken('api', []);
        session(['access_token' => $token->accessToken]);

    } else {

    }
    return [
        'logged' => $logged,
        'user' => $user,
        'token' => $token,
    ];
});

Route::prefix('work-with-us')->middleware('auth:api')->group(function () {
    Route::get('job', [JobController::class, 'index']);
    Route::get('job/{id}', [JobController::class, 'show'])
    ->where('id', '[0-9]+');
    Route::get('job/info', [JobController::class, 'index']);
    Route::post('job', [JobController::class, 'store']);
    Route::put('job/{id}', [JobController::class, 'update']);
});


Route::prefix('job-detail')->middleware(['auth:api'])->group(function () {
    Route::resource('award', JobDetail\AwardController::class);
    Route::resource('career', JobDetail\CareerController::class);
    Route::resource('certificate', JobDetail\CertificateController::class);
    Route::resource('education', JobDetail\EducationController::class);
    Route::resource('language', JobDetail\LanguageController::class);
    Route::resource('military', JobDetail\MilitaryController::class);
    Route::resource('oa', JobDetail\OaController::class);
    Route::resource('overseas_study', JobDetail\OverseasStudyController::class);
});

Route::prefix('admin')->middleware('auth:api')->group(function () {
    Route::get('user', [RecruitController::class, 'api_index' ]);
});
