<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MenuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $arr = [1,2,3,4];
        $arr2= [
            'a'=> 1,
            'b'=> 2
        ];
        $menus = DB::table('menus')->get();
        return view('admin.menu.list', [
            'menus' => $menus,
            'arr'   => $arr,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $action = '/admin/menu';
        return view('admin.menu.create', [
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
        $saved = DB::table('menus')->insert(
            [
                'name'=> $request->name,
                'url'=> $request->url,
                'menu_type'=> $request->menu_type,
                'depth'=> $request->depth,
                'parent_id'=> $request->parent_id,
                'is_front'=> $request->is_front,
                'created_at' => now()
            ]);
        return $saved;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        echo 'show:'. $id;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $menu = DB::table('menus')->where('id', $id)->first();
        $action = "/admin/menu/{$id}";

        return view('admin.menu.create', [
            'menu'=> $menu,
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
        $affected = DB::table('menus')
              ->where('id', $id)
              ->update([
                'name' => $request->name,
                'url' => $request->url,
                'menu_type' => $request->menu_type,
                'depth' => $request->depth,
                'parent_id' => $request->parent_id,
                'is_front' => $request->is_front,
                'updated_at' => now(),
                ]);
        return redirect('/admin/menu');
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
