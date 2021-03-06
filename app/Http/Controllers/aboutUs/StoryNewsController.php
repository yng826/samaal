<?php

namespace App\Http\Controllers\aboutUs;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class StoryNewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $perPage = 3;
        $infos = DB::table('news_infos')->where('use_yn', 'y')->orderBy('id', 'desc')->paginate($perPage);
        $cnt = DB::table('news_infos')->where('use_yn', 'y')->count();

        $cnt = (int)ceil($cnt/$perPage);

        return view('aboutUs.story.list', [
            'infos' => $infos,
            'cnt' => $cnt
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $news = DB::table('news_infos')->where('id', $id)->first();
        $action = "/kor/admin/news_infos";

        debug($news);

        // return response()->json(["new"=>$new], 200);


        // $infos = DB::table('news_infos')->where('use_yn', 'y')->orderBy('id', 'desc')->paginate(9);
        // $cnt = DB::table('news_infos')->where('use_yn', 'y')->count();
        // debug($cnt);
        // $cnt = (int)ceil($cnt/9);

        // debug($cnt);
        return view('aboutUs.story.show', [
            'news' => $news,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

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

    }

    /**
     * Upload file download.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function fileDownload(Request $request)
    {

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

    }
}
