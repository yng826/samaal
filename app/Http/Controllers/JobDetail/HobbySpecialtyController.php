<?php

namespace App\Http\Controllers\JobDetail;

use App\Http\Controllers\Controller;
use App\Models\Work\HobbySpecialty;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HobbySpecialtyController extends Controller
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
        if (empty($request->specialty['id'])) {
            $specialty = new HobbySpecialty();
            $specialty->job_id = $id;
            $specialty->hobby = $request->specialty['hobby'];
            $specialty->specialty = $request->specialty['specialty'];
            $specialty->save();
        } else {
            $specialty = HobbySpecialty::find($request->specialty['id']);
            $specialty->hobby = $request->specialty['hobby'];
            $specialty->specialty = $request->specialty['specialty'];
            $specialty->save();
        }

        return $specialty;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $affected = DB::table('job_applications_hobby_specialty')->where('id', $id)->delete();

        return 1;
    }
}
