@extends('layouts.app')

@section('title')
    <title>DogBook - Galeria</title>
@endsection

@section('css')
    <link href="/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="/css/styles/gallery/gallery.css" rel="stylesheet">
@endsection

@section('headJs')
    <script src="//cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.js"></script>    
@endsection

@section('content')
<div class="container">
    <div class="row">
        <div class="col-sx-12 col-sm-12 col-md-10 col-lg-10 col-md-offset-2 col-lg-offset-2">
            <h2 class="text-center">Galeria</h2>
            @if(session('message'))
                <div class="alert alert-success alert-dismissible" role="alert">
                    {{session('message')}}
                </div>
            @endif
        </div>
        {{-- Formulario subir imagen --}}
        <div class="col-sx-12 col-sm-12 col-md-8 col-lg-8 col-md-offset-2 col-lg-offset-2">
            {{ Form::open(array('route' => 'saveImage', 'method' => 'POST', 'files' => true, 'id' => 'formNewImage'), array('role' => 'form')) }}
                {{-- {{ csrf_field() }}
                {{ Form::hidden('id', $pet -> id, array('id' => 'id')) }} --}}
                {{ Form::label('Subir imagen')}}
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
                {{ Form::submit('Subir', array('class' => 'btn btn-primary')) }}
            {{ Form::close()}}
        </div>
    </div>
    <div class="row">
        <div class="col-sx-2 col-sm-2 col-md-2 col-lg-2">
            {{-- TODO: Para la publicidad --}}
        </div>
        <div class="col-sx-8 col-sm-8 col-md-8 col-lg-8" id="principalPanel">
            @if($images == null)
                <div class="alert alert-dismissible alert-info">
                    <p>
                        Todavía no has subido ninguna imágen.
                    </p>
                </div>
            @endif
            @include('gallery.images')
        </div>
        <div class="col-sx-2 col-sm-2 col-md-2 col-lg-2 sidebar1">
            @include('menus.menu_home_pet')
        </div>
    </div>
</div>
@endsection

@section('js')
    <script src="/js/scripts/gallery/gallery.js"></script>
@endsection
