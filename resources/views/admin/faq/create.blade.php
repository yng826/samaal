@extends('adminlte::page')

@section('title', 'FAQ 관리')

@section('content_header')
    <h1>FAQ 관리</h1>
@stop

@section('content')
<div class="container">
    <div class="card">
        <div class="card-header">
            <div class="row">
                <div class="col-12">
                    <h3>FAQ 추가/수정/삭제</h3>
                </div>
            </div>
        </div>
        <form action="{{ $action }}" id="faq-form" class="form col-12 col-lg-6" method="POST">
            @isset ($faq)
                @method('PUT')
            @endisset
            @csrf
            <div class="card-body">
                <div class="row">
                    <div class="col-12">
                        <div class="form-group">
                            <label for="">분류</label>
                            <select class="form-control w-auto" name="category_id">
                                <option value="">::선택::</option>
                                <option value="1" {{ isset($faq) && $faq->category_id == 1 ? 'selected' :''}}>채용절차</option>
                                <option value="2" {{ isset($faq) && $faq->category_id == 2 ? 'selected' :''}}>지원서 작성/수정</option>
                                <option value="3" {{ isset($faq) && $faq->category_id == 3 ? 'selected' :''}}>기타</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="">질문</label>
                            <input type="text" class="form-control" name="question" value="{{$faq->question ?? ''}}">
                        </div>
                        <div class="form-group">
                            <label for="">답변</label>
                            <textarea class="form-control" name="answer" rows="5">{{$faq->answer ?? ''}}</textarea>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-footer">
                <div class="row">
                    <div class="col-12">
                        {{-- 수정일때만 보임 --}}
                        @isset ($faq)
                        <button type="button" class="btn btn-danger text-white del-btn">삭제</button>
                        @endisset

                        <button type="button" class="btn btn-primary text-white add-btn">저장</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>

<script>
const faq_create = () => {

    const init = () => {
        event_listener();
    };

    const event_listener = () => {
        //저장 버튼 클릭시
        $('.add-btn').on('click', function() {
            if (validation()) {
                $('#faq-form').submit();
            }
        });

        //삭제 버튼 클릭시
        $('.del-btn').on('click', function() {
            if (confirm('해당 FAQ를 삭제하시겠습니까?')) {
                $('input[name=_method]').val('DELETE');
                $('#faq-form').submit();
            }
        });
    }

    const validation = () => {
        if ($('select[name=category_id]').val() == '' || $('select[name=category_id]').val() == null) {
            alert('분류를 선택해주세요.');
            return false;

        } else if ($('input[name=question]').val() == '' || $('input[name=question]').val() == null) {
            alert('질문을 입력해주세요.');
            $('input[name=question]').focus();
            return false;

        } else if ($('textarea[name=answer]').val() == '' || $('textarea[name=answer]').val() == null) {
            alert('답변을 입력해주세요.');
            $('textarea[name=answer]').focus();
            return false;

        }
        return true;
    }

    init();
}

window.onload = function(){
    faq_create();
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
