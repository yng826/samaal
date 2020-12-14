<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\DB;

class FooterServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        view()->composer('shared.footer', function ($view) {
            $sitemaps = DB::table('sitemaps')->where('is_front', 1)->orderBy('order_id')->get();
            $treeSitemap = $this->buildTreeSitemap($sitemaps);
            $view->treeSitemap = $treeSitemap;
        });
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
