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

            $user = User::find($formData['user_id']);
            $user_info = UserInfo::find($formData['user_id']);

            // save user
            $user->name = $formData['name'];
            $user->save();

            // save user_info
            $user_info->name_en = $formData['name_en'];
            $user_info->birth_day = $formData['birth_day'];
            $user_info->phone_last = $formData['phone_last'];
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
            $job->user_id = $user->id;
            $job->file_path = $filePath;
            $job->status = 'saved';
            $job->save();

            return $job;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, $id)
    {
        $where = ['id'=> $id];
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
        $user = User::find($formData['user_id']);
        $job = Job::find($id);
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
        }
        // save job
        $job->phone_encrypt = Crypt::encryptString($formData['phone_decrypt']);
        $job->address_1 = $formData['address_1'];
        $job->address_2 = $formData['address_2'];
        $job->file_path = $filePath;
        $job->status = 'saved';
        $job->save();
        return $job;
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
}
