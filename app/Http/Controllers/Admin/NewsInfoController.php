<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class NewsInfoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $infos = DB::table('news_infos')->orderBy('idx', 'desc')->get();
        return view('admin.news_info.list', [
            'infos' => $infos,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $action = '/admin/news_info';
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

        if($request->idx > 0){
            $saved = DB::table('news_infos')
                    ->where('idx', $request->idx)
                    ->update([
                        'title'=> $request->title,
                        'contents'=> $request->contents,
                        'img_url'=> $request->img_url,
                        'url'=> $request->url,
                        'use_yn'=> $request->use_yn,
                        'updated_at' => now(),
                    ]);
        }else{
            $saved = DB::table('news_infos')
            ->insert([
                'title'=> $request->title,
                'contents'=> $request->contents,
                'img_url'=> $request->img_url,
                'url'=> $request->url,
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
  /*  public function show($idx)
    {
        $infos = DB::table('news_infos')->where('idx', $idx)->first();
        $action = "/admin/news_infos";

        return view('admin.news_infos.'.$idx, [
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
    public function edit($idx)
    {
        $info = DB::table('news_infos')->where('idx', $idx)->first();
        $action = "/admin/news_info/{$idx}";

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
    public function update(Request $request, $idx)
    {
        $affected = DB::table('news_infos')
        ->where('idx', $idx)
        ->update([
            'title'=> $request->title,
            'contents'=> $request->contents,
            'img_url'=> $request->img_url,
            'url'=> $request->url,
            'use_yn'=> $request->use_yn,
            'updated_at' => now(),
          ]);
        return redirect('/admin/news_info');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($idx)
    {
        $affected = DB::table('news_infos')
        ->where('idx', $idx)
        ->delete();
        return redirect('/admin/news_info');
    }
}
