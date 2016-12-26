@extends('layouts.app')

@section('title')
    <title>DogBook - Modify Pet</title>
@endsection

@section('css')
    {{-- <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet"> --}}
    {{-- <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css"> --}}
    {{-- <link href="/css/styles/pets/newPet.css" rel="stylesheet"> --}}
@endsection

@section('content')
<div class="container">
    <div class="row">
        <div class="col-sx-2 col-sm-2 col-md-2 col-lg-2">
            @include('company.list_companies')
        </div>
        <div class="col-sx-10 col-sm-10 col-md-10 col-lg-10">
            <div class="row">
                <div>
                    <h1 class="text-center">Modificar mascota {{ $pet -> nombre }}</h1>
                </div>
            </div>
            {{ Form::open(array('route' => 'updatePet', 'method' => 'POST', 'files' => true), array('role' => 'form')) }}
                {{ csrf_field() }}
                {{ Form::hidden('id', $pet -> id, array('id' => 'id')) }}
                <div class="form-group">
                  {{ Form::label('name', 'Nombre')}}
                  {{ Form::text('name', $pet -> nombre, array('class' => 'form-control', 'required')) }}
                </div>
                @if ($errors->has('name'))
                    <span class="help-block">
                        <strong class="alert-danger text-danger">{{ $errors->first('name') }}</strong>
                    </span>
                @endif
                <div class="form-group">
                  {{ Form::label('age', 'Edad')}}
                  {{ Form::selectRange('age', 1, 20, $pet -> edad, ['class' => 'form-control']) }}
                </div>
                @if ($errors->has('age'))
                    <span class="help-block">
                        <strong class="alert-danger text-danger">{{ $errors->first('age') }}</strong>
                    </span>
                @endif
                <div class="form-group">
                  {{ Form::label('sex', 'Sexo')}}
                  {{ Form::select('sex', ['macho' => 'Macho', 'hembra' => 'Hembra'], $pet -> sexo, ['class' => 'form-control']) }}
                </div>
                @if ($errors->has('sex'))
                    <span class="help-block">
                        <strong class="alert-danger text-danger">{{ $errors->first('sex') }}</strong>
                    </span>
                @endif
                <div class="form-group">
                  {{ Form::label('province', 'Provincia')}}
                  {{ Form::select('province',$provinces, $pet -> idProvincia,['class' => 'form-control']) }}
                </div>
                @if ($errors->has('province'))
                    <span class="help-block">
                        <strong class="alert-danger text-danger">{{ $errors->first('province') }}</strong>
                    </span>
                @endif
                <div class="form-group">
                  {{ Form::label('location', 'Localidad')}}
                  {{ Form::select('location', ['placeholder' => 'Seleccione'], null, ['class' => 'form-control']) }}
                </div>
                @if ($errors->has('location'))
                    <span class="help-block">
                        <strong class="alert-danger text-danger">{{ $errors->first('location') }}</strong>
                    </span>
                @endif
                <div class="form-group">
                  {{ Form::label('breed', 'Raza')}}
                  {{ Form::select('breed',$breeds, null,['id' => 'breed','class' => 'form-control']) }}
                </div>
                @if ($errors->has('breed'))
                    <span class="help-block">
                        <strong class="alert-danger text-danger">{{ $errors->first('breed') }}</strong>
                    </span>
                @endif
                <a href="{{ URL::previous() }}" class="btn btn-danger pull-right">Cancelar</a>
                {{ Form::submit('Guardar', array('class' => 'btn btn-custom pull-right')) }}
            {{ Form::close()}}
        </div>
    </div>
</div>
@endsection

@section('js')
    <script src="/js/scripts/pets/modifyPet.js"></script>
@endsection
