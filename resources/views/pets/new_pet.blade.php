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
            {{ Form::open(array('method' => 'POST', 'files' => true), array('role' => 'form')) }}
                {{ csrf_field() }}
                <div class="form-group">
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
                    </div><!-- /input-group image-preview [TO HERE]-->
                    {{-- {{ Form::file('image') }} --}}
                </div>
                <div class="form-group">
                  {{ Form::label('name', 'Nombre')}}
                  {{ Form::text('name', null, array('class' => 'form-control', 'required')) }}
                </div>
                @if ($errors->has('name'))
                    <span class="help-block">
                        <strong class="alert-danger text-danger">{{ $errors->first('name') }}</strong>
                    </span>
                @endif
                <div class="form-group">
                  {{ Form::label('age', 'Edad')}}
                  {{ Form::selectRange('age', 1, 20, 1, ['class' => 'form-control']) }}
                </div>
                <div class="form-group">
                  {{ Form::label('sex', 'Sexo')}}
                  {{ Form::select('sex', ['macho' => 'Macho', 'hembra' => 'Hembra'], null, ['class' => 'form-control']) }}
                </div>
                <div class="form-group">
                  {{ Form::label('province', 'Provincia')}}
                  {{ Form::select('province',$provinces, null,['id' => 'province','class' => 'form-control']) }}
                </div>
                <div class="form-group">
                  {{ Form::label('location', 'Localidad')}}
                  {{ Form::select('location', ['placeholder' => 'Seleccione'], null, ['id' => 'location', 'class' => 'form-control']) }}
                </div>
                <div class="form-group">
                  {{ Form::label('breed', 'Raza')}}
                  {{ Form::select('breed',$breeds, null,['id' => 'breed','class' => 'form-control']) }}
                </div>
                <div class="form-group">
                  {{ Form::label('Tengo pedigree')}}
                  {{ Form::checkbox('chkPedigree', null, null, ['id' => 'chkPedigree', 'class' => 'field']) }}
                </div>
                <div id="pedigree">
                    <div class="form-group">
                        {{ Form::label('nameFather', 'Nombre del padre')}}
                        {{ Form::text('nameFather', null, array('class' => 'form-control')) }}
                    </div>
                    @if ($errors->has('nameFather'))
                        <span class="help-block">
                            <strong class="alert-danger text-danger">{{ $errors->first('nameFather') }}</strong>
                        </span>
                    @endif
                    <div class="form-group">
                        {{ Form::label('nameMother', 'Nombre de la madre')}}
                        {{ Form::text('nameMother', null, array('id' => 'nameMother', 'class' => 'form-control')) }}
                    </div>
                    @if ($errors->has('nameMother'))
                        <span class="help-block">
                            <strong class="alert-danger text-danger">{{ $errors->first('nameMother') }}</strong>
                        </span>
                    @endif
                    <div class="form-group">
                        {{ Form::label('description', 'Descripción del pedegree')}}
                        {{ Form::textarea('description', null, ['id' => 'description','class' => 'form-control']) }}
                    </div>
                    @if ($errors->has('description'))
                        <span class="help-block">
                            <strong class="alert-danger text-danger">{{ $errors->first('description') }}</strong>
                        </span>
                    @endif
                </div>
                <a href="{{ URL::previous() }}" class="btn btn-danger pull-right">Cancelar</a>
                {{ Form::submit('Guardar', array('class' => 'btn btn-custom pull-right')) }}
            {{ Form::close()}}
        </div>
    </div>
</div>
@endsection

@section('js')
    <script src="/js/scripts/pets/newPet.js"></script>
@endsection
