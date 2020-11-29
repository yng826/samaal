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
        // Session::put('uuid', '32l4kjcl2k34j');
        // session()->put('uuid', 'test');
        // session(['uuid'=>'304t9j0w435jg']);
        // dd(session()->get('uuid'));
        // Session::flush();
        // $where = ['email' => Session::get('email')];
        // $items = Job::get($where);
        // $items = Job::where('')

        if ( $request->wantsJson() ) {
            $user = request()->user();
            $items = Job::where('user_id', $user->id)->with(['user', 'recruit','educations'])->get();
            return ResourcesJob::collection($items);
        } else {

            return view('workWithUs.job.list', [
                'pageClass' => 'about-ci',
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

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(),
              [
            //   'user_id' => 'required',
              'file' => 'required|mimes:jpg,jpeg,png|max:2048',
             ]);

        if ($validator->fails()) {
                return response()->json(['error'=>$validator->errors()], 401);
        } else {
            if ($files = $request->file('file')) {
                return response()->json(['result'=>'저장'], 200);
            }
        }
        return [
            'store',
            $request->all(),
        ];
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
        $item = Job::where($where)->with(['user', 'userInfo'])->first();
        // dd(DB::getQueryLog()); // Show results of log
        // return $item;

        if ( $request->wantsJson() ) {
            # code...
            return $item;
        } else {
            return view('workWithUs.job.edit', [
                'pageClass' => 'about-ci',
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
        $payLoad = json_decode($request->getContent(), true);
        $user = User::find($payLoad['user_id']);
        $job = Job::find($id);
        $user_info = UserInfo::find($payLoad['user_id']);

        // save user
        $user->name = $payLoad['user']['name'];
        $user->save();

        // save user_info
        $user_info->name_en = $payLoad['user_info']['name_en'];
        $user_info->birth_day = $payLoad['user_info']['birth_day'];
        $user_info->phone_last = $payLoad['phone_last'];
        $user_info->address_1 = $payLoad['address_1'];
        $user_info->address_2 = $payLoad['address_2'];
        $user_info->save();

        // save job
        $job->phone_encrypt = Crypt::encryptString($payLoad['phone_decrypt']);
        $job->address_1 = $payLoad['address_1'];
        $job->address_2 = $payLoad['address_2'];
        $job->file_path = $payLoad['file_path'];
        $job->status = 'pending';
        $job->save();
        return [
            'update',
            $payLoad,
            $user,
            $job,
        ];
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
