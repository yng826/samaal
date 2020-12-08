<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\DB;

class ViewServiceProvider extends ServiceProvider
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
        view()->composer('shared.header', function ($view) {
            $menus = DB::table('menus')->orderBy('order_id')->where('is_front', 1)->get();
            $treeMenu = $this->buildTreeMenu($menus);
            $view->treeMenu = $treeMenu;
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
