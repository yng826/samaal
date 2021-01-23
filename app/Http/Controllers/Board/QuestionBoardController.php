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
        if($request->manager) {
            $content['email'] = $request->manager;
        } else {
            switch ($request->category) {
                case 'Product':
                    $content['email'] = env('QNA_MANAGER_PRODUCT');
                    break;
                case 'Recruitment':
                    $content['email'] = env('QNA_MANAGER_RECRUIT');
                    break;
                case 'Others':
                    $content['email'] = env('QNA_MANAGER_INFO');
                    break;
                default:
                    $content['email'] = 'webmaster@sama-al.com';
                    break;
            }
        }
        $content['subject'] = "문의메일 - {$request->title}";
        $content['subject'] .= $request->category != $request->title ? " ($request->category)" : "";
        $content['text'] = "<p>$request->question</p>";
        $content['text'] .= "<p>$request->email</p>";
        if ( env('APP_ENV', 'local') == 'production') {
            # code...
            SmtpEmail::email($content);
        }
        if ($request->expectsJson()) {
            $data = [];
            $data['result'] = $saved ? 'success' : 'fail';
            return response()->json($data);
        } else {
            return redirect()->back();
        }
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
        // $action = "/eng/admin/finance_info/{$id}";

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
