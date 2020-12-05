<?php

namespace App\Http\Controllers\Other;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SearchController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $categorys = DB::table('menus')->where('is_search_category', true)->orderBy('order_id')->get();

        $newKeywords = [];
        $where = [];
        if(!empty($request->keyword)) {
            $where[] = ['menu_keywords.keyword', 'like', '%'. $request->keyword. '%'];

            if($request->category != 0) {
                $where[] = ['menu_keywords.menu_id', '=', $request->category];
            }

            $keywords = DB::table('menu_keywords')
                        ->leftJoin('menus', 'menu_keywords.menu_id', '=', 'menus.id')
                        ->where($where)
                        ->select('menus.*', 'menu_keywords.keyword')
                        ->orderBy('order_id')->get();

            $menus = DB::table('menus')->orderBy('order_id')->get();

            foreach ($keywords as $keyword) {
                $names = $this->names($menus, $keyword->parent_id). $keyword->name;

                $keyword->names = $names;
                $newKeywords[] = $keyword;
            }
        }

        return view('other.search', [
            'keyword' => $request->keyword,
            'categorys' => $categorys,
            'keywords' => $newKeywords,
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

    /**
     * Get names.
     *
     * @param  array  $menus
     * @return array $parent_id
     */
    public function names($menus, $parent_id)
    {
        $names = '';
        foreach ($menus as $menu) {
            if ($menu->id == $parent_id) {
                $names = $menu->name. ' > '. $names;
                $names = $this->names($menus, $menu->parent_id). $names;
            }
        }
        return $names;
    }
}
