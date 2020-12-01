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
                    <h3>채용 지원자 목록</h3>
                </div>
            </div>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-12">
                    <div class="form-inline">
                        <div class="form-group">
                            <label class="mr-1">채용공고</label>
                            <select class="form-control w-auto" name="recruit_id">
                                @foreach ($recruits as $recruit)
                                <option value="{{ $recruit->id }}" {{ $recruit->id == $recruit_id ? 'selected' :''}}>
                                    {{ '['. $recruit->job_type. '/'. ($recruit->career == 'new' ? '신입' : '경력'). '] '. $recruit->title }}
                                </option>
                                @endforeach
                            </select>
                        </div>
                        <span class="ml-3 mr-3">|</span>
                        <div class="form-group">
                            <label class="mr-1">상태</label>
                            <select class="form-control w-auto" name="status">
                                <option value="">::전체::</option>
                                <option value="saved" {{ $status == 'saved' ? 'selected' :''}}>저장</option>
                                <option value="submit" {{ $status == 'submit' ? 'selected' :''}}>제출</option>
                                <option value="pending" {{ $status == 'pending' ? 'selected' :''}}>처리중</option>
                                <option value="expired" {{ $status == 'expired' ? 'selected' :''}}>종료</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <table class="table">
                        <tr>
                            <th class="text-center">번호</th>
                            <th class="text-center">이름</th>
                            <th class="text-center">상태</th>
                            <th class="text-center">상세</th>
                            <th class="text-center">등록일</th>
                        </tr>
                        @foreach ($jobs as $job)
                        <tr>
                            <td class="text-center">{{ $job->id }}</td>
                            <td class="text-center">{{ $job->user->name }}</td>
                            <td class="text-center">{{ $job->ko_status }}
                                @if ($job->status == 'saved')
                                저장
                                @elseif ($job->status == 'submit')
                                제출
                                @elseif ($job->status == 'pending')
                                처리중
                                @elseif ($job->status == 'expired')
                                종료
                                @endif
                            </td>
                            <td class="text-center">
                                <a class="btn btn-outline-info btn-xs {{ $job->status == 'saved' ? 'disabled' :''}}" href="/admin/recruit/{{ $job->recruit_id }}/job/{{ $job->id }}">상세보기</button>
                            </td>
                            <td class="text-center">{{ $job->updated_at ?? $job->created_at}}</td>
                        </tr>
                        @endforeach
                    </table>
                </div>
            </div>
            <div class="row">
                <div class="col-12 text-center">
                    @if($jobs->count())
                    {{$jobs->appends(['status' => $status])->links("pagination::bootstrap-4")}}
                    @endif
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
        //채용공고 변경시
        $('select[name=recruit_id], select[name=status]').on('change', function() {
            $(location).attr('href','/admin/recruit/'+$('select[name=recruit_id]').val()+'/job?status='+$('select[name=status]').val());
        });
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
