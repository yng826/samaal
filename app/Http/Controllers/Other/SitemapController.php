<?php

namespace App\Http\Controllers\Other;

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
        $sitemaps = DB::table('sitemaps')->where('is_front', 1)->orderBy('order_id')->get();

        $treeSitemap = $this->buildTreeSitemap($sitemaps);

        $depth2Cnt = 0;
        foreach ($treeSitemap as $sitemap) {
            if($depth2Cnt < count($sitemap->children)) {
                $depth2Cnt = count($sitemap->children);
            }
        }

        return view('other.sitemap', [
            'sitemaps' => $treeSitemap,
            'depth2Cnt' => $depth2Cnt,
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
