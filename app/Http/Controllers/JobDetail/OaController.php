<?php

namespace App\Http\Controllers\JobDetail;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OaController extends Controller
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
        foreach ($request->oa as $oa) {
            if (empty($oa['id'])) {
                $affected = DB::table('job_applications_oa')
                            ->insert([
                                'job_id' => $id,
                                'oa_name' => $oa['oa_name'],
                                'oa_level' => $oa['oa_level'],
                            ]);
            } else {
                $affected = DB::table('job_applications_oa')
                            ->where('id', $oa['id'])
                            ->update([
                                'oa_name' => $oa['oa_name'],
                                'oa_level' => $oa['oa_level'],
                            ]);
            }
        }

        $oa = DB::table('job_applications_oa')
                ->where('job_id', $id)
                ->get();

        return $oa;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $affected = DB::table('job_applications_oa')->where('id', $id)->delete();

        return 1;
    }
}
