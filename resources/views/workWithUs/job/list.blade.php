@extends('layouts.workWithUs')

@section('title', '지원내역')

@section('main')
    <main class="{{$pageClass}} contents-wrap">
        <div class="contents-wrap__title {{$pageClass}}__title">
            <h2>지원내역 확인 및 수정</h2>
        </div>
        <div class="contents-wrap__section {{$pageClass}}__contents">
            <h3>{{ Session::get('email') }}</h3>
            @if ( Session::has('email'))
            <table class="table">
                <tr>
                    <th>공고명</th>
                    <th>접수기한</th>
                    <th>지원정보</th>
                    <th>상태</th>
                </tr>
                @foreach ($items as $item)
                <tr>
                    <td>{{ $item->title }}</td>
                    <td>{{ $item->end_date }}</td>
                    <td>
                        <a href="/work-with-us/job/{{ $item->id}}" class="btn">수정</a>
                        <a href="#" class="btn">삭제</a>
                    </td>
                    <td>{{ $status[$item->status] }}</td>
                </tr>
                @endforeach
            </table>
            @else
            <form action="/work-with-us/job/check" method="POST">
                {{-- @method('PUT') --}}
                @csrf
                <div class="form-group">
                    <label for="name">성명</label>
                    <input type="text" name="name" id="name">
                </div>
                <div class="form-group">
                    <label for="email">이메일</label>
                    <input type="text" name="email" id="email">
                    @
                    <select name="email_vendor" id="">
                        <option value="">이메일 선택</option>
                        <option>naver.com</option>
                        <option>daum.net</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="password">비밀번호</label>
                    <input type="password" name="password" id="password">
                </div>
                <div class="form-group">
                    <a href="">비밀번호를 잊으셨나요?</a>
                </div>
                <button type="submit">확인하기</button>
            </form>
            @endif
        </div>
    </main>
@endsection
