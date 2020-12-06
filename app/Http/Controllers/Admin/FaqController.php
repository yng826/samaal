<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FaqController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $faqs = DB::table('faqs')->orderBy('id', 'desc')->paginate(10);

        return view('admin.faq.list', [
            'faqs' => $faqs,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $action = '/admin/faq';

        return view('admin.faq.create', [
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
        $saved = DB::table('faqs')
                    ->insert([
                        'category_id'=> $request->category_id,
                        'question'=> $request->question,
                        'answer'=> $request->answer,
                        'created_at' => now()
                    ]);

        return redirect('/admin/faq');
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
        $faq = DB::table('faqs')->where('id', $id)->first();
        $action = "/admin/faq/{$id}";

        return view('admin.faq.create', [
            'faq'=> $faq,
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
        $affected = DB::table('faqs')
                    ->where('id', $id)
                    ->update([
                        'category_id'=> $request->category_id,
                        'question'=> $request->question,
                        'answer'=> $request->answer,
                        'updated_at' => now()
                    ]);

        return redirect('/admin/faq');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $affected = DB::table('faqs')->where('id', $id)->delete();

        return redirect('/admin/faq');
    }
}
