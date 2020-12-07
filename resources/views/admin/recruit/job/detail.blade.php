@extends('adminlte::page')

@section('title', '채용 지원자 관리')

@section('content_header')
    <h1>채용 지원자 관리</h1>
@stop

@section('content')
<div class="container">
    <div class="card">
        <div class="card-header">
            <div class="row">
                <div class="col-9 col-xl-10">
                    <h3>채용 지원자 상세</h3>
                </div>
                <div class="col-3 col-xl-2">
                    <form action="/admin/recruit/{{ $job->recruit_id }}/job/{{ $job->id }}" id="job-form" method="POST">
                        @method('PUT')
                        @csrf
                        <div class="form-group form-inline">
                            <select class="form-control w-auto mr-1" name="status">
                                <option value="">::처리상태::</option>
                                <option value="pending" {{ $job->status == 'pending' ? 'selected' :''}}>처리중</option>
                                <option value="expired" {{ $job->status == 'expired' ? 'selected' :''}}>종료</option>
                            </select>
                            <button type="button" class="btn btn-primary text-white edit-btn">변경</button>
                        </div>
                    </form>
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
                                    <td class="text-center" rowspan="3">
                                        <img src="/storage/{{ $job->file_path }}" height="120" />
                                    </td>
                                    <th class="text-center">한글</th>
                                    <td>{{ $job->user->name ?? '' }}</td>
                                    <th class="text-center">영문</th>
                                    <td>{{ $job->userInfo->name_en ?? '' }}</td>
                                    <th class="text-center">생년월일</th>
                                    <td>{{ $job->userInfo->birth_day ?? '' }}</td>
                                </tr>
                                <tr>
                                    <th class="text-center">연락처</th>
                                    <td>{{ $job->phone_decrypt }}</td>
                                    <th class="text-center">이메일</th>
                                    <td colspan="3">{{ $job->user->email ?? '' }}</td>
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
                            <h3 class="box-title">병역사항</h3>
                        </div>
                        <div class="box-body">
                            <table class="table">
                                <tr>
                                    <th class="text-center">구분/군별</th>
                                    <th class="text-center">제대구분</th>
                                    <th class="text-center">계급</th>
                                    <th class="text-center">면제사유</th>
                                    <th class="text-center">복무기간</th>
                                </tr>
                                <tr>
                                    <td class="text-center">{{ $job->military->military_type ?? '' }}</td>
                                    <td class="text-center">{{ $job->military->military_discharge ?? '' }}</td>
                                    <td class="text-center">{{ $job->military->military_rank ?? '' }}</td>
                                    <td class="text-center">{{ $job->military->military_exemption ?? '' }}</td>
                                    <td class="text-center">{{ empty($job->military) ? '' : $job->military->military_duration_start. ' ~ '. $job->military->military_duration_end }}</td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="col-12">
                    <div class="box">
                        <div class="box-header with-border">
                            <h3 class="box-title">학력사항</h3>
                        </div>
                        <div class="box-body">
                            <table class="table">
                                <tr>
                                    <th class="text-center">학교명</th>
                                    <th class="text-center">전공</th>
                                    <th class="text-center">재학기간</th>
                                    <th class="text-center">성적</th>
                                    <th class="text-center">졸업구분</th>
                                </tr>

                                @foreach ($job->educations as $education)
                                <tr>
                                    <td class="text-center">{{ $education->school_name }}</td>
                                    <td class="text-center">{{ $education->edu_major }}</td>
                                    <td class="text-center">{{ $education->edu_start. ' ~ '. $education->edu_end }}</td>
                                    <td class="text-center">{{ $education->edu_grade }}</td>
                                    <td class="text-center">{{ $education->graduation }}</td>
                                </tr>
                                @endforeach
                            </table>
                        </div>
                    </div>
                </div>
                <div class="col-12">
                    <div class="box">
                        <div class="box-header with-border">
                            <h3 class="box-title">수상경력</h3>
                        </div>
                        <div class="box-body">
                            <table class="table">
                                <tr>
                                    <th class="text-center">시상명</th>
                                    <th class="text-center">단체명</th>
                                    <th class="text-center">수상일</th>
                                </tr>

                                @foreach ($job->awards as $award)
                                <tr>
                                    <td class="text-center">{{ $award->award_name }}</td>
                                    <td class="text-center">{{ $award->award_group_name }}</td>
                                    <td class="text-center">{{ $award->award_date }}</td>
                                </tr>
                                @endforeach
                            </table>
                        </div>
                    </div>
                </div>
                <div class="col-12">
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
                <div class="col-12">
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
                                    <th class="text-center">담당업무</th>
                                    <th class="text-center">연수명</th>
                                    <th class="text-center">연수목적</th>
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
                <div class="col-12">
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
                                    <th class="text-center">재학기간</th>
                                    <th class="text-center">회화수준</th>
                                </tr>

                                @foreach ($job->languages as $language)
                                <tr>
                                    <td class="text-center">{{ $language->language_type }}</td>
                                    <td class="text-center">{{ $language->language_grade }}</td>
                                    <td class="text-center">{{ $language->language_name }}</td>
                                    <td class="text-center">{{ $language->language_start. ' ~ '. $language->language_end }}</td>
                                    <td class="text-center">{{ $language->language_level }}</td>
                                </tr>
                                @endforeach
                            </table>
                        </div>
                    </div>
                </div>
                <div class="col-12">
                    <div class="box">
                        <div class="box-header with-border">
                            <h3 class="box-title">PC사용능력</h3>
                        </div>
                        <div class="box-body">
                            <table class="table">
                                <tr>
                                    <th class="text-center">사용 가능 OA</th>
                                    <th class="text-center">수준</th>
                                </tr>

                                @foreach ($job->oas as $oa)
                                <tr>
                                    <td class="text-center">{{ $oa->oa_name }}</td>
                                    <td class="text-center">{{ $oa->oa_level }}</td>
                                </tr>
                                @endforeach
                            </table>
                        </div>
                    </div>
                </div>
                <div class="col-12">
                    <div class="box">
                        <div class="box-header with-border">
                            <h3 class="box-title">경력사항</h3>
                        </div>
                        <div class="box-body">
                            <table class="table">
                                <tr>
                                    <th class="text-center">회사명</th>
                                    <th class="text-center">근무기간</th>
                                    <th class="text-center">직위</th>
                                    <th class="text-center">담당업무</th>
                                </tr>

                                @foreach ($job->careers as $career)
                                <tr>
                                    <td class="text-center">{{ $career->career_name }}</td>
                                    <td class="text-center">{{ $career->career_start. ' ~ '. $career->career_end }}</td>
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
                            <h3 class="box-title">자기소개서</h3>
                        </div>
                        <div class="box-body">
                            <table class="table">
                                <tr>
                                    <td>{!! nl2br(e($job->cover_letter)) !!}</td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
const job_list = () => {

    const init = () => {
        event_listener();
    };

    const event_listener = () => {
        //변경 버튼 클릭시
        $('.edit-btn').on('click', function() {
            if (validation()) {
                $('#job-form').submit();
            }
        });
    }

    const validation = () => {
        if ($('select[name=status]').val() == '' || $('select[name=status]').val() == null) {
            alert('처리상태를 선택해주세요.');
            return false;
        }
        return true;
    }

    init();
}

window.onload = function(){
    job_list();
}
</script>
@endsection

@section('css')
    <link rel="stylesheet" href="/css/admin.css">
@stop

@section('js')
    <script src="{{ mix('/js/admin/manifest.js') }}"></script>
    <script src="{{ mix('/js/admin/vendor.js') }}"></script>
@stop
