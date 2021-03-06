@php
    $bodyClass = 'business';
    $meta_title = '삼아알미늄 | 이노베이션 | 인증현황';
    $meta_desc = '인증현황';
@endphp

@extends('layouts.default')

@section('contents')
    <main class="contents-wrap speciality-iso">
        <div class="contents-wrap__title speciality-iso__title">
            <h2>
                Innovation
            </h2>
        </div>
        <div class="contents-wrap__tab speciality-iso__tab">
            <ul>
                <li class="tab-item">
                    <a href="/kor/business/innovation/rnd">R&D</a>
                </li>
                <li class="tab-item on">
                    <a href="/kor/business/innovation/iso_certification">인증현황</a>
                </li>
            </ul>
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
                                    <a href="/kor/business/innovation/iso_certification/file-download?id={{ $certification->id }}" class="btn-download">PDF파일</a>
                                    <a href="/kor/storage/{{ $certification->img_file_path }}" class="btn-preview">미리보기</a>
                                </div>
                            </td>
                        </tr>
                    @endif
                    @endforeach
                </table>
            </div>
            @endforeach
        </div>
    </main>
@endsection
