<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class IrBoardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $boards = DB::table('ir_boards')->orderBy('id', 'desc')->paginate(10);
        return view('admin.ir_board.list', [
            'boards' => $boards,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $action = '/admin/ir_board';
        return view('admin.ir_board.create', [
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
        $file_path = Storage::putFile('public/ir', $request->file('file')); //파일 저장

        if($request->id > 0){
            $saved = DB::table('ir_boards')
                    ->where('id', $request->id)
                    ->update([
                        'category'=> $request->category,
                        'title'=> $request->title,
                        'contents'=> $request->contents,
                        'file_name'=> $request->file('file')->getClientOriginalName(),
                        'file_path'=> $file_path,
                        'updated_at' => now(),
                    ]);
        }else{
            $saved = DB::table('ir_boards')
            ->insert([
                'category'=> $request->category,
                'title'=> $request->title,
                'contents'=> $request->contents,
                'file_name'=> $request->file('file')->getClientOriginalName(),
                'file_path'=> $file_path,
                'created_at' => now()
            ]);
        }

        return redirect('/admin/ir_board');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
  /*  public function show($id)
    {
        $boards = DB::table('ir_boards')->where('id', $id)->first();
        $action = "/admin/ir_boards";

        return view('admin.ir_boards.'.$id, [
            'board'=> $boards,
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
        $board = DB::table('ir_boards')->where('id', $id)->first();
        $action = "/admin/ir_board/{$id}";

        return view('admin.ir_board.create', [
            'board'=> $board,
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
            $file_path = Storage::putFile('public/news', $request->file('file')); //파일 저장
        }


        $affected = DB::table('ir_boards')
        ->where('id', $id)
        ->update([
            'category'=> $request->category,
            'title'=> $request->title,
            'contents'=> $request->contents,
            'file_name'=> $file_name,
            'file_path'=> $file_path,
            'updated_at' => now(),
          ]);
        return redirect('/admin/ir_board');

    }

    /**
     * Upload file download.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function fileDownload(Request $request)
    {
        $board = DB::table('ir_boards')->where('id', $request->id)->first();

        $file =  Storage::get($board->file_path);

        return response($file, 200, ['Content-Disposition' => "attachment; filename={$board->file_name}"]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $affected = DB::table('ir_boards')
        ->where('id', $id)
        ->delete();
        return redirect('/admin/ir_board');
    }
}
