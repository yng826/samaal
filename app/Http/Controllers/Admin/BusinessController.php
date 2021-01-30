<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Business;
use Illuminate\Http\Request;

class BusinessController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $business = Business::get();
        // $users = DB::table('users')->where('role','!=','user')->orderBy('id', 'desc')->paginate(10);
        return view('admin.business.list', [
            'business' => $business,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // $business = new Business;
        $action = "/kor/admin/business";
        return view('admin.business.create', [
            'action' => $action,
            'url_disabled' => '',
            // 'business' => $business
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
        $img_file_1_path = '';
        $img_file_1_name = '';
        $img_file_2_path = '';
        $img_file_2_name = '';
        if (!empty($request->file('img_file_1'))) {
            $img_file_1_path = $request->file('img_file_1')->store('business'); //이미지파일 저장
            $img_file_1_name = $request->file('img_file_1')->getClientOriginalName();
        }
        if (!empty($request->file('img_file_2'))) {
            $img_file_2_path = $request->file('img_file_2')->store('business'); //이미지파일 저장
            $img_file_2_name = $request->file('img_file_2')->getClientOriginalName();
        }
        $business = new Business();
        $business->url = $request->url;
        $business->question_title = $request->question_title;
        $business->name = $request->name;
        $business->tel = $request->tel;
        $business->tel_view = $request->tel_view;
        $business->email = $request->email;
        $business->img_file_1_path = $img_file_1_path;
        $business->img_file_1_name = $img_file_1_name;
        $business->img_file_2_path = $img_file_2_path;
        $business->img_file_2_name = $img_file_2_name;
        $business->view = $request->view;
        $save = $business->save();
        if ($save) {
            return redirect("/admin/business/{$business->id}/edit")->with('success','저장에 성공했습니다.');
        } else {
            abort(401);
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
        $business = Business::find($id);

        if(!$business) {
            abort(404);
        }
        $action = "/kor/admin/business/{$id}";
        return view('admin.business.create', [
            'id' => $id,
            'action' => $action,
            'url_disabled' => 'disabled',
            'business' => $business
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
        $img_file_1_path = '';
        $img_file_1_name = '';
        $img_file_2_path = '';
        $img_file_2_name = '';
        if (!empty($request->file('img_file_1'))) {
            $img_file_1_path = $request->file('img_file_1')->store('business'); //이미지파일 저장
            $img_file_1_name = $request->file('img_file_1')->getClientOriginalName();
        }
        if (!empty($request->file('img_file_2'))) {
            $img_file_2_path = $request->file('img_file_2')->store('business'); //이미지파일 저장
            $img_file_2_name = $request->file('img_file_2')->getClientOriginalName();
        }
        $business = Business::find($id);
        $business->question_title = $request->question_title;
        $business->name = $request->name;
        $business->tel = $request->tel;
        $business->tel_view = $request->tel_view;
        $business->email = $request->email;
        $business->img_file_1_path = $img_file_1_path;
        $business->img_file_1_name = $img_file_1_name;
        $business->img_file_2_path = $img_file_2_path;
        $business->img_file_2_name = $img_file_2_name;
        $business->view = $request->view;
        $save = $business->save();

        return redirect("/admin/business/{$id}/edit")->with('success','저장에 성공했습니다.');
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
