<?php

use App\Http\Controllers\aboutUs\HeritageController;
use App\Http\Controllers\JobController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\MenuController as AdminMenuController;
use App\Http\Controllers\Admin\SitemapController as AdminSitemapController;
use App\Http\Controllers\Admin\NewsInfoController as NewsInfoController;
use App\Http\Controllers\Admin\IrBoardController as IrBoardController;
use App\Http\Controllers\Admin\IsoCertificationController as AdminIsoCertificationController;
use App\Http\Controllers\Admin\RecruitJobController as RecruitJobController;
use App\Http\Controllers\Recruit\RecruitListController as RecruitListController;
use App\Http\Controllers\Board\QuestionBoardController as QuestionBoardController;
use App\Http\Controllers\Admin\QuestionAdminController as QuestionAdminController;
use App\Http\Controllers\Admin\CategoryController as CategoryController;
use App\Http\Controllers\Admin\UserController as UserController;
use App\Http\Controllers\Admin\ManagerController as ManagerController;
use App\Http\Controllers\Faq\FaqController as FaqController;
use App\Http\Controllers\Other\SearchController as SearchController;
use App\Http\Controllers\Other\SitemapController as SitemapController;
use App\Http\Controllers\Iso\IsoCertificationController as IsoCertificationController;
use App\Http\Controllers\aboutUs\StoryNewsController as StoryNewsController;
use App\Http\Controllers\Business\FoilController;
use App\Http\Controllers\BusinessController;
use App\Http\Controllers\IR\FinanceController;
use Illuminate\Support\Facades\Mail;
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
    // return view('welcome');
    return view('main', [
        'bodyClass' => 'siteIntro',
    ]);
});

Route::get('intro', function () {
    return view('intro');
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

    Route::get('ir/{type}', [FinanceController::class, 'index']);
    Route::get('ir/board/{id}', [FinanceController::class, 'show'])
    ->where('id', '[0-9]+');
    Route::get('ir/board/file-download', [FinanceController::class, 'fileDownload']);
});

Route::prefix('business')->group(function() {
    Route::get('intro', function () {
        return view('business.intro', [
            'bodyClass' => 'business'
        ]);
    });
    Route::get('foil', function () {
        return view('business.foil.main');
    });
    Route::get('package', function () {
        return view('business.package.main');
    });
    Route::get('industry', function () {
        return view('business.industry.main');
    });
    // Route::get('{type}/{product}', [BusinessController::class, 'index']);
    Route::get('foil/capacitor', [BusinessController::class, 'index']);
    Route::get('foil/foil', [BusinessController::class, 'index']);
    Route::get('foil/fin', [BusinessController::class, 'index']);
    Route::get('foil/decoration', [BusinessController::class, 'index']);
    Route::get('foil/line', [BusinessController::class, 'index']);
    Route::get('foil/restrictions', [BusinessController::class, 'index']);
    Route::get('foil/electronic', [BusinessController::class, 'index']);
    Route::get('foil/car', [BusinessController::class, 'index']);
    Route::get('foil/external', [BusinessController::class, 'index']);
    Route::get('foil/tab', [BusinessController::class, 'index']);

    Route::get('package/retort', [BusinessController::class, 'index']);
    Route::get('package/watertight', [BusinessController::class, 'index']);
    Route::get('package/alu', [BusinessController::class, 'index']);
    Route::get('package/cigarette', [BusinessController::class, 'index']);
    Route::get('package/refill', [BusinessController::class, 'index']);

    Route::get('industry/insulation', [BusinessController::class, 'index']);
    Route::get('industry/sidemirror', [BusinessController::class, 'index']);
    Route::get('industry/steel', [BusinessController::class, 'index']);
    Route::get('industry/paste', [BusinessController::class, 'index']);
    // Route::get('foil/{type}', [FoilController::class, 'index']);
/*
    Route::get('foil/capacitor', function () {
        $data = [];
        $data['question_title'] = 'Capacitor용';
        return view('business.foil.capacitor', $data);
    });
    Route::get('foil/foil', function () {
        $data = [];
        $data['question_title'] = '연포장용';
        return view('business.foil.foil', $data);
    });
    Route::get('foil/fin', function () {
        $data = [];
        $data['question_title'] = '열교환기용 Fin재';
        return view('business.foil.fin', $data);
    });
    Route::get('foil/decoration', function () {
        $data = [];
        $data['question_title'] = 'Decoration용';
        return view('business.foil.decoration', $data);
    });
    Route::get('foil/line', function () {
        $data = [];
        $data['question_title'] = 'Hair Line';
        return view('business.foil.line', $data);
    });
    Route::get('foil/restrictions', function () {
        $data = [];
        $data['question_title'] = '제약포장재용';
        return view('business.foil.restrictions', $data);
    });
    Route::get('foil/electronic', function () {
        $data = [];
        $data['question_title'] = 'LIB 양극집전체용 - 전자기기용';
        return view('business.foil.electronic', $data);
    });
    Route::get('foil/car', function () {
        $data = [];
        $data['question_title'] = 'LIB 양극집전체용 - 자동차용';
        return view('business.foil.car', $data);
    });
    Route::get('foil/external', function () {
        $data = [];
        $data['question_title'] = 'LIB 외장재용';
        return view('business.foil.external', $data);
    });
    Route::get('foil/tab', function () {
        $data = [];
        $data['question_title'] = 'LIB Tab재';
        return view('business.foil.tab', $data);
    });
/**
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
*/
    Route::get('speciality/process/{type?}', function ($type = 'roll') {
        $data = [];
        $data['question_title'] = '공정과정';
        $data['type'] = $type;
        return view('business.speciality.process', $data);
    });
    Route::get('innovation/rnd', function () {
        $data = [];
        $data['question_title'] = '공정과정';
        return view('business.innovation.rnd', $data);
    });

    Route::get('innovation/iso_certification', [IsoCertificationController::class, 'index']);
    Route::get('innovation/iso_certification/file-download', [IsoCertificationController::class, 'fileDownload']);
});


Route::prefix('work-with-us')->group(function(){
    Route::get('recruit', [RecruitListController::class, 'index']);
    Route::get('recruit/{id}', [RecruitListController::class, 'show']);
    Route::get('recruit/{id}/create', [RecruitListController::class, 'join']);
    Route::get('recruit/{id}/edit', [RecruitListController::class, 'edit']);
    Route::get('job', [JobController::class, 'index'])
    ->name('work.job');
    Route::get('job/create', [JobController::class, 'create'])
    ->name('work.job');
    Route::get('job/{id}', [JobController::class, 'show'])
    ->where('id', '[0-9]+');

    Route::get('introduction/introjob', function () {
        return view('workWithUs.introduction.introjob');
    })->name('work-with-us.introduction.introjob');

    // 생산 production
    Route::get('introduction/interview-production', function () {
        return view('workWithUs.introduction.interviewProduction');
    });

    // 영업 Sales
    Route::get('introduction/interview-sales', function () {
        return view('workWithUs.introduction.interviewSales');
    });

    //품질보증 Warranty
    Route::get('introduction/interview-warranty', function () {
        return view('workWithUs.introduction.interviewwarranty');
    });

    // 경영지원 businessSupport
    Route::get('introduction/interview-businessSupport', function () {
        return view('workWithUs.introduction.interviewbusinessSupport');
    });

    // 생산지원 productionSupport
    Route::get('introduction/interview-productionSupport', function () {
        return view('workWithUs.introduction.interviewproductionSupport');
    });

    // R&D rnd
    Route::get('introduction/interview-rnd', function () {
        return view('workWithUs.introduction.interviewrnd');
    });

    // 설비 equipment
    Route::get('introduction/interview-equipment', function () {
        return view('workWithUs.introduction.interviewequipment');
    });

    // 환경안전 safety
    Route::get('introduction/interview-safety', function () {
        return view('workWithUs.introduction.interviewsafety');
    });

    // IT it
    Route::get('introduction/interview-it', function () {
        return view('workWithUs.introduction.interviewit');
    });

    Route::get('faq', [FaqController::class, 'index']);
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
    Route::get('sitemap', [SitemapController::class, 'index']);

    Route::get('privacy', function () {
        return view('other.privacy');
    });
    Route::get('email_security', function () {
        return view('other.email_security');
    });
});


Route::prefix('admin')->group(function () {
    Route::get('/', [App\Http\Controllers\HomeController::class, 'index']);
    Route::get('ir_board/file-download', [IrBoardController::class, 'fileDownload']);
    Route::get('news_info/file-download', [NewsInfoController::class, 'fileDownload']);

});

Route::prefix('admin')->middleware(['auth', 'roles:admin'])->group(function () {
    Route::post('menu/order-update', [AdminMenuController::class, 'orderUpdate']);
    Route::resource('menu', Admin\MenuController::class);
    Route::post('sitemap/order-update', [AdminSitemapController::class, 'orderUpdate']);
    Route::resource('sitemap', Admin\SitemapController::class);
    Route::resource('category', Admin\CategoryController::class);
    Route::resource('user', Admin\UserController::class);
    Route::resource('business', Admin\BusinessController::class);
});

Route::prefix('admin')->middleware(['auth', 'roles:admin,editor'])->group(function () {
    Route::resource('finance_info', Admin\FinanceInfoController::class);
});

Route::prefix('admin')->middleware('auth', 'roles:admin,editor')->group(function () {
    //Route::get('ir_board/file-download', [IrBoardController::class, 'fileDownload']);
    Route::resource('ir_board', Admin\IrBoardController::class);

    //Route::get('news_info/file-download', [NewsInfoController::class, 'fileDownload']);
    Route::resource('news_info', Admin\NewsInfoController::class);

    Route::get('iso_certification/file-download', [AdminIsoCertificationController::class, 'fileDownload']);
    Route::resource('iso_certification', Admin\IsoCertificationController::class);

    Route::resource('faq', Admin\FaqController::class);
    Route::resource('notice', Admin\NoticeController::class);

    Route::resource('question_admin', Admin\QuestionAdminController::class);
    Route::delete('question', [QuestionAdminController::class, 'destroy']);
    Route::get('question_admin/{id}', [QuestionAdminController::class, 'show'])
            ->where('id', '[0-9]+');
});

Route::prefix('admin')->middleware(['auth', 'roles:admin,recruit'])->group(function () {
    Route::resource('recruit', Admin\RecruitController::class);
    Route::get('recruit/{recruit_id}/job/{id}/file-download', [RecruitJobController::class, 'fileDownload']);
    Route::get('recruit/{recruit_id}/job/list-excel-download', [RecruitJobController::class, 'listExcelDownload']);
    Route::get('recruit/{recruit_id}/job/{ids}/detail-excel-download', [RecruitJobController::class, 'detailExcelDownload']);
    Route::get('recruit/{recruit_id}/job/{ids}/detail-sms', [RecruitJobController::class, 'smsShow']);
    Route::post('recruit/{recruit_id}/job/{ids}/detail-sms', [RecruitJobController::class, 'smsSend']);
    Route::delete('recruit/{recruit_id}/job', [RecruitJobController::class, 'deleteUserAll']);
    Route::delete('job', [RecruitJobController::class, 'deleteUser']);
    Route::resource('recruit.job', Admin\RecruitJobController::class);
});

Route::prefix('admin')->middleware(['auth'])->group(function () {
    Route::resource('mypage', Admin\MypageController::class);
});

/*
Route::get('send2', function () {
    $text = "Hello";
    // Create the Transport
    $transport = (new \Swift_SmtpTransport(env('MAIL_HOST'), 25))
    ->setUsername(env('MAIL_USERNAME'))
    ->setPassword(env('MAIL_PASSWORD'))
    ;

    // Create the Mailer using your created Transport RFCValidation
    $mailer = new \Swift_Mailer($transport);

    // Create a message
    $message = (new \Swift_Message('Happy to Have You Onboard'))
    ->setFrom(env('MAIL_FROM_ADDRESS'), env('MAIL_FROM_NAME'))
    ->setTo(['test001@sama-al.com'])
    ->setBody($text , 'text/html')
    ;
    $message->setReadReceiptTo(env('MAIL_FROM_ADDRESS'));



    // Send the message
    $result = $mailer->send($message);

    dd($result);
});

Route::get('send', function () {

    // dd(config('mail.mailers.smtp.encryption'));

    return Mail::send('welcome', [], function($message) {
        $message->from('test001@sama-al.com')
            ->to('test001@sama-al.com')
            ->subject('Testing mails');
    });
});

Route::get('sms', function () {
    // sms 보내기 추가
    $sID = env('NAVER_SERVICE_ID'); // 서비스 ID
    $smsURL = "https://sens.apigw.ntruss.com/sms/v2/services/".$sID."/messages";
    $smsUri = "/sms/v2/services/".$sID."/messages";
    $sKey = env('NAVER_SERVICE_SECRET');

    $accKeyId = env("NAVER_ACCESS");
    $accSecKey = env("NAVER_SECRET");

    $sTime = floor(microtime(true) * 1000);

    // The data to send to the API
    $postData = array(
        'type' => 'SMS',
        'countryCode' => '82',
        'from' => '0234580600', // 발신번호 (등록되어있어야함)
        'contentType' => 'COMM',
        'content' => "메세지 내용",
        'messages' => array(array('content' => "메세지 내용", 'to' => '01028016532'))
    );

    $postFields = json_encode($postData) ;

    $hashString = "POST {$smsUri}\n{$sTime}\n{$accKeyId}";
    $dHash = base64_encode( hash_hmac('sha256', $hashString, $accSecKey, true) );


    $header = array(
        'Content-Type: application/json; charset=utf-8',
        'x-ncp-apigw-timestamp: '.$sTime,
        "x-ncp-iam-access-key: ".$accKeyId,
        "x-ncp-apigw-signature-v2: ".$dHash
    );
    // return $smsURL;

    // Setup cURL
    try {
        $ch = curl_init($smsURL);
        curl_setopt_array($ch, array(
            CURLOPT_POST => TRUE,
            CURLOPT_RETURNTRANSFER => TRUE,
            CURLOPT_HTTPHEADER => $header,
            CURLOPT_POSTFIELDS => $postFields,

        ));

        $content = curl_exec($ch);
        curl_close($ch);

        if ($content === false) {
            throw new Exception(curl_error($ch), curl_errno($ch));
        }
    } catch(Exception $e) {

        trigger_error(sprintf(
            'Curl failed with error #%d: %s',
            $e->getCode(), $e->getMessage()),
            E_USER_ERROR);

    }
});


Route::get('sms2', function () {
    $sID = env('NAVER_SERVICE_ID'); // 서비스 ID
    $smsURL = "https://sens.apigw.ntruss.com/sms/v2/services/".$sID."/messages";
    $uri = "/sms/v2/services/".$sID."/messages";
    $accKeyId = env("NAVER_ACCESS");
    $accSecKey = env("NAVER_SECRET");
    list($microtime, $timestamp) = explode(' ',microtime());
    $time = $timestamp . substr($microtime, 2, 3);

    $message = "POST";
    $message .= " ";
    $message .= $uri;
    $message .= "\n";
    $message .= $time;
    $message .= "\n";
    $message .= $accKeyId;

    $signature = base64_encode(hash_hmac('sha256', $message, $accSecKey, true));

    $headers = array(
        "Content-Type: application/json;"
        , "x-ncp-iam-access-key: " . $accKeyId . ""
        , "x-ncp-apigw-timestamp: " . $time . ""
        , "x-ncp-apigw-signature-v2: " . $signature . ""
    );

    $postData = array(
        'type' => 'SMS',
        'countryCode' => '82',
        'from' => '0234580600', // 발신번호 (등록되어있어야함)
        'contentType' => 'COMM',
        'content' => "메세지 내용",
        'messages' => array(array('content' => "메세지 내용", 'to' => '01028016532'))
    );

    try {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $smsURL);
        curl_setopt($ch, CURLOPT_HEADER, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($postData));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        $content = curl_exec($ch);
        curl_close($ch);

        var_dump($content);
        if ($content === false) {
            echo 'error';
            throw new Exception(curl_error($ch), curl_errno($ch));
        }
    } catch(Exception $e) {

        trigger_error(sprintf(
            'Curl failed with error #%d: %s',
            $e->getCode(), $e->getMessage()),
            E_USER_ERROR);

    }
});
*/
