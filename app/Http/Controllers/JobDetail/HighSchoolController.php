<?php

namespace App\Http\Controllers\JobDetail;

use App\Http\Controllers\Controller;
use App\Models\Work\HighSchool;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HighSchoolController extends Controller
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
        $highschool = $request->highschool;
        // foreach ($request->highschool as $highschool) {
            if (empty($highschool['id'])) {
                $affected = DB::table('job_applications_highschool')
                            ->insert([
                                'job_id' => $id,
                                'school_name' => $highschool['school_name'],
                                'school_major' => $highschool['school_major'],
                                'school_address' => $highschool['school_address'],
                                'school_graduation' => $highschool['school_graduation'],
                                'school_start' => $highschool['school_start'] ? date('Y-m-d', strtotime($highschool['school_start'])) : null,
                                'school_end' => $highschool['school_end'] ? date('Y-m-d', strtotime($highschool['school_end'])) : null,
                            ]);
            } else {
                $affected = DB::table('job_applications_highschool')
                            ->where('id', $highschool['id'])
                            ->update([
                                'school_name' => $highschool['school_name'],
                                'school_major' => $highschool['school_major'],
                                'school_address' => $highschool['school_address'],
                                'school_graduation' => $highschool['school_graduation'],
                                'school_start' => $highschool['school_start'] ? date('Y-m-d', strtotime($highschool['school_start'])) : null,
                                'school_end' => $highschool['school_end'] ? date('Y-m-d', strtotime($highschool['school_end'])) : null,
                            ]);
            }
        // }

        $highschool = HighSchool::where('job_id', $id)
                ->first();

        return $highschool;
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
