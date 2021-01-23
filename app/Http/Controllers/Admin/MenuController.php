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
        $menus = DB::table('menus')->orderBy('order_id')->get();

        $treeMenu = $this->buildTreeMenu($menus);

        return view('admin.menu.list', [
            'menus' => $treeMenu,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $action = '/kor/admin/menu';
        return view('admin.menu.create', [
            'parent_id' => $request->parent_id,
            'depth' => $request->depth,
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
        $saved = DB::table('menus')
                ->insert([
                    'order_id'=> 0,
                    'name'=> $request->name,
                    'url'=> $request->url,
                    'menu_type'=> $request->menu_type,
                    'depth'=> $request->depth,
                    'parent_id'=> $request->parent_id,
                    'is_front'=> $request->is_front,
                    'created_at' => now()
                ]);

        return redirect('/kor/admin/menu');
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

        return redirect('/kor/admin/menu');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function orderUpdate(Request $request)
    {
        $orders = json_decode($_POST['orders'], true);

        foreach ($orders as $order) {
            $affected = DB::table('menus')
                        ->where('id', $order['id'])
                        ->update([
                            'order_id' => $order['order_id'],
                            'depth' => $order['depth'],
                            'parent_id' => $order['parent_id'],
                            'updated_at' => now(),
                        ]);
        }
        return redirect('/kor/admin/menu');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $affected = DB::table('menus')->where('id', $id)->delete();

        return redirect('/kor/admin/menu');
    }

    /**
     * Build tree menu.
     *
     * @param  array  $menus
     * @return array $branch
     */
    public function buildTreeMenu($menus, $parentId = 0)
    {
        $branch = array();
        foreach ($menus as $menu) {
            if ($menu->parent_id == $parentId) {
                $children = $this->buildTreeMenu($menus, $menu->id);
                if (!empty($children)) {
                    $menu->children = $children;
                }
                $branch[] = $menu;
            }
        }
        return $branch;
    }
}
