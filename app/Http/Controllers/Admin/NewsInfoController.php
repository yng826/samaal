<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class NewsInfoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $infos = DB::table('news_infos')->orderBy('id', 'desc')->paginate(10);
        return view('admin.news_info.list', [
            'infos' => $infos
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $action = '/eng/admin/news_info';
        return view('admin.news_info.create', [
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
        // $file_path = Storage::putFile('news', $request->file('file')); //파일 저장
        $file_path = $request->file('file')->store('news');
        if($request->id > 0){
            $saved = DB::table('news_infos')
                    ->where('id', $request->id)
                    ->update([
                        'title'=> $request->title,
                        'contents'=> $request->contents,
                        'img_file_name'=> $request->file('file')->getClientOriginalName(),
                        'img_file_path'=> $file_path,
                        'use_yn'=> $request->use_yn,
                        'updated_at' => now(),
                    ]);
        }else{
            $saved = DB::table('news_infos')
            ->insert([
                'title'=> $request->title,
                'contents'=> $request->contents,
                'img_file_name'=> $request->file('file')->getClientOriginalName(),
                'img_file_path'=> $file_path,
                'use_yn'=> $request->use_yn,
                'created_at' => now()
            ]);
        }

        return redirect('/admin/news_info');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
  /*  public function show($id)
    {
        $infos = DB::table('news_infos')->where('id', $id)->first();
        $action = "/eng/admin/news_infos";

        return view('admin.news_infos.'.$id, [
            'info'=> $infos,
            'action'=> $action,
        ]);
    } */

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $info = DB::table('news_infos')->where('id', $id)->first();
        $action = "/eng/admin/news_info/{$id}";

        return view('admin.news_info.create', [
            'info'=> $info,
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

        $img_file_name = $request->img_file_name;
        $img_file_path = $request->img_file_path;

        if (!empty($request->file('file'))) {
            $file_name = $request->file('file')->getClientOriginalName();
            $img_file_name = $file_name;
            $file_path = $request->file('file')->store('news');
            $img_file_path = $file_path;
        }


        $affected = DB::table('news_infos')
        ->where('id', $id)
        ->update([
            'title'=> $request->title,
            'contents'=> $request->contents,
            'img_file_name'=> $img_file_name,
            'img_file_path'=> $img_file_path,
            'use_yn'=> $request->use_yn,
            'updated_at' => now(),
          ]);
        return redirect('/admin/news_info/');

    }

    /**
     * Upload file download.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function fileDownload(Request $request)
    {
        $info = DB::table('news_infos')->where('id', $request->id)->first();

        $file =  Storage::get($info->img_file_path);

        return response($file, 200, ['Content-Disposition' => "attachment; filename={$info->img_file_name}"]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $affected = DB::table('news_infos')
        ->where('id', $id)
        ->delete();
        return redirect('/admin/news_info');
    }
}
