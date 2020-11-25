@extends('layouts.admin')
@section('content')

<h1>뉴스 관리</h1>
<div class="card container">
    <div class="row justify-content-center">
        <table class="table" style="table-layout: fixed;">

            <tr>
                <th class="text-center" style="width: 80px;">idx</th>
                <th class="text-center">제목</th>
                <th class="text-center">내용</th>
                <th class="text-center">이미지 첨부파일</th>
                <th class="text-center">URL</th>
                <th class="text-center">사용여부</th>
                <th class="text-center">등록/수정일</th>
                <th class="text-center" colspan="2" style="width: 120px;">관리</th>
            </tr>

            @foreach ($infos as $info)
            <tr>
                <td class="text-center">{{ $info->idx }}</td>
                <td class="text-center text-ov">{{ $info->title }}</td>
                <td class="text-center text-ov" style="overflow: hidden;text-overflow: ellipsis;white-space: nowrap;">{{ $info->contents }}</td>
                <td class="text-center text-ov">{{ $info->img_url }}</td>
                <td class="text-center text-ov">{{ $info->url }}</td>
                <td class="text-center text-ov">{{ $info->use_yn == 'y' ? '사용' :'미사용' }}</td>
                <td class="text-center text-ov">{{ $info->updated_at ?? $info->created_at}}</td>
                <td class="text-center" ><a class="btn btn-outline-info btn-xs" href="/admin/news_info/{{$info->idx}}/edit">수정</button></td>
                <td class="text-center"><a class="btn btn-outline-info btn-xs news-del-btn" href="/admin/news_info/{{$info->idx}}">삭제</button></td>

            </tr>
            @endforeach
        </table>
        <div class="col-md-12 text-right">
            <a class="btn btn-primary text-white" href="/admin/news_info/create">뉴스 추가</a>
        </div>
    </div>
</div>

<script>
    const menu_list = () => {

        const init = () => {
            event_listener();
        };

        const event_listener = () => {
            //순서저장 버튼 클릭시
            $('.news-del-btn').on('click', function() {
                if (confirm('해당 리스트를 삭제하시겠습니까?')) {


                }
            });
        }

        init();
    }

    window.onload = function(){
        menu_list();
    }
    </script>
    @endsection

    @section('css')
        <link rel="stylesheet" href="/css/admin.css">
    @stop

    @section('js')
        {{-- <script src="{{ mix('/js/vendor.js') }}"></script> --}}
        <script src="{{ mix('/js/admin/menu.js') }}"></script>
    @stop
