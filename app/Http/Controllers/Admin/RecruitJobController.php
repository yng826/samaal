<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Work\Job;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use PhpOffice\PhpSpreadsheet\Reader\Xlsx as ReaderXlsx;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Style\Alignment;
use PhpOffice\PhpSpreadsheet\Style\Border;
use PhpOffice\PhpSpreadsheet\Style\Fill;
use PhpOffice\PhpSpreadsheet\Worksheet\Drawing;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class RecruitJobController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param  int  $recruit_id
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, $recruit_id)
    {
        $recruits = DB::table('recruits')->orderBy('id', 'desc')->get();

        if (empty($recruit_id) || $recruit_id == 0) {
            $recruit_id = $recruits[0]->id;
        }

        if (empty($request->status)) {
            $where = ['recruit_id' => $recruit_id];
        } else {
            $where = ['recruit_id' => $recruit_id, 'status' => $request->status];
        }

        $jobs = Job::where($where)->with(['user'])->orderBy('id', 'desc')->paginate(10);

        return view('admin.recruit.job.list', [
            'recruit_id' => $recruit_id,
            'status' => $request->status,
            'recruits' => $recruits,
            'jobs' => $jobs,
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
     * @param  int  $recruit_id
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($recruit_id, $id)
    {
        $job = Job::where('id', $id)
                ->with(['recruit', 'user', 'userInfo', 'educations', 'careers', 'military', 'awards', 'certificates', 'languages', 'oas', 'overseasStudys', 'schoolActivities', 'hobbySpecialty'])
                ->first();

        return view('admin.recruit.job.detail', [
            'job' => $job,
        ]);
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
     * @param  int  $recruit_id
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $recruit_id, $id)
    {
        $affected = DB::table('job_applications')
                    ->where('id', $id)
                    ->update([
                        'status'=> $request->status
                    ]);

        return redirect("/admin/recruit/{$recruit_id}/job/{$id}");
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
     * Upload file download.
     *
     * @param  int  $recruit_id
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function fileDownload($recruit_id, $id)
    {
        $job = Job::where('id', $id)->first();

        $file = Storage::get($job->file_path);
        $ext = pathinfo(storage_path(). $job->file_path, PATHINFO_EXTENSION);

        return response($file, 200, ['Content-Disposition' => "attachment; filename=profile.". $ext]);
    }

    /**
     * List excel file download.
     *
     * @param  int  $recruit_id
     * @return \Illuminate\Http\Response
     */
    public function listExcelDownload($recruit_id)
    {
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        $thArray = [
            'font' => [
                'bold' => true,
            ],
            'alignment' => [
                'horizontal' => Alignment::HORIZONTAL_CENTER,
            ],
            'borders' => [
                'allBorders' => [
                    'borderStyle' => Border::BORDER_THIN,
                ],
            ],
            'fill' => [
                'fillType' => Fill::FILL_GRADIENT_LINEAR,
                'startColor' => [
                    'argb' => 'FFEEEEEF',
                ],
                'endColor' => [
                    'argb' => 'FFEEEEEF',
                ],
            ],
        ];

        $tdArray = [
            'borders' => [
                'allBorders' => [
                    'borderStyle' => Border::BORDER_THIN,
                ],
            ],
            'alignment' => [
                'horizontal' => Alignment::HORIZONTAL_CENTER,
            ],
        ];

        $rowNum = 2;

        $sheet->setCellValue('B'. $rowNum, '입사지원 데이터');
        $sheet->getStyle('B'. $rowNum)->getFont()->setSize(15)->setBold(true);

        $rowNum += 2;

        $sheet->setCellValue('B'. $rowNum, '성명');
        $sheet->setCellValue('C'. $rowNum, '출생년도');
        $sheet->setCellValue('D'. $rowNum, 'E-MAIL');
        $sheet->setCellValue('E'. $rowNum, '핸드폰번호');
        $sheet->setCellValue('F'. $rowNum, '학교명');
        $sheet->setCellValue('G'. $rowNum, '전공');
        $sheet->setCellValue('H'. $rowNum, '성적 (평균학점)');
        $sheet->getStyle('B'. $rowNum. ':H'. $rowNum)->applyFromArray($thArray);


        $jobs = Job::where('recruit_id', $recruit_id)
                    ->where('status', '!=', 'saved')
                    ->with(['user', 'userInfo', 'educations'])
                    ->orderBy('id', 'desc')
                    ->get();


        foreach($jobs as $job) {
            $rowNum++;
            $sheet->setCellValue('B'. $rowNum, empty($job->user) ? '' : $job->user->name);
            $sheet->setCellValue('C'. $rowNum, empty($job->userInfo) ? '' : substr($job->userInfo->birth_day, 0, 4));
            $sheet->setCellValue('D'. $rowNum, empty($job->user) ? '' : $job->user->email);
            $sheet->setCellValue('E'. $rowNum, $job->phone_decrypt ?? '');

            if(!empty($job->educations)) {
                $education = collect($job->educations)->sortByDesc('edu_end')->first();
                $sheet->setCellValue('F'. $rowNum, $education->school_name ?? ''); //학교명
                $sheet->setCellValue('G'. $rowNum, $education->edu_major ?? ''); //전공
                $sheet->setCellValue('H'. $rowNum, ($education->edu_grade ?? ''). ' / '. ($education->edu_grade_full ?? '')); //성적
            }

            $sheet->getStyle('B'. $rowNum. ':H'. $rowNum)->applyFromArray($tdArray);
        }

        foreach(range('B', 'H') as $columnID) {
            if($columnID == 'D') {
                $sheet->getColumnDimension($columnID)->setWidth(30);
            } else {
                $sheet->getColumnDimension($columnID)->setWidth(20);
            }
        }


        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename="채용지원리스트.xlsx"');
        header('Cache-Control: max-age=0');

        $writer = new Xlsx($spreadsheet);

        $writer->save('php://output'); //download file
    }

    /**
     * Detail excel file download.
     *
     * @param  int  $recruit_id
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function detailExcelDownload($recruit_id, $id)
    {
        $job = Job::where('id', $id)
                ->with(['recruit', 'user', 'userInfo', 'educations', 'careers', 'military', 'awards', 'certificates', 'languages', 'oas', 'overseasStudys', 'schoolActivities', 'hobbySpecialty'])
                ->first();


        $inputFileName = 'storage/recruitJobTemplate/recruit_job_template.xlsx';
        $reader = new ReaderXlsx();
        $spreadsheet = $reader->load($inputFileName);

        $sheet = $spreadsheet->getActiveSheet();

        $rowNum = 2; //사진 row num
        if(Storage::exists($job->file_path)) { //사진
            $drawing = new Drawing();
            $drawing->setWorksheet($sheet);
            $drawing->setPath('storage/'. $job->file_path); //put your path and image here
            $drawing->setCoordinates('H'. $rowNum);
            $drawing->setWidth(264);
            $drawing->setOffsetX(5);
            $drawing->setOffsetY(5);
        }

        $rowNum = 21; //인적사항 row num
        $sheet->setCellValue('C'. $rowNum, empty($job->user) ? '' : $job->user->name); //이름
        $sheet->setCellValue('E'. $rowNum, empty($job->userInfo) ? '' : $job->userInfo->name_en); //영문
        $sheet->setCellValue('H'. $rowNum++, empty($job->recruit) ? '' : $job->recruit->title); //응시부문
        $sheet->setCellValue('B'. $rowNum, $job->phone_decrypt); //연락처
        $sheet->setCellValue('E'. $rowNum, empty($job->user) ? '' : $job->user->email); //이메일
        $sheet->setCellValue('H'. $rowNum++, empty($job->userInfo) ? '' : $job->userInfo->birth_day); //생년월일
        $sheet->setCellValue('B'. $rowNum, $job->address_1. ' '. $job->address_2); //주소

        $rowNum = 28; //학력사항 row num
        $educations = collect($job->educations)->sortByDesc('edu_end')->take(5)->all();
        foreach($educations as $education) {
            $sheet->setCellValue('B'. $rowNum, $education->school_name); //학교명
            $sheet->setCellValue('D'. $rowNum, $education->edu_major); //전공
            $sheet->setCellValue('E'. $rowNum, $education->edu_start. ' ~ '. $education->edu_end); //재학기간
            $sheet->setCellValue('F'. $rowNum, $education->edu_grade. ' / '. $education->edu_grade_full); //성적
            $sheet->setCellValue('G'. $rowNum++, $education->graduation); //졸업구분
        }

        $rowNum = 35; //교내활동 row num
        $schoolActivities = collect($job->schoolActivities)->sortByDesc('school_activities_end')->take(6)->all();
        foreach($schoolActivities as $schoolActivitie) {
            $sheet->setCellValue('B'. $rowNum, $schoolActivitie->school_activities_start. ' ~ '. $schoolActivitie->school_activities_end); //활동기간
            $sheet->setCellValue('C'. $rowNum, $schoolActivitie->school_activities_affiliation); //소속
            $sheet->setCellValue('D'. $rowNum, $schoolActivitie->school_activities_role); //담당역할
            $sheet->setCellValue('E'. $rowNum++, $schoolActivitie->school_activities_contents); //활동내역
        }

        $rowNum = 35; //취미 row num
        $sheet->setCellValue('H'. $rowNum, empty($job->hobbySpecialty) ? '' : $job->hobbySpecialty->hobby); //취미

        $rowNum = 38; //특기 row num
        $sheet->setCellValue('H'. $rowNum, empty($job->hobbySpecialty) ? '' : $job->hobbySpecialty->specialty); //특기

        $rowNum = 43; //경력사항 row num
        $careers = collect($job->careers)->sortByDesc('career_end')->take(10)->all();
        foreach($careers as $career) {
            $sheet->setCellValue('B'. $rowNum, $career->career_start. ' ~ '. $career->career_end); //근무기간
            $sheet->setCellValue('D'. $rowNum, $career->career_name); //회사명
            $sheet->setCellValue('E'. $rowNum, $career->career_position); //직위
            $sheet->setCellValue('G'. $rowNum++, $career->career_role); //담당업무
        }

        $rowNum = 62; //병역사항 row num
        $sheet->setCellValue('C'. $rowNum, empty($job->military) ? '' : $job->military->military_type); //구분/군별
        $sheet->setCellValue('E'. $rowNum, empty($job->military) ? '' : $job->military->military_rank); //계급
        $sheet->setCellValue('G'. $rowNum++, empty($job->military) ? '' : $job->military->military_duration_start. ' ~ '. $job->military->military_duration_end); //복무기간
        $sheet->setCellValue('C'. $rowNum, empty($job->military) ? '' : $job->military->military_discharge); //제대구분
        $sheet->setCellValue('E'. $rowNum, empty($job->military) ? '' : $job->military->military_exemption); //면제사유

        $rowNum = 66; //PC사용능력 row num
        $oas = collect($job->oas)->take(7)->all();
        foreach($oas as $oa) {
            $sheet->setCellValue('B'. $rowNum, $oa->oa_name); //사용 가능 OA
            $sheet->setCellValue('G'. $rowNum++, $oa->oa_level); //수준
        }

        $rowNum = 75; //외국어 row num
        $languages = collect($job->languages)->sortByDesc('language_end')->take(7)->all();
        foreach($languages as $language) {
            $sheet->setCellValue('B'. $rowNum, $language->language_type); //구분
            $sheet->setCellValue('C'. $rowNum, $language->language_grade); //TEST명
            $sheet->setCellValue('E'. $rowNum, $language->language_name); //점수/등급
            $sheet->setCellValue('F'. $rowNum, $language->language_start. ' ~ '. $language->language_end); //재학기간
            $sheet->setCellValue('H'. $rowNum++, $language->language_level); //회화수준
        }

        $rowNum = 84; //수상경력 row num
        $awards = collect($job->awards)->sortByDesc('award_date')->take(7)->all();
        foreach($awards as $award) {
            $sheet->setCellValue('B'. $rowNum, $award->award_date); //수상일
            $sheet->setCellValue('C'. $rowNum, $award->award_group_name); //단체명
            $sheet->setCellValue('D'. $rowNum++, $award->award_name); //시상명
        }

        $rowNum = 84; //자격면허 row num
        $certificates = collect($job->certificates)->sortByDesc('certificate_date')->take(7)->all();
        foreach($certificates as $certificate) {
            $sheet->setCellValue('F'. $rowNum, $certificate->certificate_date); //취득일
            $sheet->setCellValue('G'. $rowNum, $certificate->certificate_name); //자격증명
            $sheet->setCellValue('H'. $rowNum++, $certificate->certificate_issuer); //발행처
        }

        $rowNum = 93; //해외연수 row num
        $overseasStudys = collect($job->overseasStudys)->sortByDesc('overseas_study_end')->take(5)->all();
        foreach($overseasStudys as $overseasStudy) {
            $sheet->setCellValue('B'. $rowNum, $overseasStudy->country_name); //국가/도시
            $sheet->setCellValue('C'. $rowNum, $overseasStudy->school_name); //학교/단체
            $sheet->setCellValue('D'. $rowNum, $overseasStudy->overseas_study_start. ' ~ '. $overseasStudy->overseas_study_end); //기간
            $sheet->setCellValue('E'. $rowNum, $overseasStudy->overseas_study_name); //연수명
            $sheet->setCellValue('F'. $rowNum, $overseasStudy->overseas_study_purpose); //연수목적
            $sheet->setCellValue('G'. $rowNum++, $overseasStudy->overseas_study_contents); //연수내용
        }

        $rowNum = 107; //자기소개서1/2 row num
        $sheet->setCellValue('A'. $rowNum, $job->cover_letter);
        $sheet->getStyle('A'. $rowNum)->getAlignment()->setWrapText(true);

        // $cover_letter = $sheet->getCell('A'. $rowNum);
        // $rowNum = 188; //자기소개서2/2 row num
        // $sheet->setCellValue('A'. $rowNum, count(preg_split('/\r\n|\n|\r/', $cover_letter)));


        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename="채용지원상세_'. $job->user->name. '.xlsx"');
        header('Cache-Control: max-age=0');

        $writer = new Xlsx($spreadsheet);

        $writer->save('php://output'); //download file
    }
}
