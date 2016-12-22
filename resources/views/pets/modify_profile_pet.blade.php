@extends('layouts.app')

@section('title')
    <title>DogBook - Modify image profile</title>
@endsection

@section('css')
    {{-- <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet"> --}}
    {{-- <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css"> --}}
    {{-- <link href="/css/styles/pets/newPet.css" rel="stylesheet"> --}}
    {{-- <link href="/css/styles/application.css" rel="stylesheet"> --}}
@endsection

@section('content')
<div class="container">
    <div class="row">
        <div class="col-sx-12 col-sm-12 col-md-10 col-lg-10 col-md-offset-2 col-lg-offset-2">
            <h1 class="pull-left">-- Modificar imagen de perfil de {{ $pet -> nombre }} --</h1>
        </div>
    <div class="row">
        <div class="col-sx-2 col-sm-2 col-md-2 col-lg-2">
            {{-- TODO: Para la publicidad --}}
        </div>
        <div class="col-sx-10 col-sm-10 col-md-10 col-lg-10">
        {{ Form::open(array('route' => 'modifyProfilePet', 'method' => 'POST', 'files' => true), array('role' => 'form')) }}
            {{-- {{ csrf_field() }} --}}
            {{ Form::hidden('id', $pet -> id, array('id' => 'id')) }}
            {{ Form::label('Imagen de perfil')}}
            <!-- image-preview-filename input [CUT FROM HERE]-->
            <div class="input-group image-preview">
                <input type="text" class="form-control image-preview-filename" disabled="disabled"> <!-- don't give a name === doesn't send on POST/GET -->
                <span class="input-group-btn">
                    <!-- image-preview-clear button -->
                    <button type="button" class="btn btn-default image-preview-clear" style="display:none;">
                        <span class="glyphicon glyphicon-remove"></span> Clear
                    </button>
                    <!-- image-preview-input -->
                    <div class="btn btn-default image-preview-input">
                        <span class="glyphicon glyphicon-folder-open"></span>
                        <span class="image-preview-input-title">Browse</span>
                        <input type="file" accept="image/png, image/jpeg, image/gif" id="image" name="image"/> <!-- rename it -->
                    </div>
                </span>
            </div>
            @if ($errors->has('image'))
                <span class="help-block">
                    <strong class="alert-danger text-danger">{{ $errors->first('image') }}</strong>
                </span>
            @endif
            <div class="form-group">
                {{ Form::submit('Guardar', array('class' => 'btn btn-custom pull-right')) }}
            </div>
        {{ Form::close()}}
        </div>
    </div>
</div>
@endsection

@section('js')
    <script src="/js/scripts/pets/modifyPet.js"></script>
@endsection
