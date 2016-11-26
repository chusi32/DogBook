@extends('layouts.app')

@section('title')
    <title>DogBook - Modify Pedigree Pet</title>
@endsection

@section('css')
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
    <link href="/css/styles/pets/newPet.css" rel="stylesheet">
@endsection

@section('content')
<div class="container">
    <div class="row">
        <div class="col-sx-12 col-sm-12 col-md-12 col-lg-12">
            <h2 class="text-center">Modificar pedigree de {{ $pet->nombre }}</h2>
            @if (!isset($pet->pedigree))
                <h3 class="text text-center text-info">
                    Esta mascota actualmente no tiene pedigree.
                </h3>
            @endif
        </div>
    </div>
    <div class="row">
        <div class="col-sx-2 col-sm-2 col-md-2 col-lg-2">
            {{-- TODO: Para la publicidad --}}
        </div>
        <div class="col-sx-10 col-sm-10 col-md-10 col-lg-10">
            {{ Form::open(array('method' => 'POST', 'files' => true), array('role' => 'form')) }}
                {{ csrf_field() }}
                {{ Form::hidden('idPet', $pet->id, array('id'=>'idPet'))}}
                <div class="form-group">
                    {{ Form::label('nameFather', 'Nombre del padre')}}
                    @if (!isset($pet->pedigree))
                        {{ Form::text('nameFather', null, array('class' => 'form-control', 'required')) }}
                    @else
                        {{ Form::text('nameFather', $pet->pedigree->nombrePadre, array('class' => 'form-control', 'required')) }}
                    @endif

                </div>
                <div class="form-group">
                    {{ Form::label('nameMother', 'Nombre de la madre')}}
                    @if (!isset($pet->pedigree))
                        {{ Form::text('nameMother', null, array('id' => 'nameMother', 'class' => 'form-control', 'required')) }}
                    @else
                        {{ Form::text('nameMother', $pet->pedigree->nombreMadre, array('id' => 'nameMother', 'class' => 'form-control', 'required')) }}
                    @endif
                </div>
                <div class="form-group">
                    {{ Form::label('description', 'Descripción del pedegree')}}
                    @if (!isset($pet->pedigree))
                        {{ Form::textarea('description', null, ['id' => 'description','class' => 'form-control', 'required']) }}
                    @else
                        {{ Form::textarea('description', $pet->pedigree->detalles, ['id' => 'description','class' => 'form-control', 'required']) }}
                    @endif
                </div>
                {{ Form::submit('Enviar')}}
            {{ Form::close()}}
        </div>
    </div>
</div>
@endsection

@section('js')
    <script src="/js/scripts/pets/newPet.js"></script>
@endsection
