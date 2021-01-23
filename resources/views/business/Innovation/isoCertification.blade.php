@php
    $bodyClass = 'business';
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
                    <a href="/eng/business/innovation/rnd">R&D</a>
                </li>
                <li class="tab-item on">
                    <a href="/eng/business/innovation/iso_certification">Certifications</a>
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
                        <th>Certification Standard</th>
                        <th>Certification Number</th>
                        <th>Initial Certification Date</th>
                    </tr>
                    @foreach ($certifications as $certification)
                    @if ($type->type == $certification->type)
                        <tr>
                            <td>{{ $certification->standard }}</td>
                            <td>{{ $certification->number }}</td>
                            <td>
                                {{ $certification->first_date }}
                                <div class="file-box">
                                    <a href="/eng/business/innovation/iso_certification/file-download?id={{ $certification->id }}" class="btn-download">PDF파일</a>
                                    <a href="/eng/storage/{{ $certification->img_file_path }}" class="btn-preview">미리보기</a>
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
