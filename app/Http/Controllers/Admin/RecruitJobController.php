<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RecruitJobController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param  int  $recruit_id
     * @return \Illuminate\Http\Response
     */
    public function index($recruit_id)
    {
        $recruits = DB::table('recruits')->orderBy('id', 'desc')->get();

        if (empty($recruit_id) || $recruit_id == 0) {
            $recruit_id = $recruits[0]->id;
        }

        $jobs = DB::table('job_applications')
                ->leftJoin('users', 'job_applications.user_id', '=', 'users.id')
                ->where('job_applications.recruit_id', $recruit_id)
                ->select('job_applications.*', 'users.name')
                ->orderBy('job_applications.id', 'desc')
                ->paginate(10);

        return view('admin.recruit.job.list', [
            'recruit_id' => $recruit_id,
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
        //
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
}
