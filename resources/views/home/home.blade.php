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



    </div>
    <div class="row">
        <div class="col-sx-2 col-sm-2 col-md-2 col-lg-2">
            @include('company.list_companies')
        </div>
        <div class="col-sx-10 col-sm-10 col-md-10 col-lg-10">
            <div class="row">
                <h1 class="text-center"> -- Panel de Usuario --</h1>
                @if(session('message'))
                    <div class="alert alert-success alert-dismissible" role="alert">
                        <b>{{session('message')}}</b>
                    </div>
                @endif
            </div>
            @include('pets.home_list_pets')
            @include('users.home_info_user')
        </div>
        {{-- <div class="col-sx-3 col-sm-3 col-md-3 col-lg-3">
        </div> --}}
    </div>
</div>
@endsection

@section('js')
    <script src="/js/scripts/home/home.js"></script>
@endsection
