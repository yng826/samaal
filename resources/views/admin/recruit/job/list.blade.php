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
                                <option value="saved" {{ $status == 'saved' ? 'selected' :''}}>미제출</option>
                                <option value="submit" {{ $status == 'submit' ? 'selected' :''}}>제출</option>
                                <option value="pending" {{ $status == 'pending' ? 'selected' :''}}>처리중</option>
                                <option value="expired" {{ $status == 'expired' ? 'selected' :''}}>종료</option>
                            </select>
                        </div>
                        <div class="form-group ml-1">
                            <button type="button" class="btn btn-info text-white search-btn">검색</button>
                        </div>
                        <span class="mr-1 ml-1">|</span>
                        <div class="form-group">
                            <button type="button" class="btn btn-info text-white list-excel-btn">전체요약</button>
                            <button type="button" class="btn btn-success text-white ml-1 detail-excel-btn" disabled>선택상세</button>
                            <button type="button" class="btn btn-warning ml-1 detail-sms-btn" disabled>문자전송</button>
                            <a href="" class="detail-excel-href"></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <table class="table">
                        <tr>
                            <th class="text-center">
                                <input type="checkbox" id="all-check">
                            </th>
                            <th class="text-center">번호</th>
                            <th class="text-center">이름</th>
                            <th class="text-center">상태</th>
                            <th class="text-center">상세</th>
                            <th class="text-center">등록일</th>
                        </tr>
                        @foreach ($jobs as $job)
                        <tr>
                            <td class="text-center">
                                @if ($job->status != 'saved')
                                    <input type="checkbox" name="id-check" value="{{ $job->id }}">
                                @endif
                            </td>
                            <td class="text-center">{{ $job->id }}</td>
                            <td class="text-center">{{ $job->user->name }}</td>
                            <td class="text-center">{{ $job->ko_status }}
                                @if ($job->status == 'saved')
                                    미제출
                                @elseif ($job->status == 'submit')
                                    제출
                                @elseif ($job->status == 'pending')
                                    처리중
                                @elseif ($job->status == 'expired')
                                    종료
                                @endif
                            </td>
                            <td class="text-center">
                                @if ($job->status == 'saved')
                                    작성중
                                @else
                                    <a class="btn btn-outline-info btn-xs" href="/admin/recruit/{{ $job->recruit_id }}/job/{{ $job->id }}">상세보기</a>
                                @endif
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
        //체크박스 설정
        set_checkbox();

        //검색버튼 클릭시
        $('.search-btn').on('click', function() {
            $(location).attr('href','/admin/recruit/'+$('select[name=recruit_id]').val()+'/job?status='+$('select[name=status]').val());
        });
        //전체요약 클릭시
        $('.list-excel-btn').on('click', function() {
            $(location).attr('href','/admin/recruit/'+$('select[name=recruit_id]').val()+'/job/list-excel-download');
        });
        //선택상세 클릭시
        $('.detail-excel-btn').on('click', function() {
            let ids = '';
            $('input[name=id-check]:checked').each(function(index, item) {
                ids += (index>0 ? ',' : '') + $(this).val();
            });
            $(location).attr('href','/admin/recruit/'+$('select[name=recruit_id]').val()+'/job/'+ids+'/detail-excel-download');
        });
        //선택상세 클릭시
        $('.detail-sms-btn').on('click', function() {
            let ids = '';
            $('input[name=id-check]:checked').each(function(index, item) {
                ids += (index>0 ? ',' : '') + $(this).val();
            });
            $(location).attr('href','/admin/recruit/'+$('select[name=recruit_id]').val()+'/job/'+ids+'/detail-sms');
        });
    }

    /* 체크박스 설정 */
    const set_checkbox = () => {
        $('input[name=id-check], #all-check').on('click', function() {
            if ($(this).attr('id') == 'all-check') { //체크박스 전체 선택시
                $('input[name=id-check]').prop('checked', this.checked);
            }

            $('input[name=id-check]:not(:checked)').parents('tr').children('td').removeAttr('style'); //체크박스 미선택시 지정한 css 속성삭제

            if ($('input[name=id-check]:checked').length == 0) { //체크박스 미선택시
                $('.detail-excel-btn, .detail-sms-btn').attr('disabled', true); //선택상세 버튼 비활성화
            } else {
                $('.detail-excel-btn, .detail-sms-btn').attr('disabled', false); //선택상세 버튼 활성화
                $('input[name=id-check]:checked').parents('tr').children('td').attr('style', 'background: #f3f4f6!important'); //체크박스 선택시 배경색상 추가
            }
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
