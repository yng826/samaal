<?php

namespace App\Http\Controllers\JobDetail;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AwardController extends Controller
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
        foreach ($request->award as $award) {
            if (empty($award['id'])) {
                $affected = DB::table('job_applications_award')
                            ->insert([
                                'job_id' => $id,
                                'award_name' => $award['award_name'],
                                'award_group_name' => $award['award_group_name'],
                                'award_date' => date('Y-m-d', strtotime($award['award_date'])),
                            ]);
            } else {
                $affected = DB::table('job_applications_award')
                            ->where('id', $award['id'])
                            ->update([
                                'award_name' => $award['award_name'],
                                'award_group_name' => $award['award_group_name'],
                                'award_date' => date('Y-m-d', strtotime($award['award_date'])),
                            ]);
            }
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
        $affected = DB::table('job_applications_award')->where('id', $id)->delete();

        return 1;
    }
}
