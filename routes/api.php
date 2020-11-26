<?php

use App\Http\Controllers\RecruitController;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;

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

    } else {

    }
    return [
        'logged' => $logged,
        'user' => $user,
        'access_token' => $token->accessToken,
    ];
});

Route::prefix('admin')->middleware('auth:api')->group(function () {
    Route::get('user', [RecruitController::class, 'api_index' ]);
});
