@extends('layouts.app')

@section('title')
    <title>DogBook - Buscador</title>
@endsection

@section('css')
    <link href="/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="/css/styles/gallery/gallery.css" rel="stylesheet">
@endsection

@section('headJs')
@endsection

@section('content')
<div class="container">
    <div class="row">
        <div class="col-sx-12 col-sm-12 col-md-10 col-lg-10 col-md-offset-2 col-lg-offset-2">
            <h2 class="text-center">Buscador</h2>
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
            {{ Form::open() }}
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                            <div class="form-group">
                                {{ Form::text('name', null, array('class' => 'form-control', 'placeholder'=>'Nombre de mascota')) }}
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                            <button type="button" class="btn btn-info" title="Buscar" id="btnSearch">
                                <span class="glyphicon glyphicon-search"></span>
                            </button>
                            <button type="button" class="btn btn-info" title="Desplegar filtros" id="btnFilter">
                                <span class="glyphicon glyphicon glyphicon-filter"></span>
                            </button>

                        </div>
                    </div>
                    <div class="row jumbotron" id="filters">
                        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                            <div class="form-group">
                                {{ Form::label('Sexo')}}
                                {{ Form::checkbox('chkSex', null, null, ['id' => 'chkSex', 'class' => 'field']) }}
                            </div>
                            <div class="form-group" id="divSex">
                                {{ Form::radio('sex', 'Asma', false, array('id'=>'male')) }}Macho
                                {{ Form::radio('sex', 'Asma', false, array('id'=>'female')) }}Hembra
                            </div>
                            <div class="form-group">
                                {{ Form::label('Provincia y Localidad')}}
                                {{ Form::checkbox('chkProvince', null, null, ['id' => 'chkProvince', 'class' => 'field']) }}
                            </div>
                            <div class="form-group" id="divProvince">
                                {{ Form::select('province',$provinces, null,['id' => 'province','class' => 'form-control']) }}
                                {{ Form::select('location', ['placeholder' => 'Seleccione'], null, ['id' => 'location', 'class' => 'form-control']) }}
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                            <div class="form-group">
                                {{ Form::label('Raza')}}
                                {{ Form::checkbox('chkBreed', null, null, ['id' => 'chkBreed', 'class' => 'field']) }}
                            </div>
                            <div class="form-group" id="divBreed">
                                {{ Form::select('breed',$breeds, null,['id' => 'breed','class' => 'form-control']) }}
                            </div>
                            <div class="form-group">
                                <button type="button" class="btn btn-danger pull-right" title="Eliminar filtros" id="btnRemoveFilters">Eliminar filtros</button>
                            </div>
                        </div>
                    </div>
                </div>




            {{ Form::close() }}
        </div>
        <div class="col-sx-2 col-sm-2 col-md-2 col-lg-2 sidebar1">
            @include('menus.menu_home_pet')
        </div>
    </div>
</div>
@endsection

@section('js')
    <script src="/js/scripts/browser/browser.js"></script>
@endsection
