<?php

namespace App\Http\Controllers\Recruit;

use App\Custom\SmtpEmail;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\UserInfo;
use App\Models\Work\Job;
use App\Models\Work\Recruit;
use App\Models\Work\RecruitsIndex;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Str;

class MemberController extends Controller
{
    public function join(Request $request)
    {
        $recruit_id = $request->recruit_id;
        $email = $request->email;
        $password = $request->password;
        $name = $request->name;
        $name_en = $request->name_en;
        $phone_decrypt = str_replace(" ", "", $request->phone_decrypt);
        $birth_day = $request->birth_day;
        $address_1 = $request->address_1;
        $address_2 = $request->address_2;

        $result = [];
        $result['result'] = 'fail';
        $result['msg'] = '';

        if ( $email == '' |
            $password == '' |
            $name == '' |
            $phone_decrypt == '' |
            $birth_day == '' ) {
                $result['msg'] = '항목이 비었습니다';
            return $result;
        }
        // check open
        // Log::debug('check open find:'. $recruit_id );
        $recruit = Recruit::find($recruit_id);

        // Log::debug('check open:'. json_encode($recruit) );
        if ( $recruit->recruit_status != 'open' ) {
            $result['result'] = 'fail';
            $result['type'] = 'join';
            $result['msg'] = '채용이 마감되었습니다.';
            return $result;
        }

        $user = User::where('email', $email)->first();
        if ( $user ) {
            $result['msg'] = '이력이 존재합니다. 지원내역을 확인해주세요';
            $result['user'] = $user;
        } else {
            $user = new User();
            $user->name = $name;
            $user->email = $email;
            $user->role = 'user';
            $user->password = Hash::make($password);

            $user_info = new UserInfo();
            $user_info->name_en = $name_en;
            $user_info->birth_day = substr($birth_day, 0, 10);
            $user_info->phone_encrypt = Crypt::encryptString($phone_decrypt);
            $user_info->phone_last = substr($phone_decrypt, -4);
            $user_info->address_1 = $address_1;
            $user_info->address_2 = $address_2;

            $max = DB::table('recruits_index')->where('recruit_id', $recruit_id)->first();
            if ($max) {
                $recruit_index = RecruitsIndex::where('recruit_id', $recruit_id)->first();
                $recruit_index->num++;
            } else {
                $recruit_index = new RecruitsIndex();
                $recruit_index->recruit_id = $recruit_id;
                $recruit_index->num = 1;
            }
            $recruit_index->save();
            $job = new Job();
            $job->recruit_id = $recruit_id;
            $job->num = $recruit_index->num;
            $job->phone_encrypt = Crypt::encryptString($phone_decrypt);
            $job->phone_last = substr($phone_decrypt, -4);
            $job->address_1 = $address_1;
            $job->address_2 = $address_2;
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
                $result['result'] = 'fail';
                $result['user'] = $user;
                $result['token'] = $token;
                $result['msg'] = '입력에 실패했습니다. 다시 시도해주세요.';
            }
        }

        return $result;
    }

    public function login(Request $request)
    {
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
    }

    public function find(Request $request)
    {
        $where = [
            'users.name' => $request->name,
            'users.email' => $request->email,
            // 'user_infos.phone_encrypt' =>Crypt::encryptString($request->phone),
        ];

        $user = User::with('user_info')->where($where)->first();

        $result = [];
        $result['result'] = 'success';

        $phone_check = $user->user_info->phone_decrypt == $request->phone;
        if ( $user ) {
            if ( $phone_check ) {
                // 임시비밀번호
                $password = Str::random(10);
                $logo = env('APP_URL', 'http://sama-al.com')."/images/common/logo.png";
                // 이메일 전송
                $mail = [];
                $mail['email'] = $user->email;
                $mail['name'] = $user->name;
                $mail['subject'] = '[삼아] 임시 비밀번호 발급';
                $mail['text'] = "<div style='background-color: #2b4985; width:100%; height: 40px;'></div>
<div style='width: 120px;padding: 20px 0;'><img src='{$logo}' alt='삼아알미늄 로고'></div>
<h4 style='font-size: 16px;color: black;'>안녕하세요, &apos;{$user->name}&apos;님</h4>님, <br/>
<p>임시비밀 번호는 <b>{$password}</b> 입니다. <br/>
감사합니다.</p>";
                $res = SmtpEmail::email($mail);
                if ( $res == 'success' ) {
                    $user->password = Hash::make($password);
                    $user->save();
                }

                # code...
                $result['msg'] = '이메일을 확인해주세요';
                $result['user'] = $user;
                $result['name'] = $request->name;
                $result['email'] = $request->email;
                $result['phone'] = $request->phone;
                $result['phone_decrypt'] = $user->user_info->phone_decrypt;
            } else {
                $result['result'] = 'fail';
                $result['user'] = $user;
                $result['msg'] = '휴대폰번호가 틀립니다';
                $result['phone'] = $request->phone;
                $result['phone_decrypt'] = $user->user_info->phone_decrypt;
            }
            # code...
        } else {
            $result['result'] = 'fail';
            $result['msg'] = '일치하는 계정이 없습니다';
            $result['where'] = $where;
        }
        return $result;
    }
}
