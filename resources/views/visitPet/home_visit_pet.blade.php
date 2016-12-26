@extends('layouts.app')

@section('title')
    <title>DogBook - Home Pet</title>
@endsection

@section('css')
    {{-- <link href="/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="/css/styles/home_pet/home_pet.css" rel="stylesheet">
    <link href="/css/styles/visitPet/visitPet.css" rel="stylesheet"> --}}
@endsection

@section('content')
<div class="container">
    <div class="row">
        <div class="col-sx-12 col-sm-12 col-md-10 col-lg-10 col-md-offset-2 col-lg-offset-2">
            @if(session('message'))
                <div class="alert alert-success alert-dismissible fade in" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <strong>{{session('message')}}</strong>
                </div>
            @endif
        </div>
    </div>
    <div class="row">
        <div class="col-sx-2 col-sm-2 col-md-2 col-lg-2">
            @include('company.list_companies')
        </div>
        <div class="col-sx-8 col-sm-8 col-md-8 col-lg-8">
            @include('menus.menu_visit_pet')
            <div id="visitContent">
                @include('messages.form_message_wall')
                @include('messages.wall_messages')
            </div>
        </div>
        <div class="col-sx-2 col-sm-2 col-md-2 col-lg-2 sidebar1">
            @include('menus.menu_home_pet')
        </div>
    </div>
</div>
@endsection

@section('js')
    <script src="/js/scripts/visit/visit.js"></script>
    <script src="/js/scripts/wall/wall.js"></script>
@endsection
