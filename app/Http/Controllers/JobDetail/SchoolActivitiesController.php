<?php

namespace App\Http\Controllers\JobDetail;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SchoolActivitiesController extends Controller
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
        foreach ($request->activities as $activities) {
            if (empty($activities['id'])) {
                $affected = DB::table('job_applications_school_activities')
                            ->insert([
                                'job_id' => $id,
                                'school_activities_start' => date('Y-m-d', strtotime($activities['school_activities_start'])),
                                'school_activities_end' => date('Y-m-d', strtotime($activities['school_activities_end'])),
                                'school_activities_affiliation' => $activities['school_activities_affiliation'],
                                'school_activities_role' => $activities['school_activities_role'],
                                'school_activities_contents' => $activities['school_activities_contents'],
                            ]);
            } else {
                $affected = DB::table('job_applications_school_activities')
                            ->where('id', $activities['id'])
                            ->update([
                                'school_activities_start' => date('Y-m-d', strtotime($activities['school_activities_start'])),
                                'school_activities_end' => date('Y-m-d', strtotime($activities['school_activities_end'])),
                                'school_activities_affiliation' => $activities['school_activities_affiliation'],
                                'school_activities_role' => $activities['school_activities_role'],
                                'school_activities_contents' => $activities['school_activities_contents'],
                            ]);
            }
        }

        $activities = DB::table('job_applications_school_activities')
                        ->where('job_id', $id)
                        ->get();

        return $activities;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $affected = DB::table('job_applications_school_activities')->where('id', $id)->delete();

        return 1;
    }
}
