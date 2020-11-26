<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class IsoCertificationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $certifications = DB::table('iso_certifications')->orderBy('id', 'desc')->get();

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
        $file = $_FILES['file'];
        $file_error = $file['error'];
        $file_name = $file['name'];
        $upload_name = uniqid().'_'.$file_name;
        $file_path = 'D:/'.$upload_name;

        if ($file_error > 0) {
            echo 'Error: ' . $file_error . '<br>';
        } else {
            move_uploaded_file($upload_name, $file_path);

            $saved = DB::table('iso_certifications')
                    ->insert([
                        'first_date'=> date('Y.m.d', strtotime($request->first_date)),
                        'type'=> $request->type,
                        'standard'=> $request->standard,
                        'number'=> $request->number,
                        'file_name'=> $file_name,
                        'file_path'=> $file_path
                    ]);
        }

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
        $action = '/admin/iso_certification/{$id}';

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
        $file = $_FILES['file'];
        $file_name = '';
        $file_path = '';

        if(empty($file)) {
            $file_name = $request->file_name;
            $file_path = $request->file_path;

        } else {
            $file = $_FILES['file'];
            $file_error = $file['error'];
            $file_name = $file['name'];
            $upload_name = uniqid().'_'.$file_name;
            $file_path = 'D:/'.$upload_name;

            if ($file_error > 0) {
                echo 'Error: ' . $file_error . '<br>';
            } else {
                move_uploaded_file($upload_name, $file_path);
            }
        }

        $affected = DB::table('iso_certifications')
                    ->where('id', $id)
                    ->update([
                        'first_date'=> date('Y.m.d', strtotime($request->first_date)),
                        'type'=> $request->type,
                        'standard'=> $request->standard,
                        'number'=> $request->number,
                        'file_name'=> $file_name,
                        'file_path'=> $file_path,
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
}
