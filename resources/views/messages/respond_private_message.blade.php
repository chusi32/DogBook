@extends('layouts.app')

@section('title')
    <title>DogBook - Responder mensaje</title>
@endsection

@section('css')
    {{-- <link href="/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="/css/styles/wall/wall.css" rel="stylesheet"> --}}
@endsection

@section('content')
<div class="container">
    <div class="row">
        <div class="col-sx-2 col-sm-2 col-md-2 col-lg-2">
            @include('company.list_companies')
        </div>
        <div class="col-sx-8 col-sm-8 col-md-8 col-lg-8">
            <div class="row">
                <h1 class="text-center"> -- Mensaje privado --</h1>
                @if(session('message'))
                    <div class="alert alert-success alert-dismissible" role="alert">
                        {{session('message')}}
                    </div>
                @endif
            </div>
            <h3 class="text-center title3th">Responder a {{$petReceived->nombre}}</h3>
            {{-- Formulario para responder el mensaje --}}
            {{ Form::open(array('route' => 'respondPrivateMessage', 'method' => 'POST', 'files' => true, 'id' => 'formPrivateMessage'), array('role' => 'form')) }}
                {{ Form::hidden('idPetReceived', $petReceived->id, array('id' => 'idPetReceived')) }}
                {{ Form::textarea('message', null, ['id' => 'message','class' => 'form-control', 'placeholder'=>'Escriba el mensaje', 'rows'=>'7', 'required', 'maxlength'=>'500']) }}
                {{ Form::submit('Enviar', array('id'=>'btnSendPrivateMessage', 'class'=>'btn btn-custom pull-right'))}}
            {{ Form::close()}}
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
