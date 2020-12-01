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
                <div class="col-12">
                    <h3>채용 지원자 상세</h3>
                </div>
            </div>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-12">
                    <table class="table">
                        <tr>
                            <td class="text-center" rowspan="3">
                                <img src="/admin/recruit/{{ $job->recruit_id }}/job/{{ $job->id }}/file-download" height="120" />
                            </td>
                            <th class="text-center">한글</th>
                            <td>{{ $job->user->name }}</td>
                            <th class="text-center">영문</th>
                            <td>{{ $job->userInfo->name_en }}</td>
                            <th class="text-center">생년월일</th>
                            <td>{{ $job->userInfo->birth_day }}</td>
                        </tr>
                        <tr>
                            <th class="text-center">연락처</th>
                            <td>{{ $job->phone_decrypt }}</td>
                            <th class="text-center">이메일</th>
                            <td>{{ $job->user->email }}</td>
                            <th class="text-center"></th>
                            <td></td>
                        </tr>
                        <tr>
                            <th class="text-center">주소</th>
                            <td colspan="5">{{ $job->address_1. ' '. $job->address_2 }}</td>
                        </tr>
                    </table>
                </div>
                <div class="col-12">
                    <table class="table">
                        <tr>
                            <th class="text-center align-middle" rowspan="{{ count($job->educations)+1 }}">학력사항</th>
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

        <div class="card-footer">
            <div class="row">
                <div class="col-12">
                    <form action="/admin/recruit/{{ $job->recruit_id }}/job/{{ $job->id }}" id="job-form" method="POST">
                        @method('PUT')
                        @csrf
                        <div class="form-group form-inline">
                            <label class="mr-1">처리상태</label>
                            <select class="form-control w-auto mr-1" name="status">
                                <option value="">::선택::</option>
                                <option value="pending" {{ $job->status == 'pending' ? 'selected' :''}}>처리중</option>
                                <option value="expired" {{ $job->status == 'expired' ? 'selected' :''}}>종료</option>
                            </select>
                            <button type="button" class="btn btn-primary text-white edit-btn">변경</button>
                        </div>
                    </form>
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
