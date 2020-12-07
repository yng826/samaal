@extends('layouts.default')

@section('contents')
    <main class="contents-wrap">
        <div class="contents-wrap__title pd-20">
        <h2 class="about-ir__title">
            인증 현황
        </h2>
        </div>
        <div class="contents-wrap__section">
            <table>
                <tr>
                    <th>구분</th>
                    <th>인증규격</th>
                    <th>인증번호</th>
                    <th>최초인증일</th>
                </tr>
                @foreach ($certifications as $certification)
                <tr>
                    <td>{{ $certification->type }}</td>
                    <td>{{ $certification->standard }}</td>
                    <td>{{ $certification->number }}</td>
                    <td class="text-center">
                        {{ $certification->first_date }}
                        <a href="/business/speciality/iso_certification/file-download?id={{ $certification->id }}">[PDF파일]</a>
                        <img src="/storage/{{ $certification->img_file_path }}" height="50" />
                    </td>
                </tr>
                @endforeach
            </table>
        </div>
    </main>
@endsection
