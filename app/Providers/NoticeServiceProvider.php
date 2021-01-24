<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\DB;

class NoticeServiceProvider extends ServiceProvider
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
        view()->composer('shared.notice', function ($view) {
            $notices = DB::table('notices')
                    ->where('is_use', 1)
                    ->orderBy('order', 'ASC')
                    ->orderBy('updated_at', 'DESC')
                    ->get();
            $view->notices = $notices;
        });
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
