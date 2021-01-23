<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SitemapController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sitemaps = DB::table('sitemaps')->orderBy('order_id')->get();

        $treeSitemap = $this->buildTreeSitemap($sitemaps);

        return view('admin.sitemap.list', [
            'sitemaps' => $treeSitemap,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $categorys = DB::table('sitemap_categorys')->get();

        $action = '/eng/admin/sitemap';
        return view('admin.sitemap.create', [
            'categorys' => $categorys,
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
        $saved = DB::table('sitemaps')
                ->insert([
                    'order_id'=> 0,
                    'category_id'=> $request->category_id,
                    'name'=> $request->name,
                    'url'=> $request->url,
                    'sitemap_type'=> $request->sitemap_type,
                    'depth'=> $request->depth,
                    'parent_id'=> $request->parent_id,
                    'is_front'=> $request->is_front,
                    'is_right'=> $request->is_right,
                    'created_at' => now()
                ]);

        return redirect('/admin/sitemap');
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
        $categorys = DB::table('sitemap_categorys')->get();

        $sitemap = DB::table('sitemaps')->where('id', $id)->first();
        $sitemap_keywords = DB::table('sitemap_keywords')->where('sitemap_id', $id)->get();
        $action = "/eng/admin/sitemap/{$id}";

        return view('admin.sitemap.create', [
            'categorys'=> $categorys,
            'sitemap'=> $sitemap,
            'sitemap_keywords'=> $sitemap_keywords,
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
        $affected = DB::table('sitemaps')
                    ->where('id', $id)
                    ->update([
                        'category_id'=> $request->category_id,
                        'name' => $request->name,
                        'url' => $request->url,
                        'sitemap_type' => $request->sitemap_type,
                        'depth' => $request->depth,
                        'parent_id' => $request->parent_id,
                        'is_front' => $request->is_front,
                        'is_right'=> $request->is_right,
                        'updated_at' => now(),
                    ]);

        $affected = DB::table('sitemap_keywords')->where('sitemap_id', $id)->delete();
        if(!empty($request->keyword)){
            foreach ($request->keyword as $keyword) {
                if ($keyword != '') {
                    $affected = DB::table('sitemap_keywords')
                                ->insert([
                                    'sitemap_id' => $id,
                                    'keyword' => $keyword,
                                    'created_at' => now()
                                ]);
                }
            }
        }

        return redirect('/admin/sitemap');
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
            $affected = DB::table('sitemaps')
                        ->where('id', $order['id'])
                        ->update([
                            'order_id' => $order['order_id'],
                            'depth' => $order['depth'],
                            'parent_id' => $order['parent_id'],
                            'updated_at' => now(),
                        ]);
        }
        return redirect('/admin/sitemap');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $affected = DB::table('sitemaps')->where('id', $id)->delete();
        $affected = DB::table('sitemap_keywords')->where('sitemap_id', $id)->delete();

        return redirect('/admin/sitemap');
    }

    /**
     * Build tree sitemap.
     *
     * @param  array  $sitemaps
     * @return array $branch
     */
    public function buildTreeSitemap($sitemaps, $parentId = 0)
    {
        $branch = array();
        foreach ($sitemaps as $sitemap) {
            if ($sitemap->parent_id == $parentId) {
                $children = $this->buildTreeSitemap($sitemaps, $sitemap->id);
                if (!empty($children)) {
                    $sitemap->children = $children;
                }
                $branch[] = $sitemap;
            }
        }
        return $branch;
    }
}
