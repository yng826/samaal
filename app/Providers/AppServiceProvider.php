<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Contracts\Events\Dispatcher;
use JeroenNoten\LaravelAdminLte\Events\BuildingMenu;
use Illuminate\Support\Facades\Auth;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot(Dispatcher $events)
    {
        $events->listen(BuildingMenu::class, function (BuildingMenu $event) {
            if (!empty(Auth::user()) && Auth::user()->role != 'user') {

                $event->menu->add([
                    'text' => '영문 Admin',
                    'url'  => env('ENG_URL').'/admin',
                    'icon' => 'fas fa-fw fa-user',
                ]);

                $event->menu->add('마이페이지');
                $event->menu->add([
                    'text' => '개인정보 수정',
                    'url'  => 'admin/mypage/'. Auth::user()->id. '/edit',
                    'icon' => 'fas fa-fw fa-user',
                ]);

                if (Auth::user()->role == 'admin') {
                    $event->menu->add('사용자');
                    $event->menu->add([
                        'text' => '사용자 관리',
                        'url'  => 'admin/user',
                        'icon' => 'fas fa-fw fa-users',
                    ]);
                    $event->menu->add([
                        'text' => '제품 관리',
                        'url'  => 'admin/business',
                        'icon' => 'fas fa-fw fa-industry',
                    ]);
                    $event->menu->add('메뉴');
                    $event->menu->add([
                        'text' => '메뉴 관리',
                        'url'  => 'admin/menu',
                        'icon' => 'fas fa-fw fa-bars',
                    ],
                    [
                        'text' => '사이트맵 관리',
                        'url'  => 'admin/sitemap',
                        'icon' => 'fas fa-fw fa-bars',
                    ],
                    [
                        'text' => '카테고리 관리',
                        'url'  => 'admin/category',
                        'icon' => 'fas fa-fw fa-bars',
                    ]);
                }

                if (Auth::user()->role == 'admin' || Auth::user()->role == 'editor') {
                    $event->menu->add('사이트');
                    $event->menu->add([
                        'text' => '팝업 관리',
                        'url'  => 'admin/notice',
                        'icon' => 'fas fa-fw fa-archive',
                    ]);
                }
                if (Auth::user()->role == 'admin' || Auth::user()->role == 'editor' || Auth::user()->role == 'recruit') {
                    $event->menu->add('회사정보');
                    $event->menu->add([
                        'text' => '재무정보 관리',
                        'url'  => 'admin/finance_info',
                        'icon' => 'fas fa-fw fa-dollar-sign',
                    ],
                    [
                        'text' => 'IR공고 관리',
                        'url'  => 'admin/ir_board',
                        'icon' => 'fas fa-fw fa-file-alt',
                    ],
                    [
                        'text' => 'ISO 인증서',
                        'url'  => 'admin/iso_certification',
                        'icon' => 'fas fa-fw fa-award',
                    ],
                    [
                        'text' => '뉴스 관리',
                        'url'  => 'admin/news_info',
                        'icon' => 'fas fa-fw fa-newspaper',
                    ]);
                }
                if (Auth::user()->role == 'admin' || Auth::user()->role == 'editor') {
                    $event->menu->add('문의');
                    $event->menu->add([
                        'text' => '문의 관리',
                        'url'  => 'admin/question_admin',
                        'icon' => 'fas fa-fw fa-comment-dots',
                    ],
                    [
                        'text' => 'FAQ 관리',
                        'url'  => 'admin/faq',
                        'icon' => 'fas fa-fw fa-comments',
                    ]);
                }

                if (Auth::user()->role == 'admin' || Auth::user()->role == 'recruit') {
                    $event->menu->add('채용');
                    $event->menu->add([
                        'text' => '채용공고',
                        'url'  => 'admin/recruit',
                        'icon' => 'fas fa-fw fa-file-invoice',
                    ],
                    [
                        'text' => '지원내역',
                        'url'  => 'admin/recruit/0/job',
                        'icon' => 'fas fa-fw fa-file-signature',
                    ]);
                }
            }
        });
    }
}
