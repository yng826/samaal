<?php

use App\Http\Controllers\aboutUs\HeritageController;
use App\Http\Controllers\JobController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\MenuController as AdminMenuController;
use App\Http\Controllers\Admin\NewsInfoController as NewsInfoController;
use App\Http\Controllers\Admin\IrBoardController as IrBoardController;
use App\Http\Controllers\Admin\IsoCertificationController as AdminIsoCertificationController;
use App\Http\Controllers\Admin\RecruitJobController as RecruitJobController;
use App\Http\Controllers\Recruit\RecruitListController as RecruitListController;
use App\Http\Controllers\Board\QuestionBoardController as QuestionBoardController;
use App\Http\Controllers\Admin\QuestionAdminController as QuestionAdminController;
use App\Http\Controllers\Faq\FaqController as FaqController;
use App\Http\Controllers\Other\SearchController as SearchController;
use App\Http\Controllers\Iso\IsoCertificationController as IsoCertificationController;

use App\Http\Controllers\aboutUs\StoryNewsController as StoryNewsController;
use App\Http\Controllers\IR\FinanceController;
use Illuminate\Support\Facades\Session;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('sample', function () {
    return view('sample');
});

Route::prefix('about-us')->group(function() {
    // /about-us/heriatage
    Route::get('location/poseung', function () {
        return view('aboutUs.locationPoseung');
    })->name('about-us.location.poseung');
    Route::get('location/seoul', function () {
        return view('aboutUs.locationSeoul');
    })->name('about-us.location.seoul');
    Route::get('location/busan', function () {
        return view('aboutUs.locationBusan');
    })->name('about-us.location.busan');
    Route::get('location/heritage', function () {
        return view('aboutUs.locationHeritage');
    })->name('about-us.location.heritage');
    Route::get('ceo', function () {
        return view('aboutUs.ceo');
    })->name('about-us.ceo');
    Route::get('ci', function () {
        return view('aboutUs.aboutCi');
    })->name('about-us.ci');
    Route::get('heritage', function () {
        return view('aboutUs.heritage');
    })->name('about-us.heritage');

    Route::get('story-news', [StoryNewsController::class, 'index'])->name('story-news');
    Route::get('story-news/{id}', [StoryNewsController::class, 'show']);

    Route::get('ir/{type}', [FinanceController::class, 'show']);
    Route::get('ir_board/financial/{id}', [FinanceController::class, 'ir_board_info']);
});

Route::prefix('business')->group(function() {
    Route::get('intro', function () {
        return view('business.intro');
    });
    Route::get('foil', function () {
        return view('business.foil.main');
    });
    Route::get('foil/capacitor', function () {
        $data = [];
        $data['question_title'] = 'Capacitor용 Foil';
        return view('business.foil.capacitor', $data);
    });
    Route::get('foil/foil', function () {
        $data = [];
        $data['question_title'] = '연포장용 Foil';
        return view('business.foil.foil', $data);
    });
    Route::get('foil/fin', function () {
        $data = [];
        $data['question_title'] = '열교환기용 Fin재';
        return view('business.foil.fin', $data);
    });
    Route::get('foil/decoration', function () {
        $data = [];
        $data['question_title'] = 'Decoration용 Foil';
        return view('business.foil.decoration', $data);
    });
    Route::get('foil/line', function () {
        $data = [];
        $data['question_title'] = 'Hair Line Foil';
        return view('business.foil.line', $data);
    });
    Route::get('foil/restrictions', function () {
        $data = [];
        $data['question_title'] = '제약용 Foil';
        return view('business.foil.restrictions', $data);
    });
    Route::get('foil/electronic', function () {
        $data = [];
        $data['question_title'] = 'LIB 양극집전체용 > Foil -전자기기용';
        return view('business.foil.electronic', $data);
    });
    Route::get('foil/car', function () {
        $data = [];
        $data['question_title'] = 'LIB 양극집전체용 > Foil -자동차용';
        return view('business.foil.car', $data);
    });
    Route::get('foil/external', function () {
        $data = [];
        $data['question_title'] = 'LIB 외장재';
        return view('business.foil.external', $data);
    });
    Route::get('foil/tab', function () {
        $data = [];
        $data['question_title'] = 'LIB Tab재';
        return view('business.foil.tab', $data);
    });
    Route::get('package/retort', function () {
        $data = [];
        $data['question_title'] = '레토르트 포장재';
        return view('business.package.retort', $data);
    });
    Route::get('package/watertight', function () {
        $data = [];
        $data['question_title'] = '초발수 리드';
        return view('business.package.watertight', $data);
    });
    Route::get('package/alu', function () {
        $data = [];
        $data['question_title'] = 'ALU-ALU Cold Forming Foil';
        return view('business.package.alu', $data);
    });
    Route::get('package/cigarette', function () {
        $data = [];
        $data['question_title'] = '담배포장지';
        return view('business.package.cigarette', $data);
    });
    Route::get('package/refill', function () {
        $data = [];
        $data['question_title'] = '리필파우치';
        return view('business.package.refill', $data);
    });
    Route::get('industry/insulation', function () {
        $data = [];
        $data['question_title'] = '진공단열재용 필름';
        return view('business.industry.insulation', $data);
    });
    Route::get('industry/sidemirror', function () {
        $data = [];
        $data['question_title'] = '자동차용 사이드 미러 열선용 소재';
        return view('business.industry.sidemirror', $data);
    });
    Route::get('industry/steel', function () {
        $data = [];
        $data['question_title'] = 'Steel/Aluminium Laminated Tape';
        return view('business.industry.steel', $data);
    });
    Route::get('industry/paste', function () {
        $data = [];
        $data['question_title'] = '알루미늄 페이스트';
        return view('business.industry.paste', $data);
    });
    Route::get('speciality/process', function () {
        $data = [];
        $data['question_title'] = '공정과정';
        return view('business.speciality.process', $data);
    });

    Route::get('speciality/iso_certification', [IsoCertificationController::class, 'index']);
    Route::get('speciality/iso_certification/file-download', [IsoCertificationController::class, 'fileDownload']);
});


Route::prefix('work-with-us')->group(function(){
    Route::get('recruit', [RecruitListController::class, 'index']);
    Route::get('recruit/{id}', [RecruitListController::class, 'show']);
    Route::get('recruit/{id}/create', [RecruitListController::class, 'join']);
    Route::get('job', [JobController::class, 'index'])
    ->name('work.job');
    Route::get('job/create', [JobController::class, 'create'])
    ->name('work.job');
    Route::get('job/{id}', [JobController::class, 'show'])
    ->where('id', '[0-9]+');
});
Route::prefix('work-with-us')->middleware(['auth','roles:user'])->group(function(){
    // Route::resource('recruit', RecruitController::class);
    // Route::post('job', [JobController::class, 'store']);
    // Route::post('job/{id}', [JobController::class, 'store'])
    //     ->where('id', '[0-9]+');
    // Route::post('job/check', [JobController::class, 'check']);

    // Route::resource('edu', Job\EducationController::class);
});

Route::prefix('board')->group(function () {
    Route::resource('question_board', Board\QuestionBoardController::class);
});

Route::prefix('work-with-us')->group(function () {

    // Route::get('recruit/search/{id}', [RecruitListController::class, 'search']);
    // Route::resource('recruit', [RecruitListController::class, 'index']);
    // Route::resource('recruit/{id}', [RecruitListController::class, 'show']);
});

Route::prefix('other')->group(function () {
    Route::get('search', [SearchController::class, 'index']);
});

Route::prefix('faq')->group(function () {
    Route::get('faq', [FaqController::class, 'index']);
});


Route::prefix('admin')->group(function () {
    Route::get('ir_board/file-download', [IrBoardController::class, 'fileDownload']);
    Route::get('news_info/file-download', [NewsInfoController::class, 'fileDownload']);

});
Route::get('role', function () {
    return 'auth';
})->middleware(['roles:admin']);

Route::prefix('admin')->middleware(['auth', 'roles:admin'])->group(function () {
    Route::post('menu/order-update', [AdminMenuController::class, 'orderUpdate']);
    Route::resource('menu', Admin\MenuController::class);
    Route::get('library', function () {
        return view('admin.test.library');
    });
});

Route::prefix('admin')->middleware(['auth', 'roles:admin'])->group(function () {
    Route::resource('finance_info', Admin\FinanceInfoController::class);
});

Route::prefix('admin')->middleware('auth')->group(function () {
    //Route::get('ir_board/file-download', [IrBoardController::class, 'fileDownload']);
    Route::resource('ir_board', Admin\IrBoardController::class);

    //Route::get('news_info/file-download', [NewsInfoController::class, 'fileDownload']);
    Route::resource('news_info', Admin\NewsInfoController::class);

    Route::get('iso_certification/file-download', [AdminIsoCertificationController::class, 'fileDownload']);
    Route::resource('iso_certification', Admin\IsoCertificationController::class);

    Route::resource('recruit', Admin\RecruitController::class);
    Route::get('recruit/{recruit_id}/job/{id}/file-download', [RecruitJobController::class, 'fileDownload']);
    Route::resource('recruit.job', Admin\RecruitJobController::class);

    Route::resource('faq', Admin\FaqController::class);

    Route::resource('question_admin', Admin\QuestionAdminController::class);
    Route::get('question_admin/{id}', [QuestionAdminController::class, 'show'])
    ->where('id', '[0-9]+');
});

Auth::routes();

Route::get('/confirm-password', function () {
    return view('auth.passwords.confirm');
})->middleware(['auth'])->name('auth.passwords.confirm');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('passport', function() {
    return view('test.passport');
})->middleware('auth');

Route::get('/test', function() {
    return view('test.vue');
});

Route::get('session', function () {
    return Session::get('access_token');
});
