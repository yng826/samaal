<?php

namespace App\Http\Controllers\JobDetail;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OverseasStudyController extends Controller
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
        foreach ($request->oversea as $oversea) {
            if (empty($oversea['id'])) {
                $affected = DB::table('job_applications_overseas_study')
                            ->insert([
                                'job_id' => $id,
                                'country_name' => $oversea['country_name'],
                                'school_name' => $oversea['school_name'],
                                'overseas_study_name' => $oversea['overseas_study_name'],
                                'overseas_study_purpose' => $oversea['overseas_study_purpose'],
                                'overseas_study_contents' => $oversea['overseas_study_contents'],
                                'overseas_study_start' => date('Y-m-d', strtotime($oversea['overseas_study_start'])),
                                'overseas_study_end' => date('Y-m-d', strtotime($oversea['overseas_study_end'])),
                            ]);
            } else {
                $affected = DB::table('job_applications_overseas_study')
                            ->where('id', $oversea['id'])
                            ->update([
                                'country_name' => $oversea['country_name'],
                                'school_name' => $oversea['school_name'],
                                'overseas_study_name' => $oversea['overseas_study_name'],
                                'overseas_study_purpose' => $oversea['overseas_study_purpose'],
                                'overseas_study_contents' => $oversea['overseas_study_contents'],
                                'overseas_study_start' => date('Y-m-d', strtotime($oversea['overseas_study_start'])),
                                'overseas_study_end' => date('Y-m-d', strtotime($oversea['overseas_study_end'])),
                            ]);
            }
        }

        $study = DB::table('job_applications_overseas_study')
                ->where('job_id', $id)
                ->get();

        return $study;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $affected = DB::table('job_applications_overseas_study')->where('id', $id)->delete();

        return 1;
    }
}
