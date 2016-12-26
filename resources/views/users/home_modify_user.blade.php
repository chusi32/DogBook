@extends('layouts.app')

@section('title')
    <title>DogBook - Modificar usuario</title>
@endsection

@section('css')
    {{-- <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet"> --}}
    {{-- <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css"> --}}
    {{-- <link href="/css/styles/pets/newPet.css" rel="stylesheet"> --}}
@endsection

@section('content')
<div class="container">
    <div class="row">
        <div class="col-sx-12 col-sm-12 col-md-10 col-lg-10 col-md-offset-2 col-lg-offset-2">
            <h1 class="pull-left">Modificar datos de usuario</h1>
        </div>
    </div>
    <div class="row">
        <div class="col-sx-2 col-sm-2 col-md-2 col-lg-2">
            {{-- TODO: Para la publicidad --}}
        </div>
        <div class="col-sx-10 col-sm-10 col-md-10 col-lg-10">
            {{ Form::open(array('method' => 'POST'), array('role' => 'form')) }}
                {{ csrf_field() }}
                {{ Form::hidden('id', $user['id']) }}
                <div class="form-group">
                  {{ Form::label('name', 'Nombre')}}
                  {{ Form::text('name', $user['name'], array('class' => 'form-control', 'required')) }}
                  @if ($errors->has('name'))
                      <span class="help-block">
                          <strong>{{ $errors->first('name') }}</strong>
                      </span>
                  @endif
                </div>
                <div class="form-group">
                  {{ Form::label('surname', 'Apellidos')}}
                  {{ Form::text('surname', $user['surname'], array('class' => 'form-control', 'required')) }}
                  @if ($errors->has('surname'))
                      <span class="help-block">
                          <strong>{{ $errors->first('surname') }}</strong>
                      </span>
                  @endif
                </div>
                {{-- <div class="form-group">
                  {{ Form::label('user', 'Usuario')}}
                  {{ Form::text('user', $user['user'], array('class' => 'form-control', 'required')) }}
                </div>
                <div class="form-group">
                  {{ Form::label('email', 'Email')}}
                  {{ Form::text('email', $user['email'], array('class' => 'form-control', 'required')) }}
                  @if ($errors->has('email'))
                      <span class="help-block">
                          <strong>{{ $errors->first('email') }}</strong>
                      </span>
                  @endif
                </div> --}}
                {{ Form::submit('Guardar', array('class' => 'btn btn-custom pull-right')) }}
            {{ Form::close()}}
            <a href="{{ url('/goBack')}}">
                <button class="btn btn-danger pull-right">Cancelar</button>
            </a>
        </div>
    </div>
</div>
@endsection

@section('js')
    <script src="/js/scripts/pets/newPet.js"></script>
@endsection
