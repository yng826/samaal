<?php

namespace App\Http\Controllers\Admin;

use App\Custom\SmtpEmail;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Work\Job;
use App\Models\Work\Recruit;
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
use ZipArchive;

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
        $recruits = Recruit::orderBy('id', 'desc')->get();
        if ( $recruit_id ) {
            $recruit = Recruit::find($recruit_id);
        } else {
            $recruit = Recruit::orderBy('id', 'desc')->first();
            $recruit_id = $recruit->id;
        }

        $whereStatus = [];
        if (!empty($request->status)) {
            $whereStatus = $request->status;
        }
        // dd($where);

        $pass = $request->pass;
        $search_type = $request->search_type;
        $search_text = $request->search_text;
        $jobs = Job::where('recruit_id', '=', $recruit_id)
            ->when($whereStatus, function($query, $whereStatus) {
                return $query->where('status', '=', $whereStatus);
            })
            ->when($pass, function( $query, $pass) {
                return $query->where('pass', $pass);
            })
            ->when($search_type, function( $query, $search_type) use ($search_text) {
                if ( $search_type == 'name') {
                    $user = User::where('name','like', '%'.$search_text.'%')->get();
                } else {
                    $user = User::where('email', 'like', '%'.$search_text.'%')->get();
                }
                return $query->whereIn('user_id', $user->pluck('id'));
            })
            ->with(['user'])
            ->orderBy('updated_at', 'asc')
            ->orderBy('created_at', 'asc')
            ->orderBy('id', 'desc')
            ->paginate(30);

        return view('admin.recruit.job.list', [
            'recruit_id' => $recruit_id,
            'status' => $request->status,
            'pass' => $request->pass,
            'search_type' => $search_type,
            'search_text' => $search_text,
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
                ->with(['recruit', 'user', 'userInfo', 'highschool', 'educations', 'careers', 'military', 'awards', 'certificates', 'languages', 'oas', 'overseasStudys', 'schoolActivities', 'hobbySpecialty'])
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
                        'pass' => $request->pass,
                        'status' => $request->status,
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
                    ->orderBy('updated_at', 'asc')
                    ->orderBy('created_at', 'asc')
                    ->get();

        foreach($jobs as $job) {
            $rowNum++;
            $sheet->setCellValue('B'. $rowNum, empty($job->user) ? '' : $job->user->name);
            $sheet->setCellValue('C'. $rowNum, empty($job->userInfo) ? '' : substr($job->userInfo->birth_day, 0, 4));
            $sheet->setCellValue('D'. $rowNum, empty($job->user) ? '' : $job->user->email);
            $phone = $job->phone_decrypt;
            if ( strlen($phone) == 10) {
                $str_phone = substr($phone,0,3) .'-'. substr($phone,3,3) .'-'. substr($phone,6,4);
            } else if ( strlen($phone) == 11) {
                $str_phone = substr($phone,0,3) .'-'. substr($phone,3,4) .'-'. substr($phone,7,4);
            } else {
                $str_phone = '';
            }
            $sheet->setCellValue('E'. $rowNum, $str_phone); //연락처

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

        $date = date('Y-m-d H:i:s');

        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename="채용지원리스트-'.$date.'.xlsx"');
        header('Cache-Control: max-age=0');

        $writer = new Xlsx($spreadsheet);

        $writer->save('php://output'); //download file
    }

    /**
     * Detail excel file download.
     *
     * @param  int  $recruit_id
     * @param  int  $ids
     * @return \Illuminate\Http\Response
     */
    public function detailExcelDownload($recruit_id, $ids)
    {
        if(strpos($ids, ',')) {
            $excel_file_tmp_arr = [];

            //zip
            $zip_file_tmp = tempnam("storage/recruitJobTemplate", 'tmp');
            $zip = new ZipArchive();
            $zip->open($zip_file_tmp, ZipArchive::OVERWRITE);
        }

        foreach(explode(',', $ids) as $id) {
            $job = Job::where('id', $id)
                    ->with(['recruit', 'user', 'userInfo', 'educations', 'careers', 'military', 'awards', 'certificates', 'languages', 'oas', 'overseasStudys', 'schoolActivities', 'hobbySpecialty'])
                    ->first();


            $inputFileName = 'storage/recruitJobTemplate/recruit_job_template.xlsx';
            $reader = new ReaderXlsx();
            $spreadsheet = $reader->load($inputFileName);

            $sheet = $spreadsheet->getActiveSheet();

            $rowNum = 1; //사진 row num
            if(Storage::exists($job->file_path)) { //사진
                $drawing = new Drawing();
                $drawing->setWorksheet($sheet);
                $drawing->setPath('storage/'. $job->file_path); //put your path and image here
                $drawing->setCoordinates('B'. $rowNum);
                $drawing->setWidth(130);
                $drawing->setOffsetX(5);
                $drawing->setOffsetY(5);
            }

            $rowNum = 8; //연령, 응시부문 row num
            if(!empty($job->userInfo)) {
                $birth_time = strtotime($job->userInfo->birth_day);
                $now = date('Ymd');
                $birthday = date('Ymd' , $birth_time);
                $age = floor(($now - $birthday) / 10000);

                $now_kor = date('Y');
                $birthday_kor = date('Y' , $birth_time);
                $age_kor = $now_kor - $birthday_kor + 1;

                $sheet->setCellValue('G'. $rowNum, $age_kor. '세 (만 '. $age. '세)'); //연령
            }
            $sheet->setCellValue('K'. $rowNum++, empty($job->recruit) ? '' : $job->recruit->title); //응시부문


            $phone = $job->phone_decrypt;
            if ( strlen($phone) == 10) {
                $str_phone = substr($phone,0,3) .'-'. substr($phone,3,3) .'-'. substr($phone,6,4);
            } else if ( strlen($phone) == 11) {
                $str_phone = substr($phone,0,3) .'-'. substr($phone,3,4) .'-'. substr($phone,7,4);
            } else {
                $str_phone = '';
            }

            $rowNum = 11; //인적사항 row num
            $sheet->setCellValue('D'. $rowNum, empty($job->user) ? '' : $job->user->name); //이름
            $sheet->setCellValue('H'. $rowNum, empty($job->userInfo) ? '' : $job->userInfo->name_en); //영문
            $sheet->setCellValue('M'. $rowNum, empty($job->userInfo) ? '' : $job->userInfo->birth_day); //생년월일
            $rowNum += 2;
            $sheet->setCellValue('C'. $rowNum, empty($job->user) ? '' : $job->user->email); //이메일
            // $sheet->setCellValue('L'. $rowNum, vsprintf('%s%s%s-%s%s%s%s-%s%s%s%s', str_split($job->phone_decrypt ?? ''))); //연락처
            $sheet->setCellValue('L'. $rowNum, $str_phone); //연락처
            $rowNum += 2;
            $sheet->setCellValue('C'. $rowNum, $job->address_1. ' '. $job->address_2); //주소

            $rowNum = 19; //학력사항 row num
            $sheet->setCellValue('B'. $rowNum, empty($job->highschool) ? '' : $job->highschool->school_start. ' ~ '. $job->highschool->school_end); //재학기간
            $sheet->setCellValue('D'. $rowNum, empty($job->highschool) ? '' : $job->highschool->school_name); //학교명
            $sheet->setCellValue('G'. $rowNum, empty($job->highschool) ? '' : $job->highschool->major_ko); //전공학과
            $sheet->setCellValue('K'. $rowNum, empty($job->highschool) ? '' : $job->highschool->graduation_ko); //졸업구분
            $sheet->setCellValue('N'. $rowNum, empty($job->highschool) ? '' : $job->highschool->school_address); //소재시

            $educations = collect($job->educations)->sortByDesc('edu_end')->take(3)->all();
            foreach($educations as $education) {
                $rowNum += 2;
                $sheet->setCellValue('B'. $rowNum, $education->edu_start. ' ~ '. $education->edu_end); //재학기간
                $sheet->setCellValue('D'. $rowNum, $education->school_name); //학교명
                $sheet->setCellValue('G'. $rowNum, $education->edu_major); //전공학과
                $sheet->setCellValue('I'. $rowNum, $education->edu_grade); //성적
                $sheet->setCellValue('J'. $rowNum, $education->edu_grade_full); //성적
                $sheet->setCellValue('K'. $rowNum, $education->entrance_ko); //졸업구분
                $sheet->setCellValue('L'. $rowNum, $education->graduation_ko); //졸업구분
                $sheet->setCellValue('M'. $rowNum, $education->edu_time_ko); //졸업구분
                $sheet->setCellValue('N'. $rowNum, $education->edu_address); //소재시
                $sheet->setCellValue('O'. $rowNum, $education->location_ko); //소재시
            }

            $rowNum = 29; //교내활동 row num
            $schoolActivities = collect($job->schoolActivities)->sortByDesc('school_activities_end')->take(2)->all();
            foreach($schoolActivities as $schoolActivitie) {
                $sheet->setCellValue('B'. $rowNum, $schoolActivitie->school_activities_start. ' ~ '. $schoolActivitie->school_activities_end); //활동기간
                $sheet->setCellValue('D'. $rowNum, $schoolActivitie->school_activities_affiliation); //소속
                $sheet->setCellValue('F'. $rowNum, $schoolActivitie->school_activities_role); //담당역할
                $sheet->setCellValue('H'. $rowNum, $schoolActivitie->school_activities_contents); //활동내역
                $rowNum += 2;
            }

            $rowNum = 27; //취미 row num
            $sheet->setCellValue('M'. $rowNum, empty($job->hobbySpecialty) ? '' : $job->hobbySpecialty->hobby); //취미

            $rowNum = 30; //특기 row num
            $sheet->setCellValue('M'. $rowNum, empty($job->hobbySpecialty) ? '' : $job->hobbySpecialty->specialty); //특기

            $rowNum = 35; //경력사항 row num
            $careers = collect($job->careers)->sortByDesc('career_end')->take(2)->all();
            foreach($careers as $career) {
                $sheet->setCellValue('B'. $rowNum, $career->career_start. ' ~ '. $career->career_end); //근무기간
                $sheet->setCellValue('D'. $rowNum, $career->career_name); //회사명
                $sheet->setCellValue('G'. $rowNum, $career->career_position); //직위
                $sheet->setCellValue('I'. $rowNum, $career->career_department); //근무부서
                $sheet->setCellValue('K'. $rowNum, $career->career_role); //담당업무
                $rowNum += 2;
            }

            $rowNum = 41; //병역사항 row num
            $sheet->setCellValue('B'. $rowNum, empty($job->military) ? '' : $job->military->discharge_ko); //구분
            $sheet->setCellValue('C'. $rowNum, empty($job->military) ? '' : $job->military->military_duration_start. ' ~ '. $job->military->military_duration_end); //복무기간
            $sheet->setCellValue('E'. $rowNum, empty($job->military) ? '' : $job->military->military_type); //군별
            $sheet->setCellValue('G'. $rowNum, empty($job->military) ? '' : $job->military->military_class); //병과
            $sheet->setCellValue('I'. $rowNum, empty($job->military) ? '' : $job->military->military_rank); //계급
            $sheet->setCellValue('K'. $rowNum, empty($job->military) ? '' : $job->military->military_exemption); //면제사유
            $sheet->setCellValue('M'. $rowNum, empty($job->military) ? '' : $job->military->affair_ko); //보훈대상여부

            $rowNum = 45; //외국어 row num
            $languages = collect($job->languages)->sortByDesc('language_end')->take(3)->all();
            foreach($languages as $language) {
                $sheet->setCellValue('B'. $rowNum, $language->language_type); //구분
                $sheet->setCellValue('D'. $rowNum, $language->language_name); //TEST명
                $sheet->setCellValue('H'. $rowNum, $language->language_grade); //득점
                $sheet->setCellValue('J'. $rowNum, $language->language_grade_full); //만점
                $sheet->setCellValue('K'. $rowNum, $language->language_start); //시행일
                $sheet->setCellValue('M'. $rowNum, $language->level_ko); //회화수준
                $rowNum += 2;
            }

            $rowNum = 53; //수상경력 row num
            $awards = collect($job->awards)->sortByDesc('award_date')->take(4)->all();
            foreach($awards as $award) {
                $sheet->setCellValue('B'. $rowNum, $award->award_date); //수상일
                $sheet->setCellValue('D'. $rowNum, $award->award_group_name); //단체명
                $sheet->setCellValue('F'. $rowNum, $award->award_name); //시상명
                $rowNum += 2;
            }

            $rowNum = 53; //자격면허 row num
            $certificates = collect($job->certificates)->sortByDesc('certificate_date')->take(4)->all();
            foreach($certificates as $certificate) {
                $sheet->setCellValue('I'. $rowNum, $certificate->certificate_date); //취득일
                $sheet->setCellValue('K'. $rowNum, $certificate->certificate_name); //자격증명
                $sheet->setCellValue('M'. $rowNum, $certificate->certificate_issuer); //발행처
                $rowNum += 2;
            }

            $rowNum = 63; //해외연수 row num
            $overseasStudys = collect($job->overseasStudys)->sortByDesc('overseas_study_end')->take(2)->all();
            foreach($overseasStudys as $overseasStudy) {
                $sheet->setCellValue('B'. $rowNum, $overseasStudy->country_name); //국가/도시
                $sheet->setCellValue('D'. $rowNum, $overseasStudy->school_name); //학교/단체
                $sheet->setCellValue('F'. $rowNum, $overseasStudy->overseas_study_name); //연수명
                $sheet->setCellValue('H'. $rowNum, $overseasStudy->overseas_study_start. ' ~ '. $overseasStudy->overseas_study_end); //기간
                $sheet->setCellValue('J'. $rowNum, $overseasStudy->overseas_study_purpose); //연수목적
                $sheet->setCellValue('L'. $rowNum, $overseasStudy->overseas_study_contents); //연수내용
                $rowNum += 2;
            }

            $rowNum = 68; //PC사용능력 row num
            $oas = collect($job->oas)->take(3)->all();
            foreach($oas as $oa) {
                $sheet->setCellValue('C'. $rowNum, $oa->oa_name); //사용 가능 OA
                $sheet->setCellValue('M'. $rowNum, $oa->level_ko); //수준
                $rowNum += 2;
            }

            $rowNum = 80; //자기소개서1 row num
            $sheet->setCellValue('A'. $rowNum, $job->cover_letter);
            $sheet->getStyle('A'. $rowNum)->getAlignment()->setWrapText(true);


            header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
            header('Content-Disposition: attachment;filename="채용지원상세_'. $job->user->name. '_No'. $id. '.xlsx"');
            header('Cache-Control: max-age=0');

            $writer = new Xlsx($spreadsheet);

            if(strpos($ids, ',')) {
                $excel_file_tmp = tempnam("storage/recruitJobTemplate", 'tmp');
                $writer->save($excel_file_tmp);
                $zip->addFile($excel_file_tmp, '채용지원상세_'. $job->user->name. '_No'. $id. '.xlsx');
                array_push($excel_file_tmp_arr, $excel_file_tmp);
            } else {
                //download xlsx file
                $writer->save('php://output');
            }
        }

        if(strpos($ids, ',')) {
            $zip->close();

            //download zip file
            header('Content-Type: application/zip');
            header('Content-Length: ' . filesize($zip_file_tmp));
            header('Content-Disposition: attachment; filename="채용지원상세.zip"');
            readfile($zip_file_tmp);
            foreach($excel_file_tmp_arr as $excel_file_tmp) {
                unlink($excel_file_tmp);
            }
            unlink($zip_file_tmp);
        }
    }

    public function smsShow(Request $request, $recruit_id, $job_ids)
    {
        // $recruit_users = DB::table("users", 'a')
        //             ->select('a.name, j.phone_decrypt')
        //             ->leftJoin('user_infos AS i', 'a.id', '=', 'i.id')
        //             ->leftJoin('job_applications AS j', 'a.id', '=', 'j.user_id')
        //             ->leftJoin('recruits AS r', 'r.id', '=', 'j.recruit_id')
        //             ->where('r.id', '=', $id)
        //             ->orderBy('j.id', 'desc')
        //             ->get();

        $jobs = Job::whereIn('id', explode(',', $job_ids))->with(['user'])->get();

        $data = [];
        $data['jobs'] = $jobs;

        debug($data);
        return view('admin.recruit.job.sms', $data);
    }

    public function smsSend(Request $request, $recruit_id, $job_ids)
    {
        $jobs = Job::whereIn('id', explode(',', $job_ids))->with(['user'])->get();

        $data = [];
        $data['phones'] = $jobs->pluck('phone_decrypt');
        $data['msg'] = $request->sms_text;

        SmtpEmail::sms($data);

        return redirect("/admin/recruit/{$recruit_id}/job/{$job_ids}/detail-sms")->with('success','문자전송에 성공했습니다.');
    }

    public function deleteUser(Request $request)
    {
        $job_ids = $request->input('ids');
        $job_ids = explode(',', $job_ids);
        foreach ($job_ids as $key => $job_id) {
            DB::table('job_applications_award')->where('job_id', '=', $job_id)->delete();
            DB::table('job_applications_career')->where('job_id', '=', $job_id)->delete();
            DB::table('job_applications_certificate')->where('job_id', '=', $job_id)->delete();
            DB::table('job_applications_education')->where('job_id', '=', $job_id)->delete();
            DB::table('job_applications_highschool')->where('job_id', '=', $job_id)->delete();
            DB::table('job_applications_hobby_specialty')->where('job_id', '=', $job_id)->delete();
            DB::table('job_applications_language')->where('job_id', '=', $job_id)->delete();
            DB::table('job_applications_military')->where('job_id', '=', $job_id)->delete();
            DB::table('job_applications_oa')->where('job_id', '=', $job_id)->delete();
            DB::table('job_applications_overseas_study')->where('job_id', '=', $job_id)->delete();
            DB::table('job_applications_school_activities')->where('job_id', '=', $job_id)->delete();

            $job = Job::where('id', '=', $job_id)->first();
            $user_id = $job->user_id;
            DB::table('user_infos')
                ->where('id', '=', $user_id)
                ->delete();
            $job->delete();
            DB::table('users')
                ->where('id', '=', $user_id)
                ->where('role','=','user')
                ->delete();
        }
        $result = [];
        $result['result'] ='success';
        return $result;
    }

    public function deleteUserAll(Request $request, $recruit_id)
    {
        $success = Job::where('recruit_id', '=', $recruit_id)->delete();
        $result = [];
        $result['result'] = $success ? 'success' : 'fail';
        return $result;
    }
}
