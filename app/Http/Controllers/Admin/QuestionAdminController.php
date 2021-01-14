<?php

namespace App\Http\Controllers\Admin;

use App\Custom\SmtpEmail;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class QuestionAdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $boards = DB::table('question_boards')->orderBy('id', 'desc')->paginate(10);

        return view('admin.question_admin.list', [
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
        $board = DB::table('question_boards')->where('id', $id)->first();
        $action = "/admin/question_admin";

        return view('admin.question_admin.show', [
            'board'=> $board,
            'action'=> $action,
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
        $board = DB::table('question_boards')->where('id', $id)->first();
        $action = "/admin/question_admin/{$id}";

        return view('admin.question_admin.create', [
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
        $affected = DB::table('question_boards')
                    ->where('id', $id)
                    ->update([
                        //'title'=> $request->title,
                        //'category'=> $request->category,
                        //'email'=> $request->email,
                        //'question'=> $request->question,
                        'answer'=> $request->answer,
                        'state_yn'=> 'y',
                        'updated_at' => now()
                    ]);

        $text = "<div style='background-color: #2b4985; width:100%; height: 40px;'></div>
        <div style='width: 120px;padding: 20px 0;'><img src='".env('APP_URL')."/images/common/logo.png' alt='삼아알미늄 로고'></div>
                <h4 style='font-size: 16px;color: black;'>안녕하세요. {$request->title}({$request->category}) 문의 답변 드립니다.</h4>
                <p style='font-size: 18px;color: black;'>". str_replace("\n", "<br/>", $request->answer). "</p>
                <h5 style='font-size:18px;color: black; text-align: right; color:#555;'>삼아문의담당자 드림</h5>";

        // EMAIL
        $mail['email'] = $request->email;
        $mail['subject'] = '[삼아] '. $request->title. '('. $request->category.') 문의 답변 메일';
        $mail['text'] = $text;
        SmtpEmail::email($mail);

        return redirect('/admin/question_admin');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table('question_boards')->where('id', '=', $id)->delete();
        return redirect('/admin/question_admin')->with('success','삭제에 성공했습니다.');
    }
}
