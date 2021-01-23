@extends('adminlte::page')

@section('title', '채용 지원자 관리')

@section('content_header')
    <h1>채용 지원자 관리</h1>
@stop

@section('content')
<div class="container container-job-list">
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
                            <button type="button" class="btn btn-success text-white ml-1 detail-excel-btn" disabled>선택 Excel</button>
                            <button type="button" class="btn btn-warning ml-1 detail-sms-btn" disabled>선택 문자전송</button>
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
                                    <a class="btn btn-outline-info btn-xs" href="/eng/admin/recruit/{{ $job->recruit_id }}/job/{{ $job->id }}">상세보기</a>
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
</script>
@endsection

@section('css')
    <link rel="stylesheet" href="/eng/css/admin.css">
@stop

@section('js')
    <script src="/eng/js/admin/manifest.js"></script>
    <script src="/eng/js/admin/vendor.js"></script>
    <script src="/eng/js/admin/recruit.js"></script>
@stop
