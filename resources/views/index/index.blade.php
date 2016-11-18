@extends('layouts.master')

@section('title', '任务清单')

@section('stylesheets')
    <link rel="stylesheet" href="{{ asset('css/app.css') }}" media="screen" title="no title">
@endsection

@section('body')
    <div id="app">
        <example></example>
    </div>
@endsection

@section('javascripts')
    <script src="{{ asset('js/app.js') }}" charset="utf-8"></script>
@endsection
