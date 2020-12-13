<?php

namespace App\Http\Controllers\JobDetail;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LanguageController extends Controller
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
        foreach ($request->language as $language) {
            if (empty($language['id'])) {
                $affected = DB::table('job_applications_language')
                            ->insert([
                                'job_id' => $id,
                                'language_type' => $language['language_type'],
                                'language_name' => $language['language_name'],
                                'language_grade' => $language['language_grade'],
                                'language_start' => date('Y-m-d', strtotime($language['language_start'])),
                                'language_end' => date('Y-m-d', strtotime($language['language_end'])),
                                'language_level' => $language['language_level'],
                            ]);
            } else {
                $affected = DB::table('job_applications_language')
                            ->where('id', $language['id'])
                            ->update([
                                'language_type' => $language['language_type'],
                                'language_name' => $language['language_name'],
                                'language_grade' => $language['language_grade'],
                                'language_start' => date('Y-m-d', strtotime($language['language_start'])),
                                'language_end' => date('Y-m-d', strtotime($language['language_end'])),
                                'language_level' => $language['language_level'],
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
        $affected = DB::table('job_applications_language')->where('id', $id)->delete();

        return 1;
    }
}
