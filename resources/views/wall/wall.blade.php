@extends('layouts.app')

@section('title')
    <title>DogBook - Muro</title>
@endsection

@section('css')
    {{-- <link href="/bootstrap/css/bootstrap.min.css" rel="stylesheet"> --}}
    {{-- <link href="/css/styles/wall/wall.css" rel="stylesheet"> --}}
@endsection

@section('content')
<div class="container">
    <div class="row">
        <div class="col-sx-12 col-sm-12 col-md-10 col-lg-10 col-md-offset-2 col-lg-offset-2">
            {{-- <h1 class="pull-left">-- Muro --</h1>
            @if(session('message'))
                <div class="alert alert-success alert-dismissible" role="alert">
                    {{session('message')}}
                </div>
            @endif --}}
        </div>

    <div class="row">
        <div class="col-sx-2 col-sm-2 col-md-2 col-lg-2">
            {{-- TODO: Para la publicidad --}}
            @include('company.list_companies')
        </div>
        <div class="col-sx-8 col-sm-8 col-md-8 col-lg-8">
            <h1 class="text-center">-- Muro --</h1>
            @if(session('message'))
                <div class="alert alert-success alert-dismissible" role="alert">
                    {{session('message')}}
                </div>
            @endif
            @include('messages.form_message_wall')
            @include('messages.wall_messages')
        </div>
        <div class="col-sx-2 col-sm-2 col-md-2 col-lg-2 sidebar1">
            @include('menus.menu_home_pet')
        </div>
    </div>
</div>
@endsection

@section('js')
    <script src="/js/scripts/wall/wall.js"></script>
@endsection
