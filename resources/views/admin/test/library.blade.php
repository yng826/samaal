@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Sample</h1>
@stop

@section('content')
    <div class="container" id="app">
        <div class="row">
            <div class="col-md-12">
                <h3>Library<small>( /resource/js/admin/menu.js )</small></h3>
                <div class="w-100">
                    <h4>Datepicker( jQuery UI )</h4>
                    <input type="text" class="datepicker form-control">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <h3>Vue</h3>
                <example-component></example-component>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <h3>Vue Treeview</h3>
                <draggable-treeview></draggable-treeview>
            </div>
        </div>
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="/kor/css/admin.css">
@stop

@section('js')
    {{-- <script src="/kor/js/vendor.js"></script> --}}
    <script src="/kor/js/admin/menu.js"></script>
@stop
