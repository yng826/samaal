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
                    <div class="form-group">
                        <label>채용공고</label>
                        <select class="form-control w-auto" name="job_type">
                            @foreach ($recruits as $recruit)
                            <option value="{{ $recruit->id }}" {{ $recruit->id == $recruit_id ? 'selected' :''}}>
                                {{ '['. $recruit->job_type. '/'. ($recruit->career == 'new' ? '신입' : '경력'). '] '. $recruit->title }}
                            </option>
                            @endforeach
                        </select>
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
                            <td class="text-center">{{ $job->name }}</td>
                            <td class="text-center">{{ $job->status }}</td>
                            <td class="text-center">
                                <a class="btn btn-outline-info btn-xs" href="/admin/recruit/{{ $job->recruit_id }}/job/{{ $job->id }}">상세보기</button>
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
                    {{$jobs->links("pagination::bootstrap-4")}}
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('css')
    <link rel="stylesheet" href="/css/admin.css">
@stop
