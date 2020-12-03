<?php

namespace App\Http\Controllers\JobDetail;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MilitaryController extends Controller
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
        if (empty($request->military['id'])) {
            $affected = DB::table('job_applications_military')
                        ->insert([
                            'job_id' => $id,
                            'military_type' => $request->military['military_type'],
                            'military_discharge' => $request->military['military_discharge'],
                            'military_rank' => $request->military['military_rank'],
                            'military_exemption' => $request->military['military_exemption'],
                            'military_duration_start' => date('Y-m-d', strtotime($request->military['military_duration_start'])),
                            'military_duration_end' => date('Y-m-d', strtotime($request->military['military_duration_end'])),
                        ]);
        } else {
            $affected = DB::table('job_applications_military')
                        ->where('id', $request->military['id'])
                        ->update([
                            'military_type' => $request->military['military_type'],
                            'military_discharge' => $request->military['military_discharge'],
                            'military_rank' => $request->military['military_rank'],
                            'military_exemption' => $request->military['military_exemption'],
                            'military_duration_start' => date('Y-m-d', strtotime($request->military['military_duration_start'])),
                            'military_duration_end' => date('Y-m-d', strtotime($request->military['military_duration_end'])),
                        ]);
        }

        return 1;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $affected = DB::table('job_applications_military')->where('id', $id)->delete();

        return 1;
    }
}
