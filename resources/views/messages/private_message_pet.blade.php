@extends('layouts.app')

@section('title')
    <title>DogBook - Mensajes privados</title>
@endsection

@section('css')
    {{-- <link href="/bootstrap/css/bootstrap.min.css" rel="stylesheet"> --}}
    {{-- <link href="/css/styles/wall/wall.css" rel="stylesheet"> --}}
@endsection

@section('content')
<div class="container">
    <div class="row">
        <div class="col-sx-2 col-sm-2 col-md-2 col-lg-2">
            @include('company.list_companies')
        </div>
        <div class="col-sx-8 col-sm-8 col-md-8 col-lg-8">
            <div class="row">
                <h1 class="text-center">-- Mensajes privados --</h1>
                @if(isset($message))
                    <div class="alert alert-success alert-dismissible" role="alert">
                        {{$message}}
                    </div>
                @endif
            </div>
            @include('messages.list_private_messages_pet')
        </div>
        <div class="col-sx-2 col-sm-2 col-md-2 col-lg-2 sidebar1">
            @include('menus.menu_home_pet')
        </div>
    </div>
</div>
@endsection

@section('js')
    <script src="/js/scripts/privateMessage/privateMessage.js"></script>
@endsection
