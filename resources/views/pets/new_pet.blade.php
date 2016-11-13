@extends('layouts.app')

@section('title')
    <title>DogBook - New Pet</title>
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
            <h2 class="text-center">Nueva Mascota</h2>
        </div>
    </div>
    <div class="row">
        <div class="col-sx-2 col-sm-2 col-md-2 col-lg-2">
            {{-- TODO: Para la publicidad --}}
        </div>
        <div class="col-sx-10 col-sm-10 col-md-10 col-lg-10">
            {{ Form::open(array('method' => 'POST'), array('role' => 'form')) }}
                {{ csrf_field() }}
                <div class="form-group">
                    {{ Form::label('Imagen de perfil')}}
                    <!-- image-preview-filename input [CUT FROM HERE]-->
                    <div class="input-group image-preview">
                        <input type="text" class="form-control image-preview-filename" id="image" name="image" disabled="disabled"> <!-- don't give a name === doesn't send on POST/GET -->
                        <span class="input-group-btn">
                            <!-- image-preview-clear button -->
                            <button type="button" class="btn btn-default image-preview-clear" style="display:none;">
                                <span class="glyphicon glyphicon-remove"></span> Clear
                            </button>
                            <!-- image-preview-input -->
                            <div class="btn btn-default image-preview-input">
                                <span class="glyphicon glyphicon-folder-open"></span>
                                <span class="image-preview-input-title">Browse</span>
                                <input type="file" accept="image/png, image/jpeg, image/gif" name="input-file-preview"/> <!-- rename it -->
                            </div>
                        </span>
                    </div><!-- /input-group image-preview [TO HERE]-->
                </div>
                <div class="form-group">
                  {{ Form::label('name', 'Nombre')}}
                  {{ Form::text('name', null, array('class' => 'form-control')) }}
                </div>
                <div class="form-group">
                  {{ Form::label('age', 'Edad')}}
                  {{ Form::selectRange('age', 1, 20, 1, ['class' => 'form-control']) }}
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