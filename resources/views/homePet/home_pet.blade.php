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
        <div class="col-sx-7 col-sm-7 col-md-7 col-lg-7">
            {{-- @include('') --}}
        </div>
        <div class="col-sx-3 col-sm-3 col-md-3 col-lg-3 sidebar1">
            @include('menus.menu_home_pet')
        </div>
    </div>
</div>

        {{-- <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    You are logged in! id usuario
                </div>


                <div>
                    @foreach($id as $item )
                        {
                            <label>{{ $item['nombre'] }}</label>
                        }
                    @endforeach
                </div>


            </div>
        </div> --}}

    {{-- </div> --}}

@endsection

@section('js')
    <script src="/js/scripts/home/home.js"></script>
@endsection
