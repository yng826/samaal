<?php

use App\Http\Controllers\JobController;
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

Route::post('login', function (Request $request) {
    $credentials = $request->only('email', 'password');
    $logged = false;
    $user = null;
    $token = null;
    if (Auth::attempt($credentials)) {
        $logged = true;
        // $user = DB::table('users')->where('email', $credentials['email'])->first();
        $user = User::where('email', $credentials['email'])->first();
        $job = Job::where('user_id', $user->id)->get()->keyBy('recruit_id');
        $token = $user->createToken('api', []);
        session(['access_token' => $token->accessToken]);

    } else {
        $logged = false;
        $user = null;
        $job = null;
    }
    $result = [
        'logged' => $logged,
        'user' => $user,
        'job' => $job,
        'token' => $token,
    ];
    return $result;
});

Route::post('join', function (Request $request) {
    $recruit_id = $request->recruit_id;
    $email = $request->email;
    $password = $request->password;
    $name = $request->name;
    $name_en = $request->name_en;
    $phone_decrypt = $request->phone;
    $birth_day = $request->birth_day;
    $address_1 = $request->address_1;
    $address_2 = $request->address_2;

    $result = [];
    $result['result'] = 'fail';
    $result['msg'] = '';
    $user = User::where('email', $email)->first();
    if ( $user ) {
        $result['msg'] = '이력이 존재합니다. 지원내역을 확인해주세요';
        $result['user'] = $user;
    } else {
        $user = new User;
        $user->name = $name;
        $user->email = $email;
        $user->role = 'user';
        $user->password = Hash::make($password);

        $user_info = new UserInfo;
        $user_info->name_en = $name_en;
        $user_info->birth_day = substr($birth_day, 0, 10);
        $user_info->phone_encrypt = Crypt::encryptString($phone_decrypt);
        $user_info->phone_last = substr($phone_decrypt, -4);
        $user_info->address_1 = $address_1;
        $user_info->address_2 = $address_2;

        $job = new Job;
        $job->recruit_id = $recruit_id;
        $job->phone_encrypt = Crypt::encryptString($phone_decrypt);
        $job->phone_last = substr($phone_decrypt, -4);
        $job->status = 'saved';


        try {
            DB::transaction(function () use ($user, $user_info, $job) {
                $user->save();

                $user_info->id = $user->id;
                $user_info->save();

                $job->user_id = $user->id;
                $job->save();
            });
            $token = $user->createToken('api', []);
            session(['access_token' => $token->accessToken]);

            $result['result'] = 'success';
            $result['user'] = $user;
            $result['token'] = $token;
            $result['job_id'] = $job->id;
            $result['type'] = 'join';
            $result['msg'] = '인적사항 입력에 성공했습니다.';
        } catch (\Throwable $th) {
            $result['result'] = 'success';
            $result['user'] = $user;
            $result['token'] = $token;
            $result['msg'] = '입력에 실패했습니다. 다시 시도해주세요.';
        }
    }

    return $result;
});

Route::post('find', function (Request $request) {
    $user = User::where([
        'name' => $request->name,
        'email' => $request->email,
    ])->first();

    $result = [];
    $result['result'] = 'success';
    $result['user'] = $user;
    $result['name'] = $request->name;
    $result['email'] = $request->email;
    return $result;
});

Route::prefix('work-with-us')->middleware('auth:api')->group(function () {
    Route::get('job', [JobController::class, 'index']);
    Route::get('job/{id}', [JobController::class, 'show'])
    ->where('id', '[0-9]+');
    Route::get('job/info', [JobController::class, 'index']);
    Route::get('job/search/{recruit_id}', [JobController::class, 'search']);
    Route::post('job', [JobController::class, 'store']);
    Route::put('job/{id}', [JobController::class, 'update']);
    Route::put('job/submit/{id}', [JobController::class, 'submit']);

    Route::get('recruit/{id}', [RecruitController::class, 'show']);
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
