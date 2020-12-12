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
            <div class="speciality-iso__table">
                <h3>품질경영 시스템</h3>
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
                    <tr>
                        <td>ISO 9001 (국문)</td>
                        <td>QMS-2956</td>
                        <td>
                            31995.10.20
                            <div class="file-box">
                                <a href="#" class="btn-download">PDF파일</a>
                                <a href="#" class="btn-preview">미리보기</a>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>ISO 9001 (국문)</td>
                        <td>QMS-2956</td>
                        <td>
                            31995.10.20
                            <div class="file-box">
                                <a href="#" class="btn-download">PDF파일</a>
                                <a href="#" class="btn-preview">미리보기</a>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>ISO 9001 (국문)</td>
                        <td>QMS-2956</td>
                        <td>
                            31995.10.20
                            <div class="file-box">
                                <a href="#" class="btn-download">PDF파일</a>
                                <a href="#" class="btn-preview">미리보기</a>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>ISO 9001 (국문)</td>
                        <td>QMS-2956</td>
                        <td>
                            31995.10.20
                            <div class="file-box">
                                <a href="#" class="btn-download">PDF파일</a>
                                <a href="#" class="btn-preview">미리보기</a>
                            </div>
                        </td>
                    </tr>
                </table>
            </div>

            <div class="speciality-iso__table">
                <h3>환경경영 시스템</h3>
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
                    <tr>
                        <td>ISO 9001 (국문)</td>
                        <td>QMS-2956</td>
                        <td>
                            31995.10.20
                            <div class="file-box">
                                <a href="#" class="btn-download">PDF파일</a>
                                <a href="#" class="btn-preview">미리보기</a>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>ISO 9001 (국문)</td>
                        <td>QMS-2956</td>
                        <td>
                            31995.10.20
                            <div class="file-box">
                                <a href="#" class="btn-download">PDF파일</a>
                                <a href="#" class="btn-preview">미리보기</a>
                            </div>
                        </td>
                    </tr>
                </table>
            </div>

            <div class="speciality-iso__table">
                <h3>식품 안전 경영시스템</h3>
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
                    <tr>
                        <td>ISO 9001 (국문)</td>
                        <td>QMS-2956</td>
                        <td>
                            31995.10.20
                            <div class="file-box">
                                <a href="#" class="btn-download">PDF파일</a>
                                <a href="#" class="btn-preview">미리보기</a>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>ISO 9001 (국문)</td>
                        <td>QMS-2956</td>
                        <td>
                            31995.10.20
                            <div class="file-box">
                                <a href="#" class="btn-download">PDF파일</a>
                                <a href="#" class="btn-preview">미리보기</a>
                            </div>
                        </td>
                    </tr>
                </table>
            </div>



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
        <div class="top-btn">TOP</div>
    </main>
@endsection
