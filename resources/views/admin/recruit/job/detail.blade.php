@extends('adminlte::page')

@section('title', '채용 지원자 관리')

@section('content_header')
    <h1>채용 지원자 관리</h1>
@stop

@section('content')
<div class="container container-job-edit">
    <div class="card">
        <div class="card-header">
            <div class="row">
                <div class="col-8 col-xl-9">
                    <h3>채용 지원자 상세</h3>
                </div>
                <div class="col-4 col-xl-3">
                    <div class="form-inline">
                        @if ( $job->status == 'submit' )
                            <form action="/admin/recruit/{{ $job->recruit_id }}/job/{{ $job->id }}" id="job-form" method="POST">
                                @method('PUT')
                                @csrf
                                <div class="form-group form-inline">
                                    <select class="form-control w-auto mr-1" name="pass">
                                        <option value="">::합격상태::</option>
                                        <option value="pass" {{ $job->pass == 'pass' ? 'selected' :''}}>합격</option>
                                        <option value="failure" {{ $job->pass == 'failure' ? 'selected' :''}}>불합격</option>
                                    </select>
                                    <button type="button" class="btn btn-primary text-white edit-btn">변경</button>
                                </div>
                            </form>
                        @else
                            <input type="text" name="" id="" class="form-control" disabled value="미제출">
                        @endif
                        <span class="mr-1 ml-1">|</span>
                        <a class="btn btn-info text-white" href="/kor/admin/recruit/{{ $job->recruit_id }}/job/{{ $job->id }}/detail-excel-download">EXCEL</a>
                        <span class="mr-1 ml-2">|</span>
                        <a class="btn btn-success" href="/kor/admin/recruit/{{ $job->recruit_id }}/job">목록</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-12">
                    <div class="box">
                        <div class="box-header with-border">
                            <h3 class="box-title">인적사항</h3>
                        </div>
                        <div class="box-body">
                            <table class="table">
                                <tr>
                                    <td class="text-center" rowspan="4">
                                        @if ( isset($job->file_path) )
                                        <img src="/kor/storage/{{ $job->file_path }}" height="150" />
                                        @endif
                                    </td>
                                    <th class="text-center">한글</th>
                                    <td>{{ $job->user->name ?? '' }}</td>
                                    <th class="text-center">영문</th>
                                    <td>{{ $job->userInfo->name_en ?? '' }}</td>
                                    <th class="text-center">응시부문</th>
                                    <td>{{ $job->recruit->title ?? '' }}</td>
                                </tr>
                                <tr>
                                    <th class="text-center">연락처</th>
                                    <td>{{ $job->phone_decrypt }}</td>
                                    <th class="text-center">이메일</th>
                                    <td>{{ $job->user->email ?? '' }}</td>
                                    <th class="text-center">생년월일</th>
                                    <td>{{ $job->userInfo->birth_day ?? '' }}</td>
                                </tr>
                                <tr>
                                    <th class="text-center">취미</th>
                                    <td>{{  $job->hobbySpecialty->hobby ?? '' }}</td>
                                    <th class="text-center">특기</th>
                                    <td colspan="3">{{ $job->hobbySpecialty->specialty ?? '' }}</td>
                                </tr>
                                <tr>
                                    <th class="text-center">주소</th>
                                    <td colspan="5">{{ $job->address_1. ' '. $job->address_2 }}</td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="col-12">
                    <div class="box">
                        <div class="box-header with-border">
                            <h3 class="box-title">학력사항 (고등학교)</h3>
                        </div>
                        <div class="box-body">
                            <table class="table">
                                <tr>
                                    <th class="text-center">학교명</th>
                                    <th class="text-center">전공</th>
                                    <th class="text-center">소재지</th>
                                    <th class="text-center">재학기간</th>
                                    <th class="text-center">졸업구분</th>
                                </tr>
                                <tr>
                                    <td class="text-center">{{ $job->highschool ? $job->highschool->school_name : '' }}</td>
                                    <td class="text-center">{{ $job->highschool ? $job->highschool->major_ko : '' }}</td>
                                    <td class="text-center">{{ $job->highschool ? $job->highschool->school_address : '' }}</td>
                                    <td class="text-center">{{ $job->highschool ? $job->highschool->school_start. ' ~ '. $job->highschool->school_end : '' }}</td>
                                    <td class="text-center">{{ $job->highschool ? $job->highschool->graduation_ko : '' }}</td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="col-12">
                    <div class="box">
                        <div class="box-header with-border">
                            <h3 class="box-title">학력사항 (대학·대학원)</h3>
                        </div>
                        <div class="box-body">
                            <table class="table">
                                <tr>
                                    <th class="text-center">구분</th>
                                    <th class="text-center">학교명</th>
                                    <th class="text-center">소재지</th>
                                    <th class="text-center">캠퍼스</th>
                                    <th class="text-center">주/야간</th>
                                    <th class="text-center">전공</th>
                                    <th class="text-center">입학</th>
                                    <th class="text-center">졸업구분</th>
                                    <th class="text-center">재학기간</th>
                                    <th class="text-center">성적</th>
                                    <th class="text-center">소재지</th>
                                </tr>

                                @foreach ($job->educations as $education)
                                <tr>
                                    <td class="text-center">{{ $education->edu_type_ko }}</td>
                                    <td class="text-center">{{ $education->school_name }}</td>
                                    <td class="text-center">{{ $education->edu_address }}</td>
                                    <td class="text-center">{{ $education->location_ko }}</td>
                                    <td class="text-center">{{ $education->edu_time_ko }}</td>
                                    <td class="text-center">{{ $education->edu_major }}</td>
                                    <td class="text-center">{{ $education->entrance_ko }}</td>
                                    <td class="text-center">{{ $education->graduation_ko }}</td>
                                    <td class="text-center">{{ $education->edu_start. ' ~ '. $education->edu_end }}</td>
                                    <td class="text-center">{{ $education->edu_grade }} / {{ $education->edu_grade_full }}</td>
                                    <td class="text-center">{{ $education->edu_address }}</td>
                                </tr>
                                @endforeach
                            </table>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-12 col-sm-12">
                    <div class="box">
                        <div class="box-header with-border">
                            <h3 class="box-title">교내활동</h3>
                        </div>
                        <div class="box-body">
                            <table class="table">
                                <tr>
                                    <th class="text-center">활동기간</th>
                                    <th class="text-center">소속</th>
                                    <th class="text-center">담당역할</th>
                                    <th class="text-center">활동내역</th>
                                </tr>

                                @foreach ($job->schoolActivities as $schoolActivitie)
                                <tr>
                                    <td class="text-center">{{ $schoolActivitie->school_activities_start. ' ~ '. $schoolActivitie->school_activities_end }}</td>
                                    <td class="text-center">{{ $schoolActivitie->school_activities_affiliation }}</td>
                                    <td class="text-center">{{ $schoolActivitie->school_activities_role }}</td>
                                    <td class="text-center">{{ $schoolActivitie->school_activities_contents }}</td>
                                </tr>
                                @endforeach
                            </table>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-12 col-sm-12">
                    <div class="box">
                        <div class="box-header with-border">
                            <h3 class="box-title">경력사항</h3>
                        </div>
                        <div class="box-body">
                            <table class="table">
                                <tr>
                                    <th class="text-center">근무기간</th>
                                    <th class="text-center">회사명</th>
                                    <th class="text-center">직위</th>
                                    <th class="text-center">담당업무</th>
                                </tr>

                                @foreach ($job->careers as $career)
                                <tr>
                                    <td class="text-center">{{ $career->career_start. ' ~ '. $career->career_end }}</td>
                                    <td class="text-center">{{ $career->career_name }}</td>
                                    <td class="text-center">{{ $career->career_position }}</td>
                                    <td class="text-center">{{ $career->career_role }}</td>
                                </tr>
                                @endforeach
                            </table>
                        </div>
                    </div>
                </div>
                <div class="col-12">
                    <div class="box">
                        <div class="box-header with-border">
                            <h3 class="box-title">병역사항</h3>
                        </div>
                        <div class="box-body">
                            <table class="table">
                                <tr>
                                    <th class="text-center">군별/병과</th>
                                    <th class="text-center">제대구분</th>
                                    <th class="text-center">계급</th>
                                    <th class="text-center">면제사유</th>
                                    <th class="text-center">보훈대상여부</th>
                                    <th class="text-center">복무기간</th>
                                </tr>
                                <tr>
                                    <td class="text-center">{{ $job->military ? $job->military->military_type : '' }}</td>
                                    <td class="text-center">{{ $job->military ? $job->military->discharge_ko : '' }}</td>
                                    <td class="text-center">{{ $job->military ? $job->military->military_rank : '' }}</td>
                                    <td class="text-center">{{ $job->military ? $job->military->military_exemption : '' }}</td>
                                    <td class="text-center">{{ $job->military ? $job->military->affair_ko : '' }}</td>
                                    <td class="text-center">{{ $job->military ? $job->military->military_duration_start. ' ~ '. $job->military->military_duration_end : '' }}</td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-12 col-sm-12">
                    <div class="box">
                        <div class="box-header with-border">
                            <h3 class="box-title">PC사용능력</h3>
                        </div>
                        <div class="box-body">
                            <table class="table">
                                <tr>
                                    <th class="text-center">사용 가능 OA</th>
                                    <th class="text-center">사용 수준</th>
                                </tr>

                                @foreach ($job->oas as $oa)
                                <tr>
                                    <td class="text-center">{{ $oa->oa_name }}</td>
                                    <td class="text-center">{{ $oa->level_ko }}</td>
                                </tr>
                                @endforeach
                            </table>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-12 col-sm-12">
                    <div class="box">
                        <div class="box-header with-border">
                            <h3 class="box-title">외국어</h3>
                        </div>
                        <div class="box-body">
                            <table class="table">
                                <tr>
                                    <th class="text-center">구분</th>
                                    <th class="text-center">TEST명</th>
                                    <th class="text-center">점수/등급</th>
                                    <th class="text-center">인증일</th>
                                    <th class="text-center">회화수준</th>
                                </tr>

                                @foreach ($job->languages as $language)
                                <tr>
                                    <td class="text-center">{{ $language->language_type }}</td>
                                    <td class="text-center">{{ $language->language_name }}</td>
                                    <td class="text-center">{{ $language->language_grade . '/' . $language->language_grade_full }}</td>
                                    <td class="text-center">{{ $language->language_start }}</td>
                                    <td class="text-center">{{ $language->level_ko }}</td>
                                </tr>
                                @endforeach
                            </table>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-12 col-sm-12">
                    <div class="box">
                        <div class="box-header with-border">
                            <h3 class="box-title">수상경력</h3>
                        </div>
                        <div class="box-body">
                            <table class="table">
                                <tr>
                                    <th class="text-center">수상일</th>
                                    <th class="text-center">단체명</th>
                                    <th class="text-center">시상명</th>
                                </tr>

                                @foreach ($job->awards as $award)
                                <tr>
                                    <td class="text-center">{{ $award->award_date }}</td>
                                    <td class="text-center">{{ $award->award_group_name }}</td>
                                    <td class="text-center">{{ $award->award_name }}</td>
                                </tr>
                                @endforeach
                            </table>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-12 col-sm-12">
                    <div class="box">
                        <div class="box-header with-border">
                            <h3 class="box-title">자격면허</h3>
                        </div>
                        <div class="box-body">
                            <table class="table">
                                <tr>
                                    <th class="text-center">취득일</th>
                                    <th class="text-center">자격증명</th>
                                    <th class="text-center">발행처</th>
                                </tr>

                                @foreach ($job->certificates as $certificate)
                                <tr>
                                    <td class="text-center">{{ $certificate->certificate_date }}</td>
                                    <td class="text-center">{{ $certificate->certificate_name }}</td>
                                    <td class="text-center">{{ $certificate->certificate_issuer }}</td>
                                </tr>
                                @endforeach
                            </table>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-12 col-sm-12">
                    <div class="box">
                        <div class="box-header with-border">
                            <h3 class="box-title">해외연수</h3>
                        </div>
                        <div class="box-body">
                            <table class="table">
                                <tr>
                                    <th class="text-center">국가/도시</th>
                                    <th class="text-center">학교/단체</th>
                                    <th class="text-center">기간</th>
                                    <th class="text-center">연수명</th>
                                    <th class="text-center">연수목적</th>
                                    <th class="text-center">연수내용</th>
                                </tr>

                                @foreach ($job->overseasStudys as $overseasStudy)
                                <tr>
                                    <td class="text-center">{{ $overseasStudy->country_name }}</td>
                                    <td class="text-center">{{ $overseasStudy->school_name }}</td>
                                    <td class="text-center">{{ $overseasStudy->overseas_study_start. ' ~ '. $overseasStudy->overseas_study_end }}</td>
                                    <td class="text-center">{{ $overseasStudy->overseas_study_name }}</td>
                                    <td class="text-center">{{ $overseasStudy->overseas_study_purpose }}</td>
                                    <td class="text-center">{{ $overseasStudy->overseas_study_contents }}</td>
                                </tr>
                                @endforeach
                            </table>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-12 col-sm-12">
                    <div class="box">
                        <div class="box-header with-border">
                            <h3 class="box-title">취미/특기</h3>
                        </div>
                        <div class="box-body">
                            <table class="table">
                                <tr>
                                    <th class="text-center">취미</th>
                                    <th class="text-center">특기</th>
                                </tr>

                                <tr>
                                    <td class="text-center">{{ $job->hobbySpecialty ? $job->hobbySpecialty->hobby : '' }}</td>
                                    <td class="text-center">{{ $job->hobbySpecialty ? $job->hobbySpecialty->specialty : '' }}</td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="col-12">
                    <div class="box">
                        <div class="box-header with-border">
                            <h3 class="box-title">자기소개서</h3>
                        </div>
                        <div class="box-body">
                            <table class="table">
                                <tr>
                                    <td>{!! nl2br(e($job->cover_letter)) !!}</td>
                                </tr>
                            </table>
                            <table class="table">
                                <tr>
                                    <td>{!! nl2br(e($job->cover_letter_2)) !!}</td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@section('css')
    <link rel="stylesheet" href="/kor/css/admin.css">
@stop

@section('js')
    <script src="/kor/js/admin/manifest.js"></script>
    <script src="/kor/js/admin/vendor.js"></script>
    <script src="/kor/js/admin/recruit.js"></script>
@stop
