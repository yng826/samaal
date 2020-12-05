@extends('layouts.default')

@section('contents')
    <div class="work-with-us">
        <h3>SHOW</h3>
        <div>
            <h4>{{ $recruit->title }}</h4>
        </div>
        <div class="button-group">
            <a href="#">입사지원</a>
            <a href="#">입사지원 확인</a>
        </div>
    </div>
@endsection

@section('script')
    @parent
    <script src="{{ asset('js/recruit.js') }}" defer></script>
@endsection
