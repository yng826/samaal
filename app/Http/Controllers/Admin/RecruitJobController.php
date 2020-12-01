<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Work\Job;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class RecruitJobController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param  int  $recruit_id
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, $recruit_id)
    {
        $recruits = DB::table('recruits')->orderBy('id', 'desc')->get();

        if (empty($recruit_id) || $recruit_id == 0) {
            $recruit_id = $recruits[0]->id;
        }

        if (empty($request->status)) {
            $where = ['recruit_id' => $recruit_id];
        } else {
            $where = ['recruit_id' => $recruit_id, 'status' => $request->status];
        }

        $jobs = Job::where($where)->with(['user'])->orderBy('id', 'desc')->paginate(10);

        return view('admin.recruit.job.list', [
            'recruit_id' => $recruit_id,
            'status' => $request->status,
            'recruits' => $recruits,
            'jobs' => $jobs,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $recruit_id
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($recruit_id, $id)
    {
        $job = Job::find($id)->with(['user', 'userInfo', 'educations'])->first();

        return view('admin.recruit.job.detail', [
            'job' => $job,
        ]);
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
     * @param  int  $recruit_id
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $recruit_id, $id)
    {
        $affected = DB::table('job_applications')
                    ->where('id', $id)
                    ->update([
                        'status'=> $request->status
                    ]);

        return redirect("/admin/recruit/{$recruit_id}/job/{$id}");
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

    /**
     * Upload file download.
     *
     * @param  int  $recruit_id
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function fileDownload($recruit_id, $id)
    {
        $job = Job::find($id)->first();

        $file = Storage::get($job->file_path);
        $ext = pathinfo(storage_path(). $job->file_path, PATHINFO_EXTENSION);

        return response($file, 200, ['Content-Disposition' => "attachment; filename=profile.". $ext]);
    }
}
