<?php

namespace App\Http\Controllers\JobDetail;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CareerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        foreach ($request->career as $career) {
            if (empty($career['id'])) {
                $affected = DB::table('job_applications_career')
                            ->insert([
                                'job_id' => $id,
                                'career_start' => $career['career_start'] ? date('Y-m-d', strtotime($career['career_start'])) : null,
                                'career_end' => $career['career_end'] ? date('Y-m-d', strtotime($career['career_end'])) : null,
                                'career_name' => $career['career_name'],
                                'career_position' => $career['career_position'],
                                'career_department' => $career['career_department'],
                                'career_role' => $career['career_role'],
                            ]);
            } else {
                $affected = DB::table('job_applications_career')
                            ->where('id', $career['id'])
                            ->update([
                                'career_start' => $career['career_start'] ? date('Y-m-d', strtotime($career['career_start'])) : null,
                                'career_end' => $career['career_end'] ? date('Y-m-d', strtotime($career['career_end'])) : null,
                                'career_name' => $career['career_name'],
                                'career_position' => $career['career_position'],
                                'career_department' => $career['career_department'],
                                'career_role' => $career['career_role'],
                            ]);
            }
        }

        $career = DB::table('job_applications_career')
                ->where('job_id', $id)
                ->get();

        return $career;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $affected = DB::table('job_applications_career')->where('id', $id)->delete();

        return 1;
    }
}
