@extends('layouts.default')

@section('contents')
    <div class="work-with-us">
        <h3>LIST</h3>
        <div>
            @foreach ($recruits as $item)
            <div class="recruit-item">
                <h4>{{ $item->title }}</h4>
                <hr>
                <div class="keywords">
                    <ul>
                        @foreach ($item->keywords as $keyword)
                        <li>#{{$keyword->keyword}}</li>
                        @endforeach
                    </ul>
                </div>
                <div class="date-range">
                    {{ $item->start_date }} ~ {{ $item->end_date }}
                </div>
            </div>
            @endforeach
        </div>
    </div>
@endsection
