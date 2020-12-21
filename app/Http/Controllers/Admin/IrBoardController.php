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
        $img_file_path = '';
        $img_file_name = '';
        if (!empty($request->file('img_file'))) {
            $img_file_path = $request->file('img_file')->store('ir'); //이미지파일 저장
            $img_file_name = $request->file('img_file')->getClientOriginalName();
        }
        $pdf_file_path = '';
        $pdf_file_name = '';
        if (!empty($request->file('pdf_file'))) {
            $pdf_file_path = $request->file('pdf_file')->store('ir'); //PDF파일 저장
            $pdf_file_name = $request->file('pdf_file')->getClientOriginalName();
        }
        if($request->id > 0){
            $saved = DB::table('ir_boards')
                    ->where('id', $request->id)
                    ->update([
                        'title'=> $request->title,
                        'contents'=> $request->contents,
                        'img_file_name'=> $img_file_name,
                        'img_file_path'=> $img_file_path,
                        'pdf_file_name'=> $pdf_file_name,
                        'pdf_file_path'=> $pdf_file_path,
                        'updated_at' => now(),
                    ]);
        }else{
            $saved = DB::table('ir_boards')
            ->insert([
                'title'=> $request->title,
                'contents'=> $request->contents,
                'img_file_name'=> $img_file_name,
                'img_file_path'=> $img_file_path,
                'pdf_file_name'=> $pdf_file_name,
                'pdf_file_path'=> $pdf_file_path,
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

        $img_file_name = $request->img_file_name;
        $img_file_path = $request->img_file_path;
        $pdf_file_name = $request->pdf_file_name;
        $pdf_file_path = $request->pdf_file_path;
        if (!empty($request->file('img_file'))) {
            $img_file_name = $request->file('img_file')->getClientOriginalName();
            $img_file_path = $request->file('img_file')->store('ir'); //이미지파일 저장
        }
        if (!empty($request->file('pdf_file'))) {
            $pdf_file_name = $request->file('pdf_file')->getClientOriginalName();
            $pdf_file_path = $request->file('pdf_file')->store('ir'); //PDF파일 저장
        }


        $affected = DB::table('ir_boards')
        ->where('id', $id)
        ->update([
            'title'=> $request->title,
            'contents'=> $request->contents,
            'img_file_name'=>  $img_file_name,
            'img_file_path'=>  $img_file_path,
            'pdf_file_name'=>  $pdf_file_name,
            'pdf_file_path'=>  $pdf_file_path,
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

        $file =  Storage::get($request->type=='img' ? $board->img_file_path : $board->pdf_file_path);
        $file_name =  $request->type=='img' ? $board->img_file_name : $board->pdf_file_name;

        return response($file, 200, ['Content-Disposition' => "attachment; filename={$file_name}"]);
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
