@extends('layouts.app')

@section('title')
    <title>DogBook - Favoritos</title>
@endsection

@section('css')

@endsection

@section('headJs')
@endsection

@section('content')
<div class="container">
    <div class="row">
        <div class="col-sx-2 col-sm-2 col-md-2 col-lg-2">
            @include('company.list_companies')
        </div>
        <div class="col-sx-8 col-sm-8 col-md-8 col-lg-8">
            <div class="row">
                <h1 class="text-center">-- Favoritos --</h1>
                @if(session('message'))
                    <div class="alert alert-success alert-dismissible" role="alert">
                        {{session('message')}}
                    </div>
                @endif
            </div>
            @include('favorites.favorites_list')


        </div>
        <div class="col-sx-2 col-sm-2 col-md-2 col-lg-2 sidebar1">
            @include('menus.menu_home_pet')
        </div>
    </div>
</div>
@endsection

@section('js')
    <script src="/js/scripts/favorites/favorites.js"></script>
@endsection
