<!-- Stored in resources/views/child.blade.php -->

{{-- @extends('layouts.main') --}}
@extends('aboutUs.aboutCi')

@section('title', 'Page Title')

@section('sidebar')
    @parent

    <p>This is appended to the master sidebar.</p>
@endsection

@section('content')
    <p>This is my body content.</p>
@endsection
