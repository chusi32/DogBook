@extends('layouts.app')

@section('title')
    <title>DogBook - Home Pet</title>
@endsection

@section('css')
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="/css/styles/home_pet/home_pet.css" rel="stylesheet">
@endsection

@section('content')
<div class="container">
    <div class="row">
        <div class="col-sx-12 col-sm-12 col-md-10 col-lg-10 col-md-offset-2 col-lg-offset-2">
            <h2 class="text-center">Panel de Usuario</h2>
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
        <div class="col-sx-8 col-sm-8 col-md-8 col-lg-8">
            <div class="comments-list">
                <div class="media">
                    <p class="pull-right"><small>5 days ago</small></p>
                    <a class="media-left" href="#">
                        <img src="http://lorempixel.com/40/40/people/1/">
                    </a>
                    <div class="media-body">
                          <h4 class="media-heading user_name">Baltej Singh</h4>
                          Wow! this is really great.
                          <p><small><a href="">Like</a> - <a href="">Share</a></small></p>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sx-2 col-sm-2 col-md-2 col-lg-2 sidebar1">
            @include('menus.menu_home_pet')
        </div>
    </div>
</div>
@endsection

@section('js')
    <script src="/js/scripts/home/home.js"></script>
@endsection
