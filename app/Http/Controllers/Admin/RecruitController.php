<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Work\Job;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RecruitController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $recruits = DB::table('recruits')->orderBy('id', 'desc')->paginate(30);
        $dt     = Carbon::now();

        return view('admin.recruit.list', [
            'recruits'  => $recruits,
            'dt'        => $dt,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $action = '/kor/admin/recruit';

        return view('admin.recruit.create', [
            'action' => $action,
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
        $saved = DB::table('recruits')
                    ->insert([
                        'title'=> $request->title,
                        'career'=> $request->career,
                        'job_type'=> $request->job_type,
                        'start_date'=> date('Y.m.d', strtotime($request->start_date)),
                        'end_date'=> date('Y.m.d', strtotime($request->end_date)),
                        'recruit_status'=> 'standby',
                        'description'=> $request->description,
                        'created_at' => now()
                    ]);

        return redirect('/admin/recruit');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $recruit = DB::table('recruits')->where('id', $id)->first();
        $recruit_keywords = DB::table('recruit_keywords')->where('recruit_id', $id)->get();
        $action = "/kor/admin/recruit/{$id}";

        return view('admin.recruit.create', [
            'recruit'=> $recruit,
            'recruit_keywords'=> $recruit_keywords,
            'action'=> $action,
        ]);
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
        $affected = DB::table('recruits')
                    ->where('id', $id)
                    ->update([
                        'title'=> $request->title,
                        'career'=> $request->career,
                        'job_type'=> $request->job_type,
                        'start_date'=> date('Y.m.d', strtotime($request->start_date)),
                        'end_date'=> date('Y.m.d', strtotime($request->end_date)),
                        'description'=> $request->description,
                        'updated_at' => now()
                    ]);

        $affected = DB::table('recruit_keywords')->where('recruit_id', $id)->delete();
        if(!empty($request->keyword)){
            foreach ($request->keyword as $keyword) {
                if ($keyword != '') {
                    $affected = DB::table('recruit_keywords')
                                ->insert([
                                    'recruit_id' => $id,
                                    'keyword' => $keyword,
                                    'created_at' => now()
                                ]);
                }
            }
        }

        return redirect('/admin/recruit');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $job = Job::where('recruit_id', '=', $id)->first();
        $job_id = $job->id;
        DB::table('job_applications_award')->where('job_id', '=', $job_id)->delete();
        DB::table('job_applications_career')->where('job_id', '=', $job_id)->delete();
        DB::table('job_applications_certificate')->where('job_id', '=', $job_id)->delete();
        DB::table('job_applications_education')->where('job_id', '=', $job_id)->delete();
        DB::table('job_applications_highschool')->where('job_id', '=', $job_id)->delete();
        DB::table('job_applications_hobby_specialty')->where('job_id', '=', $job_id)->delete();
        DB::table('job_applications_language')->where('job_id', '=', $job_id)->delete();
        DB::table('job_applications_military')->where('job_id', '=', $job_id)->delete();
        DB::table('job_applications_oa')->where('job_id', '=', $job_id)->delete();
        DB::table('job_applications_overseas_study')->where('job_id', '=', $job_id)->delete();
        DB::table('job_applications_school_activities')->where('job_id', '=', $job_id)->delete();
        $job->delete();

        $affected = DB::table('recruits')->where('id', $id)->delete();

        return redirect('/admin/recruit');
    }
}
