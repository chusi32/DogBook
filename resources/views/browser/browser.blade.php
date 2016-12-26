@extends('layouts.app')

@section('title')
    <title>DogBook - Buscador</title>
@endsection

@section('css')
    {{-- <link href="/bootstrap/css/bootstrap.min.css" rel="stylesheet"> --}}
    {{-- <link href="/css/styles/browser/browser.css" rel="stylesheet"> --}}
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
                <h1 class="text-center">-- Buscador --</h1>
                @if(session('message'))
                    <div class="alert alert-success alert-dismissible" role="alert">
                        {{session('message')}}
                    </div>
                @endif
            </div>
            {{-- Formulario buscador --}}
            {{ Form::open(array('route' => 'search', 'method' => 'POST', 'id' => 'formBrowser'), array('role' => 'form')) }}
                <input type="hidden" name="_token" value="{{{ csrf_token() }}}" />
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                            <div class="form-group">
                                <div class="input-group">
                                    {{ Form::text('name', null, array('id'=>'name', 'class' => 'form-control', 'placeholder'=>'Nombre de mascota')) }}
                                    <span class="input-group-addon" style="cursor:pointer;">X</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                            <button type="button" class="btn btn-custom" title="Buscar" id="btnSearch">
                                <span class="glyphicon glyphicon-search"></span>
                            </button>
                            <button type="button" class="btn btn-custom" title="Desplegar filtros" id="btnFilter">
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
                                {{ Form::select('sex', ['macho' => 'Macho', 'hembra' => 'Hembra'], null, ['class' => 'form-control', 'id' => 'sex']) }}
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
            {{-- Fin formulario buscador --}}
            <div id="searchResult">
            </div>

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
