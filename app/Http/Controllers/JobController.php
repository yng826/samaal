<?php

namespace App\Http\Controllers;

use App\Http\Resources\Job as ResourcesJob;
use App\Models\User;
use App\Models\UserInfo;
use App\Models\work\Job;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class JobController extends Controller
{
    protected $status = [
        'saved' => '저장',
        'submit' => '제출',
        'pending' => '검토중',
        'expired' => '만료',
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
            $items = Job::where('user_id', $user->id)->with(['user', 'recruit','educations'])->get();
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
        // $validator = Validator::make($request->all(),
        //       [
        //       'name' => 'required',
        //       'name_en' => 'required',
        //       'birth_day' => 'required',
        //       'file' => 'required|mimes:jpg,jpeg,png|max:2048',
        //      ]);

        // if ($validator->fails()) {
        //         return response()->json(['error'=>$validator->errors()], 401);
        // } else {
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
            $user_info->name_en = $formData['name_en'];
            $user_info->birth_day = $formData['birth_day'];
            $user_info->phone_last = substr($formData['phone_decrypt'],-4);
            $user_info->address_1 = $formData['address_1'];
            $user_info->address_2 = $formData['address_2'];
            $user_info->save();

            $filePath = '';
            if ($files = $request->file('pic')) {
                $filePath = $request->file('pic')->store('job');
                $filePath = $filePath;
            }
            $job = new Job;
            $job->recruit_id = $formData['recruit_id'];
            $job->phone_last = substr($formData['phone_decrypt'],-4);
            $job->phone_encrypt = Crypt::encryptString($formData['phone_decrypt']);
            $job->address_1 = $formData['address_1'];
            $job->address_2 = $formData['address_2'];
            $job->user_id = $user->id;
            $job->file_path = $filePath;
            $job->status = 'saved';
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
                redirect('/work-with-us/recruit');
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

        if ( isset($formData['cover_letter']) ) {
            $job->cover_letter = $formData['cover_letter'];
            $job->is_cover_letter = Str::length($job->cover_letter) > 0 ? 1 : 0;
            $job->save();
        } else {
            $user = User::find($formData['user_id']);
            $user_info = UserInfo::find($formData['user_id']);
            // save user
            $user->name = $formData['name'];
            $user->save();

            // save user_info
            $user_info->name_en = $formData['name_en'];
            $user_info->birth_day = $formData['birth_day'];
            $user_info->phone_last = substr($formData['phone_decrypt'], -4);
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
            $job->phone_encrypt = Crypt::encryptString($formData['phone_decrypt']);
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
    public function destroy($id)
    {
        //
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
        ])->first();

        $result = [];
        if ( $job ) {
            if ( $job->status == 'pending') {
                $result['result'] = 'fail';
                $result['msg'] = '제출된 입사지원서를 검토중입니다';
            } else if ( $job->status == 'submit') {
                $result['result'] = 'fail';
                $result['msg'] = '이미 제출되었습니다';
            } else if ( $job->status == 'expired') {
                $result['result'] = 'fail';
                $result['msg'] = '기한이 지났습니다';
            } else {
                $job->status = 'submit';
                $job->save();
                $result['result'] = 'success';
            }
        } else {
            $result['result'] = 'fail';
            $result['msg'] = '잘못된 접근입니다';
        }
        return $result;
    }
}
