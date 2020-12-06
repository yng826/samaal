<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class IsoCertificationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $certifications = DB::table('iso_certifications')->orderBy('id', 'desc')->paginate(10);

        return view('admin.iso_certification.list', [
            'certifications' => $certifications,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $action = '/admin/iso_certification';

        return view('admin.iso_certification.create', [
            'action' => $action,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $file_path = $request->file('file')->store('iso'); //파일 저장

        $saved = DB::table('iso_certifications')
                    ->insert([
                        'first_date'=> date('Y.m.d', strtotime($request->first_date)),
                        'type'=> $request->type,
                        'standard'=> $request->standard,
                        'number'=> $request->number,
                        'file_name'=> $request->file('file')->getClientOriginalName(),
                        'file_path'=> $file_path,
                        'created_at' => now()
                    ]);

        return redirect('/admin/iso_certification');
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
        $certification = DB::table('iso_certifications')->where('id', $id)->first();
        $action = "/admin/iso_certification/{$id}";

        return view('admin.iso_certification.create', [
            'certification'=> $certification,
            'action'=> $action,
        ]);
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
        $file_name = $request->file_name;
        $file_path = $request->file_path;
        if (!empty($request->file('file'))) {
            $file_name = $request->file('file')->getClientOriginalName();
            $file_path = $request->file('file')->store('iso'); //파일 저장
        }

        $affected = DB::table('iso_certifications')
                    ->where('id', $id)
                    ->update([
                        'first_date'=> date('Y.m.d', strtotime($request->first_date)),
                        'type'=> $request->type,
                        'standard'=> $request->standard,
                        'number'=> $request->number,
                        'file_name'=>  $file_name,
                        'file_path'=>  $file_path,
                        'updated_at' => now()
                    ]);

        return redirect('/admin/iso_certification');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $affected = DB::table('iso_certifications')->where('id', $id)->delete();

        return redirect('/admin/iso_certification');
    }

    /**
     * Upload file download.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function fileDownload(Request $request)
    {
        $certification = DB::table('iso_certifications')->where('id', $request->id)->first();

        $file =  Storage::get($certification->file_path);

        return response($file, 200, ['Content-Disposition' => "attachment; filename={$certification->file_name}"]);
    }
}
