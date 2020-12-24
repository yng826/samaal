<?php

namespace App\Http\Controllers\Board;

use App\Custom\SmtpEmail;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class QuestionBoardController extends Controller
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
    public function create($category)
    {
        $action = '/board/question_board';
        return view('board.question_board.create', [
            'action' => $action,
            'category' => $category
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
        $saved = DB::table('question_boards')
                    ->insert([
                        'title'=> $request->title,
                        'category'=> $request->category,
                        'email'=> $request->email,
                        'question'=> $request->question,
                       // 'answer'=> $request->answer,
                       // 'state_yn'=> $request->state_yn,
                        'created_at' => now()
                    ]);
        $content = [];
        $content['email'] = 'test001@sama-al.com';
        $content['subject'] = "문의메일 - {$request->title}";
        $content['subject'] .= $request->category != $request->title ? " ($request->category)" : "";
        $content['text'] = "<p>$request->question</p>";
        $content['text'] .= "<p>$request->email</p>";
        // dd($content);
        SmtpEmail::email($content);
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // $boards = DB::table('question_boards')->where('id', $id)->first();
        // $action = "/admin/finance_info/{$id}";

        // return view('board.question_board.list', [
        //     'boards' => $boards,
        // ]);
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
       //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
