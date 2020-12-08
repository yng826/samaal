@extends('layouts.default')

@section('contents')
    <div id="fullpage" class="fp-destroyed">
        <div class="section">Some section</div>
        <div class="section">Some section</div>
        <div class="section">Some section</div>
        <div class="section">Some section</div>
    </div>
@endsection

@section('script')
    @parent
    <script src="{{ asset('/js/siteIntro.js') }}"></script>
@endsection
