@extends('layouts.workWithUs')

@section('title', '지원서')

@section('main')
    <main id="app" class="{{$pageClass}} contents-wrap">
        <div class="contents-wrap__title {{$pageClass}}__title">
            <h2>지원정보 확인 및 수정</h2>
        </div>
        <div class="contents-wrap__section {{$pageClass}}__contents">
            <individual-info-component index={{$id}}></individual-info-component>
            {{-- <div class="form-container" title="기본정보">
                <form action="/api/job/{{ $item->id ?? ''}}" method="post">
                    <div class="form-wrap">
                        <h3>인적사항</h3>
                        <div class="form-group">
                            <label for="">성명(한글)</label>
                            <input type="text" value="{{ $item->name ??'' }}">
                        </div>
                        <div class="form-group">
                            <label for="">성명(영문)</label>
                            <input type="text" value="{{ $item->name_en ??'' }}">
                        </div>
                        <div class="form-group">
                            <label for="">생년월일</label>
                            <input type="text" value="{{ $item->birth_day ?? '' }}">
                        </div>
                        <div class="form-group">
                            <label for="">휴대폰번호</label>
                            <input type="text" value="{{ $item->phone_decrypt ?? '' }}">
                        </div>
                        <div class="form-group">
                            <label for="">E-MAIL</label>
                            <input type="text" value="{{ $item->email_decrypt }}">
                        </div>
                        <div class="form-group">
                            <label for="">현거주지</label>
                            <input type="text" value="{{ $item->address_1 ?? '' }}">
                            <input type="text" value="{{ $item->address_2 ?? '' }}">
                        </div>
                    </div>
                    <div class="form-wrap">
                        <h3>사진업로드</h3>
                        <div class="form-group">
                            <figure class="picture">
                                <img src="https://dummyimage.com/200x300/000/fff" alt="">
                            </figure>
                            <button class="picture-upload">이미지 업로드</button>
                        </div>
                    </div>
                    <div class="button-group">
                        <button>저장</button>
                    </div>
                </form>
                <hr>
                <form action="/api/job/{{ $item->id }}/edu" method="post">
                    <input type="hidden" name="hello" value="world">
                    <div class="form-group">
                        <label for="">학교명</label>
                        <input type="text" name="school_name" value="학교1">
                    </div>
                    <button class="submit">전송</button>
                </form>
            </div> --}}
        </div>
    </main>
@endsection

{{-- <script src="{{ mix('/js/admin/manifest.js') }}"></script> --}}
<script src="{{ mix('/js/job.js') }}"></script>
