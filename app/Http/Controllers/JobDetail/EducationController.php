<?php

namespace App\Http\Controllers\JobDetail;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EducationController extends Controller
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
        foreach ($request->education as $education) {
            if (empty($education['id'])) {
                $affected = DB::table('job_applications_education')
                            ->insert([
                                'job_id' => $id,
                                'school_name' => $education['school_name'],
                                'edu_major' => $education['edu_major'],
                                'edu_type' => $education['edu_type'],
                                'edu_time' => $education['edu_time'],
                                'edu_entrance' => $education['edu_entrance'],
                                'edu_graduation' => $education['edu_graduation'],
                                'edu_location' => $education['edu_location'],
                                'edu_grade_full' => $education['edu_grade_full'],
                                'edu_start' => $education['edu_start'] ? date('Y-m-d', strtotime($education['edu_start'])) : null,
                                'edu_end' => $education['edu_end'] ? date('Y-m-d', strtotime($education['edu_end'])) : null,
                                'graduation' => $education['graduation'],
                            ]);
            } else {
                $affected = DB::table('job_applications_education')
                            ->where('id', $education['id'])
                            ->update([
                                'school_name' => $education['school_name'],
                                'edu_major' => $education['edu_major'],
                                'edu_type' => $education['edu_type'],
                                'edu_time' => $education['edu_time'],
                                'edu_entrance' => $education['edu_entrance'],
                                'edu_graduation' => $education['edu_graduation'],
                                'edu_location' => $education['edu_location'],
                                'edu_grade' => $education['edu_grade'],
                                'edu_grade_full' => $education['edu_grade_full'],
                                'edu_start' => $education['edu_start'] ? date('Y-m-d', strtotime($education['edu_start'])) : null,
                                'edu_end' => $education['edu_end'] ? date('Y-m-d', strtotime($education['edu_end'])) : null,
                                'graduation' => $education['graduation'],
                            ]);
            }
        }

        $education = DB::table('job_applications_education')
                ->where('job_id', $id)
                ->get();

        return $education;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $affected = DB::table('job_applications_education')->where('id', $id)->delete();

        return 1;
    }
}
