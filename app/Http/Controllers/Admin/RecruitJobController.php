<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Work\Job;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
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
                ->with(['user', 'userInfo', 'educations', 'careers', 'military', 'awards', 'certificates', 'languages', 'oas', 'overseasStudys'])
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
     * Excel file download.
     *
     * @param  int  $recruit_id
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function excelDownload($recruit_id, $id)
    {
        $job = Job::where('id', $id)
                ->with(['user', 'userInfo', 'educations', 'careers', 'military', 'awards', 'certificates', 'languages', 'oas', 'overseasStudys'])
                ->first();


        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();


        $titleArray = [
            'font' => [
                'size' => 15,
                'bold' => true,
            ],
        ];

        $thArray = [
            'font' => [
                'bold' => true,
            ],
            'alignment' => [
                'vertical' => Alignment::VERTICAL_TOP
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
            'alignment' => [
                'vertical' => Alignment::VERTICAL_TOP
            ],
            'borders' => [
                'allBorders' => [
                    'borderStyle' => Border::BORDER_THIN,
                ],
            ],
        ];

        $rowNum = 2;

        $sheet->setCellValue('B'. $rowNum, '채용 지원자 상세');
        $sheet->getStyle('B'. $rowNum)->getFont()->setSize(20)->setBold(true);

        $rowNum += 2;

        $sheet->setCellValue('B'. $rowNum, '인적사항');
        $sheet->getStyle('B'. $rowNum)->applyFromArray($titleArray);

        $rowNum++;

        if(Storage::exists($job->file_path)) {
            $drawing = new Drawing();
            $drawing->setWorksheet($sheet);
            $drawing->setPath('storage/'. $job->file_path); //put your path and image here
            $drawing->setCoordinates('B'. $rowNum);
            $drawing->setHeight(100);
            $drawing->setOffsetX(50);
            $drawing->setOffsetY(10);
        }
        $sheet->mergeCells('B'. $rowNum. ':B'. ($rowNum+2));
        $sheet->getStyle('B'. $rowNum. ':B'. ($rowNum+2))->applyFromArray($tdArray);
        $sheet->getRowDimension($rowNum+2)->setRowHeight(60);

        $sheet->setCellValue('C'. $rowNum, '한글');
        $sheet->getStyle('C'. $rowNum)->applyFromArray($thArray);
        $sheet->setCellValue('D'. $rowNum, empty($job->user) ? '' : $job->user->name);
        $sheet->getStyle('D'. $rowNum)->applyFromArray($tdArray);

        $sheet->setCellValue('E'. $rowNum, '영문');
        $sheet->getStyle('E'. $rowNum)->applyFromArray($thArray);
        $sheet->setCellValue('F'. $rowNum, empty($job->userInfo) ? '' : $job->userInfo->name_en);
        $sheet->getStyle('F'. $rowNum)->applyFromArray($tdArray);

        $sheet->setCellValue('G'. $rowNum, '생년월일');
        $sheet->getStyle('G'. $rowNum)->applyFromArray($thArray);
        $sheet->setCellValue('H'. $rowNum, empty($job->userInfo) ? '' : $job->userInfo->birth_day);
        $sheet->getStyle('H'. $rowNum)->applyFromArray($tdArray);

        $rowNum++;

        $sheet->setCellValue('C'. $rowNum, '연락처');
        $sheet->getStyle('C'. $rowNum)->applyFromArray($thArray);
        $sheet->setCellValue('D'. $rowNum, $job->phone_decrypt);
        $sheet->getStyle('D'. $rowNum)->applyFromArray($tdArray);

        $sheet->setCellValue('E'. $rowNum, '이메일');
        $sheet->getStyle('E'. $rowNum)->applyFromArray($thArray);
        $sheet->setCellValue('F'. $rowNum, empty($job->user) ? '' : $job->user->email);
        $sheet->mergeCells('F'. $rowNum. ':H'. $rowNum);
        $sheet->getStyle('F'. $rowNum. ':H'. $rowNum++)->applyFromArray($tdArray);

        $sheet->setCellValue('C'. $rowNum, '주소');
        $sheet->getStyle('C'. $rowNum)->applyFromArray($thArray);
        $sheet->setCellValue('D'. $rowNum, $job->address_1. ' '. $job->address_2);
        $sheet->mergeCells('D'. $rowNum. ':H'. $rowNum);
        $sheet->getStyle('D'. $rowNum. ':H'. $rowNum)->applyFromArray($tdArray);

        $rowNum += 2;

        $sheet->setCellValue('B'. $rowNum, '병역사항');
        $sheet->getStyle('B'. $rowNum)->applyFromArray($titleArray);
        $rowNum++;
        $sheet->setCellValue('B'. $rowNum, '구분/군별');
        $sheet->setCellValue('C'. $rowNum, '제대구분');
        $sheet->setCellValue('D'. $rowNum, '계급');
        $sheet->setCellValue('E'. $rowNum, '면제사유');
        $sheet->setCellValue('F'. $rowNum, '복무기간');
        $sheet->getStyle('B'. $rowNum. ':F'. $rowNum)->applyFromArray($thArray);
        $rowNum++;
        $sheet->setCellValue('B'. $rowNum, empty($job->military) ? '' : $job->military->military_type);
        $sheet->setCellValue('C'. $rowNum, empty($job->military) ? '' : $job->military->military_discharge);
        $sheet->setCellValue('D'. $rowNum, empty($job->military) ? '' : $job->military->military_rank);
        $sheet->setCellValue('E'. $rowNum, empty($job->military) ? '' : $job->military->military_exemption);
        $sheet->setCellValue('F'. $rowNum, empty($job->military) ? '' : $job->military->military_duration_start. ' ~ '. $job->military->military_duration_end);
        $sheet->getStyle('B'. $rowNum. ':F'. $rowNum)->applyFromArray($tdArray);

        $rowNum += 2;

        $sheet->setCellValue('B'. $rowNum, '학력사항');
        $sheet->getStyle('B'. $rowNum)->applyFromArray($titleArray);
        $rowNum++;
        $sheet->setCellValue('B'. $rowNum, '학교명');
        $sheet->setCellValue('C'. $rowNum, '전공');
        $sheet->setCellValue('D'. $rowNum, '재학기간');
        $sheet->setCellValue('E'. $rowNum, '성적');
        $sheet->setCellValue('F'. $rowNum, '졸업구분');
        $sheet->getStyle('B'. $rowNum. ':F'. $rowNum)->applyFromArray($thArray);
        foreach($job->educations as $education) {
            $rowNum++;
            $sheet->setCellValue('B'. $rowNum, $education->school_name);
            $sheet->setCellValue('C'. $rowNum, $education->edu_major);
            $sheet->setCellValue('D'. $rowNum, $education->edu_start. ' ~ '. $education->edu_end);
            $sheet->setCellValue('E'. $rowNum, $education->edu_grade);
            $sheet->setCellValue('F'. $rowNum, $education->graduation);
            $sheet->getStyle('B'. $rowNum. ':F'. $rowNum)->applyFromArray($tdArray);
        }

        $rowNum += 2;

        $sheet->setCellValue('B'. $rowNum, '수상경력');
        $sheet->getStyle('B'. $rowNum)->applyFromArray($titleArray);
        $rowNum++;
        $sheet->setCellValue('B'. $rowNum, '시상명');
        $sheet->setCellValue('C'. $rowNum, '단체명');
        $sheet->setCellValue('D'. $rowNum, '수상일');
        $sheet->getStyle('B'. $rowNum. ':D'. $rowNum)->applyFromArray($thArray);
        foreach($job->awards as $award) {
            $rowNum++;
            $sheet->setCellValue('B'. $rowNum, $award->award_name);
            $sheet->setCellValue('C'. $rowNum, $award->award_group_name);
            $sheet->setCellValue('D'. $rowNum, $award->award_date);
            $sheet->getStyle('B'. $rowNum. ':D'. $rowNum)->applyFromArray($tdArray);
        }

        $rowNum += 2;

        $sheet->setCellValue('B'. $rowNum, '자격면허');
        $sheet->getStyle('B'. $rowNum)->applyFromArray($titleArray);
        $rowNum++;
        $sheet->setCellValue('B'. $rowNum, '취득일');
        $sheet->setCellValue('C'. $rowNum, '자격증명');
        $sheet->setCellValue('D'. $rowNum, '발행처');
        $sheet->getStyle('B'. $rowNum. ':D'. $rowNum)->applyFromArray($thArray);
        foreach($job->certificates as $certificate) {
            $rowNum++;
            $sheet->setCellValue('B'. $rowNum, $certificate->certificate_date);
            $sheet->setCellValue('C'. $rowNum, $certificate->certificate_name);
            $sheet->setCellValue('D'. $rowNum, $certificate->certificate_issuer);
            $sheet->getStyle('B'. $rowNum. ':D'. $rowNum)->applyFromArray($tdArray);
        }

        $rowNum += 2;

        $sheet->setCellValue('B'. $rowNum, '해외연수');
        $sheet->getStyle('B'. $rowNum)->applyFromArray($titleArray);
        $rowNum++;
        $sheet->setCellValue('B'. $rowNum, '국가/도시');
        $sheet->setCellValue('C'. $rowNum, '학교/단체');
        $sheet->setCellValue('D'. $rowNum, '기간');
        $sheet->setCellValue('E'. $rowNum, '담당업무');
        $sheet->setCellValue('F'. $rowNum, '연수명');
        $sheet->setCellValue('G'. $rowNum, '연수목적');
        $sheet->getStyle('B'. $rowNum. ':G'. $rowNum)->applyFromArray($thArray);
        foreach($job->overseasStudys as $overseasStudy) {
            $rowNum++;
            $sheet->setCellValue('B'. $rowNum, $overseasStudy->country_name);
            $sheet->setCellValue('C'. $rowNum, $overseasStudy->school_name);
            $sheet->setCellValue('D'. $rowNum, $overseasStudy->overseas_study_start. ' ~ '. $overseasStudy->overseas_study_end);
            $sheet->setCellValue('E'. $rowNum, $overseasStudy->overseas_study_name);
            $sheet->setCellValue('F'. $rowNum, $overseasStudy->overseas_study_purpose);
            $sheet->setCellValue('G'. $rowNum, $overseasStudy->overseas_study_contents);
            $sheet->getStyle('B'. $rowNum. ':G'. $rowNum)->applyFromArray($tdArray);
        }

        $rowNum += 2;

        $sheet->setCellValue('B'. $rowNum, '외국어');
        $sheet->getStyle('B'. $rowNum)->applyFromArray($titleArray);
        $rowNum++;
        $sheet->setCellValue('B'. $rowNum, '구분');
        $sheet->setCellValue('C'. $rowNum, 'TEST명');
        $sheet->setCellValue('D'. $rowNum, '점수/등급');
        $sheet->setCellValue('E'. $rowNum, '재학기간');
        $sheet->setCellValue('F'. $rowNum, '회화수준');
        $sheet->getStyle('B'. $rowNum. ':F'. $rowNum)->applyFromArray($thArray);
        foreach($job->languages as $language) {
            $rowNum++;
            $sheet->setCellValue('B'. $rowNum, $language->language_type);
            $sheet->setCellValue('C'. $rowNum, $language->language_grade);
            $sheet->setCellValue('D'. $rowNum, $language->language_name);
            $sheet->setCellValue('E'. $rowNum, $language->language_start. ' ~ '. $language->language_end);
            $sheet->setCellValue('F'. $rowNum, $language->language_level);
            $sheet->getStyle('B'. $rowNum. ':F'. $rowNum)->applyFromArray($tdArray);
        }

        $rowNum += 2;

        $sheet->setCellValue('B'. $rowNum, 'PC사용능력');
        $sheet->getStyle('B'. $rowNum)->applyFromArray($titleArray);
        $rowNum++;
        $sheet->setCellValue('B'. $rowNum, '사용 가능 OB');
        $sheet->setCellValue('C'. $rowNum, '수준');
        $sheet->getStyle('B'. $rowNum. ':C'. $rowNum)->applyFromArray($thArray);
        foreach($job->oas as $oa) {
            $rowNum++;
            $sheet->setCellValue('B'. $rowNum, $oa->oa_name);
            $sheet->setCellValue('C'. $rowNum, $oa->oa_level);
            $sheet->getStyle('B'. $rowNum. ':C'. $rowNum)->applyFromArray($tdArray);
        }

        $rowNum += 2;

        $sheet->setCellValue('B'. $rowNum, '경력사항');
        $sheet->getStyle('B'. $rowNum)->applyFromArray($titleArray);
        $rowNum++;
        $sheet->setCellValue('B'. $rowNum, '회사명');
        $sheet->setCellValue('C'. $rowNum, '근무기간');
        $sheet->setCellValue('D'. $rowNum, '직위');
        $sheet->setCellValue('E'. $rowNum, '담당업무');
        $sheet->getStyle('B'. $rowNum. ':E'. $rowNum)->applyFromArray($thArray);
        foreach($job->careers as $career) {
            $rowNum++;
            $sheet->setCellValue('B'. $rowNum, $career->career_name);
            $sheet->setCellValue('C'. $rowNum, $career->career_start. ' ~ '. $career->career_end);
            $sheet->setCellValue('D'. $rowNum, $career->career_position);
            $sheet->setCellValue('E'. $rowNum, $career->career_role);
            $sheet->getStyle('B'. $rowNum. ':E'. $rowNum)->applyFromArray($tdArray);
        }

        $rowNum += 2;

        $sheet->setCellValue('B'. $rowNum, '자기소개서');
        $sheet->getStyle('B'. $rowNum)->applyFromArray($titleArray);
        $rowNum++;
        $sheet->setCellValue('B'. $rowNum, $job->cover_letter);
        $sheet->mergeCells('B'. $rowNum. ':H'. $rowNum);
        $sheet->getStyle('B'. $rowNum. ':H'. $rowNum)->applyFromArray($tdArray)->getAlignment()->setWrapText(true);
        $sheet->getRowDimension($rowNum)->setRowHeight(150);


        foreach(range('B', 'H') as $columnID) {
            if($columnID == 'B') {
                $sheet->getColumnDimension($columnID)->setWidth(30);
            } else {
                $sheet->getColumnDimension($columnID)->setAutoSize(true);
            }
        }

        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename="채용지원상세_'. $job->user->name. '.xlsx"');
        header('Cache-Control: max-age=0');

        $writer = new Xlsx($spreadsheet);

        $writer->save('php://output'); //download file
    }
}
