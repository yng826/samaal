@php
    $bodyClass = 'business';
@endphp

@extends('layouts.default')

@section('contents')
    <main class="contents-wrap speciality-iso">
        <div class="contents-wrap__title speciality-iso__title">
            <h2>
                인증 현황
            </h2>
        </div>
        <div class="speciality-iso__section">
            @foreach ($types as $type)
            <div class="speciality-iso__table">
                <h3>{{ $type->type }}</h3>
                <table>
                    <colgroup>
                        <col width="30%">
                        <col width="25%">
                        <col width="auto">
                    </colgroup>
                    <tr>
                        <th>인증규격</th>
                        <th>인증번호</th>
                        <th>최초인증일</th>
                    </tr>
                    @foreach ($certifications as $certification)
                    @if ($type->type == $certification->type)
                        <tr>
                            <td>{{ $certification->standard }}</td>
                            <td>{{ $certification->number }}</td>
                            <td>
                                {{ $certification->first_date }}
                                <div class="file-box">
                                    <a href="/business/innovation/iso_certification/file-download?id={{ $certification->id }}" class="btn-download">PDF파일</a>
                                    <a href="/storage/{{ $certification->img_file_path }}" class="btn-preview">미리보기</a>
                                </div>
                            </td>
                        </tr>
                    @endif
                    @endforeach
                </table>
            </div>
            @endforeach
        </div>
        <div class="top-btn">TOP</div>
    </main>
@endsection
