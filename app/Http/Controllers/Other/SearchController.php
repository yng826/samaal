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
        $categorys = DB::table('sitemaps')->where('is_search_category', true)->orderBy('order_id')->get();

        $newKeywords = [];
        if(!empty($request->keyword)) {
            $sitemaps = DB::table('sitemaps')->orderBy('order_id')->get();

            $ids = [];
            if($request->category > 0) {
                $ids = explode(',', $this->ids($sitemaps, $request->category). $request->category);
            }

            $keywords = DB::table('sitemap_keywords')
                        ->join('sitemaps', 'sitemap_keywords.sitemap_id', '=', 'sitemaps.id')
                        ->where('sitemap_keywords.keyword', 'LIKE', '%'. $request->keyword. '%')
                        ->when(!empty($ids), function ($query) use ($ids) {
                            return $query->whereIn('sitemap_keywords.sitemap_id', $ids);
                        })
                        ->when(empty($ids), function ($query) {
                            return $query->whereRaw('LENGTH(sitemaps.url) > 2');
                        })
                        ->select('sitemaps.*', 'sitemap_keywords.keyword')
                        ->orderBy('order_id')->get();

            foreach ($keywords as $keyword) {
                $names = $this->names($sitemaps, $keyword->parent_id). $keyword->name;

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
     * Get parent names.
     *
     * @param  array  $sitemaps
     * @return array $parent_id
     */
    public function names($sitemaps, $parent_id)
    {
        $names = '';
        foreach ($sitemaps as $sitemap) {
            if ($sitemap->id == $parent_id) {
                $names = $sitemap->name. ' > '. $names;
                $names = $this->names($sitemaps, $sitemap->parent_id). $names;
            }
        }
        return $names;
    }

    /**
     * Get children ids.
     *
     * @param  array  $sitemaps
     * @return array $parent_id
     */
    public function ids($sitemaps, $id)
    {
        $ids = '';
        foreach ($sitemaps as $sitemap) {
            if ($sitemap->parent_id == $id) {
                if (strlen($sitemap->url) > 2) {
                    $ids = $sitemap->id. ','. $ids;
                }
                $ids = $this->ids($sitemaps, $sitemap->id). $ids;
            }
        }
        return $ids;
    }
}
