<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categorys = DB::table('sitemap_categorys')->orderBy('id', 'desc')->paginate(10);
        return view('admin.category.list', [
            'categorys' => $categorys,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $action = '/kor/admin/category';
        return view('admin.category.create', [
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
        if($request->id > 0){
            $saved = DB::table('sitemap_categorys')
                    ->where('id', $request->id)
                    ->update([
                        'category'=> $request->category,
                        'order_id'=> $request->order_id,
                        'updated_at' => now(),
                    ]);
        }else{
            $saved = DB::table('sitemap_categorys')
            ->insert([
                'category'=> $request->category,
                'order_id'=> $request->order_id,
                'created_at' => now()
            ]);
        }

        return redirect('/admin/category');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
  /*  public function show($id)
    {
        $boards = DB::table('sitemap_categorys')->where('id', $id)->first();
        $action = "/kor/admin/sitemap_categorys";

        return view('admin.sitemap_categorys.'.$id, [
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
        $category = DB::table('sitemap_categorys')->where('id', $id)->first();

        $action = "/kor/admin/category/{$id}";

        return view('admin.category.create', [
            'category'=> $category,
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

        $affected = DB::table('sitemap_categorys')
        ->where('id', $id)
        ->update([
            'category'=> $request->category,
            'updated_at' => now(),
          ]);
        return redirect('/admin/category');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $affected = DB::table('sitemap_categorys')
        ->where('id', $id)
        ->delete();
        return redirect('/admin/category');
    }
}
