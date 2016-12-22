@extends('layouts.app')

@section('title')
    <title>DogBook - AdminPanel</title>
@endsection

@section('css')
    {{-- <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet"> --}}
    {{-- <link href="/css/styles/home/home.css" rel="stylesheet"> --}}
@endsection

@section('content')
<div class="container">
    <div class="row">
        <div class="col-sx-12 col-sm-12 col-md-10 col-lg-10 col-md-offset-2 col-lg-offset-2">
            <h1 class="pull-left"> -- Panel de Usuario --</h1>
            @if(session('message'))
                <div class="alert alert-success alert-dismissible" role="alert">
                    {{session('message')}}
                </div>
            @endif
        </div>
    </div>
    <div class="row">
        <div class="col-sx-2 col-sm-2 col-md-2 col-lg-2">
            {{-- TODO: Para la publicidad --}}
        </div>
        <div class="col-sx-7 col-sm-7 col-md-7 col-lg-7">
            @include('pets.home_list_pets')
        </div>
        <div class="col-sx-3 col-sm-3 col-md-3 col-lg-3">
            @include('users.home_info_user')
        </div>
    </div>
</div>
@endsection

@section('js')
    <script src="/js/scripts/home/home.js"></script>
@endsection
