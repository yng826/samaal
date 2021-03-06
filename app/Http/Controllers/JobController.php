<?php

namespace App\Http\Controllers;

use App\Custom\SmtpEmail;
use App\Http\Resources\Job as ResourcesJob;
use App\Models\User;
use App\Models\UserInfo;
use App\Models\work\Job;
use App\Models\Work\RecruitsIndex;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class JobController extends Controller
{
    protected $status = [
        'saved' => '저장',
        'submit' => '제출',
    ];
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ( $request->wantsJson() ) {
            $user = request()->user();
            $items = Job::where('user_id', $user->id)
            ->with(['user', 'recruit','educations'])->get();
            return ResourcesJob::collection($items);
        } else {

            return view('workWithUs.job.list', [
                'pageClass' => 'work-apply',
                // 'items' => $items,
                'status' => $this->status,
            ]);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('workWithUs.job.create', [
            'pageClass' => 'work-apply',
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $formData = $request->all();
        $job = Job::where([
            'user_id' => $formData['user_id'],
            'recruit_id' => $formData['recruit_id'],
        ])->first();
        if ($job) {
            $result = [];
            $result['result'] = 'fail';
            $result['msg'] = '이미 저장된 이력서가 있습니다';
            $result['job'] = $job;
            return $result;
        } else {
            $user = User::find($formData['user_id']);
            $user_info = UserInfo::find($formData['user_id']);

            // save user
            $user->name = $formData['name'];
            $user->save();

            // save user_info

            $phone_decrypt = str_replace(" ", "", $formData['phone_decrypt']);

            $user_info->name_en = $formData['name_en'];
            $user_info->birth_day = $formData['birth_day'];
            $user_info->phone_last = substr($phone_decrypt,-4);
            $user_info->address_1 = $formData['address_1'];
            $user_info->address_2 = $formData['address_2'];
            $user_info->save();

            $filePath = '';
            if ($files = $request->file('pic')) {
                $filePath = $request->file('pic')->store('job');
                $filePath = $filePath;
            }
            $max = DB::table('recruits_index')->where('recruit_id', $formData['recruit_id'])->first();
            if ($max) {
                $recruit_index = RecruitsIndex::where('recruit_id', $formData['recruit_id'])->first();
                $recruit_index->num++;
            } else {
                $recruit_index = new RecruitsIndex();
                $recruit_index->recruit_id = $formData['recruit_id'];
                $recruit_index->num = 1;
            }
            $recruit_index->save();

            $job = new Job;
            $job->recruit_id = $formData['recruit_id'];
            $job->phone_last = substr($phone_decrypt,-4);
            $job->phone_encrypt = Crypt::encryptString($phone_decrypt);
            $job->address_1 = $formData['address_1'];
            $job->address_2 = $formData['address_2'];
            $job->user_id = $user->id;
            $job->file_path = $filePath;
            $job->status = 'saved';
            $job->num = $recruit_index->num;
            $job->save();

            $result = [];
            $result['result'] = 'success';
            $result['job'] = $job;
            return $result;
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, $id)
    {
        $where = [
            'id'=> $id,
        ];
        if ( $request->wantsJson() ) {
            if ( !$request->user() ) {
                redirect('/kor/work-with-us/recruit');
            }
            $where['user_id'] = $request->user()->id;
        }
        // return $where;
        DB::enableQueryLog(); // Enable query log
        $item = Job::where($where)->with(
            ['user','userInfo','educations','careers','military','awards','certificates','languages','oas','overseasStudys','recruit'])->first();
        // dd(DB::getQueryLog()); // Show results of log
        // return $item;

        if ( $request->wantsJson() ) {
            # code...
            return $item;
        } else {
            return view('workWithUs.job.edit', [
                'pageClass' => 'work-apply',
                'item' => $item,
                'id' => $id,
            ]);
        }

        // return DB::table('job_applications as job')
        //     ->join('recruits', 'job.recruit_id', '=', 'recruits.id')
        //     ->where(function ($query) use ($id) {
        //         $query->where('job.id', '=', $id);
        //     })
        //     ->get();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $formData = $request->all();
        $job = Job::find($id);

        $user = $request->user();
        $result = [];
        if ( $job->user_id != $user->id) {
            $result['result'] = 'error';
            $result['code'] = 401;
            return $result;
        }
        if ( isset($formData['cover_letter']) ) {
            $job->cover_letter = $formData['cover_letter'];
            $job->is_cover_letter = Str::length($job->cover_letter) > 0 ? 1 : 0;
            $job->save();
        } else {

            $phone_decrypt = str_replace(" ", "", $formData['phone_decrypt']);
            Log::debug('phone_decrypt::'. $phone_decrypt);

            $user = User::find($formData['user_id']);
            $user_info = UserInfo::find($formData['user_id']);
            // save user
            $user->name = $formData['name'];
            if ( isset($formData['password'] ) ) {
                $user->password = Hash::make($formData['password']);
            }
            $user->save();

            // save user_info
            $user_info->name_en = $formData['name_en'];
            $user_info->birth_day = $formData['birth_day'];
            $user_info->phone_encrypt = Crypt::encryptString($phone_decrypt);
            $user_info->phone_last = substr($phone_decrypt, -4);
            $user_info->address_1 = $formData['address_1'];
            $user_info->address_2 = $formData['address_2'];
            $user_info->save();

            // 파일 저장
            $filePath = '';
            if ($files = $request->file('pic')) {
                // $filePath = Storage::putFile('public/job', $files, 'public'); //파일 저장
                $filePath = $request->file('pic')->store('job');
                $filePath = $filePath;
            } else {
                $filePath = $formData['file_path'];
            }
            // save job
            $job->phone_encrypt = Crypt::encryptString($phone_decrypt);
            $job->address_1 = $formData['address_1'];
            $job->address_2 = $formData['address_2'];
            $job->file_path = $filePath;
            $job->status = 'saved';
            $job->save();
        }

        $result = [];
        $result['result'] = 'success';
        $result['job'] = $job;
        return $result;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        $job = Job::find($id);
        $recruit_id = $job->recruit_id;
        $user = $request->user();
        $result = [];
        if ( $job->user_id != $user->id) {
            $result['result'] = 'error';
            $result['code'] = 401;
            return $result;
        }

        DB::table('job_applications_award')->where('job_id', $job->id)->delete();
        DB::table('job_applications_career')->where('job_id', $job->id)->delete();
        DB::table('job_applications_certificate')->where('job_id', $job->id)->delete();
        DB::table('job_applications_education')->where('job_id', $job->id)->delete();
        DB::table('job_applications_highschool')->where('job_id', $job->id)->delete();
        DB::table('job_applications_hobby_specialty')->where('job_id', $job->id)->delete();
        DB::table('job_applications_language')->where('job_id', $job->id)->delete();
        DB::table('job_applications_military')->where('job_id', $job->id)->delete();
        DB::table('job_applications_oa')->where('job_id', $job->id)->delete();
        DB::table('job_applications_overseas_study')->where('job_id', $job->id)->delete();
        DB::table('job_applications_school_activities')->where('job_id', $job->id)->delete();
        $deleted = $job->delete();

        $list = Job::where('user_id', $user->id)
            ->where('recruit_id', $recruit_id)
            ->get();
        if ( count($list) > 0 ) {
            $list = Job::where('user_id', $user->id)
                ->where('recruit_id', $recruit_id)
                ->with(['user', 'recruit','educations'])
                ->get();
            $result['delete_user'] = false;
        } else {
            DB::table('user_infos')->where('id', $user->id)->delete();
            DB::table('users')->where('id', $user->id)->delete();
            $result['delete_user'] = true;
        }
        $result['result'] = 'success';
        $result['list'] = $list;
        $result['deleted'] = $deleted;
        return $result;
    }

    public function check(Request $request)
    {
        Session::put('email', $request->email);
        return redirect( route('work.job') )->with('hello', 'world');
    }

    public function search(Request $request, $recruit_id)
    {
        $job = Job::where([
            'recruit_id'=> $recruit_id,
            'user_id' => $request->user()->id,
        ])->first();

        return $job;
    }

    public function submit(Request $request, $job_id)
    {
        $job = Job::where([
            'id'=> $job_id,
            'user_id' => $request->user()->id,
        ])->with(['user', 'userInfo', 'recruit'])->first();

        $result = [];
        if ( $job ) {
            if ( $job->status == 'submit') {
                $result['result'] = 'fail';
                $result['msg'] = '이미 제출되었습니다';
            } else {
                $job->status = 'submit';
                $job->save();
                $result['result'] = 'success';
                // dd($job);

                $text = "<div style='background-color: #2b4985; width:100%; height: 40px;'></div>
<div style='width: 120px;padding: 20px 0;'><img src='".env('APP_URL')."/images/common/logo.png' alt='삼아알미늄 로고'></div>
<h4 style='font-size: 16px;color: black;'>안녕하세요, '{$job->user->name}'님</h4>
<p style='font-size: 24px;letter-spacing: -2px;font-weight: bold;color: #2b4985;'>귀하의 {$job->recruit->title}부문 지원서 제출이 완료되었습니다.</p>
<p style='font-size: 18px;color: black;'>지원 내역 확인은 채용공고 하단 [지원내역 확인 및 수정]에서 가능합니다.</p>
<p style='font-size: 18px;color: black;'>서류전형 합격 여부는 별도로 안내드릴 예정입니다.</p>
<p style='font-size: 18px;color: black;'>삼아에 지원해주셔서 다시 한 번 감사드립니다.</p>
<h5 style='font-size:18px;color: black; text-align: right; color:#555;'>삼아채용담당자 드림</h5>";
                // EMAIL
                $mail = [];
                $mail['email'] = $job->user->email;
                $mail['name'] = $job->user->name;
                $mail['subject'] = '[삼아] 채용 입사지원서 최종제출 완료';
                $mail['text'] = $text;
                SmtpEmail::email($mail);
                // return json_encode($mail);
                // $job
            }
        } else {
            $result['result'] = 'fail';
            $result['msg'] = '잘못된 접근입니다';
        }
        return $result;
    }
}
