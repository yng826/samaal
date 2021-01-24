<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class NoticeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $notices = DB::table('notices')->orderBy('id', 'desc')->paginate(10);

        return view('admin.notice.list', [
            'notices' => $notices,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $action = '/kor/admin/notice';

        return view('admin.notice.create', [
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
        $saved = DB::table('notices')
                    ->insert([
                        'title'=> $request->title,
                        'url'=> $request->url,
                        'button_color'=> $request->button_color,
                        'order'=> $request->order,
                        'is_use'=> $request->is_use,
                        'created_at' => now(),
                        'updated_at' => now()
                    ]);

        return redirect('/admin/notice');
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
        $notice = DB::table('notices')->where('id', $id)->first();
        $action = "/kor/admin/notice/{$id}";

        return view('admin.notice.create', [
            'notice'=> $notice,
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
        $affected = DB::table('notices')
                    ->where('id', $id)
                    ->update([
                        'title'=> $request->title,
                        'url'=> $request->url,
                        'button_color'=> $request->button_color,
                        'order'=> $request->order,
                        'is_use'=> $request->is_use,
                        'updated_at' => now()
                    ]);

        return redirect('/admin/notice');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $affected = DB::table('notices')->where('id', $id)->delete();

        return redirect('/admin/notice');
    }
}
