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
            <table class="speciality-iso__table">
                <tr>
                    <th>구분</th>
                    <th>인증규격</th>
                    <th>인증번호</th>
                    <th>최초인증일</th>
                </tr>
                @foreach ($certifications as $certification)
                <tr>
                    @if ($loop->first || $certification->type != $certifications[$loop->index - 1]->type)
                        <td class="sort" rowspan="{{ $certifications->where('type', $certification->type)->count() }}">
                            {{ $certification->type }}
                        </td>
                    @endif
                    <td>{{ $certification->standard }}</td>
                    <td>{{ $certification->number }}</td>
                    <td class="text-center">
                        {{ $certification->first_date }}
                        <div class="file-box">
                            <a href="/business/innovation/iso_certification/file-download?id={{ $certification->id }}" class="btn-download">[PDF파일]</a>
                            <a href="/storage/{{ $certification->img_file_path }}" class="btn-preview"></a>
                        </div>
                    </td>
                </tr>
                @endforeach
            </table>
        </div>
    </main>
@endsection
