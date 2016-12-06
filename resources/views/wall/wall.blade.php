@extends('layouts.app')

@section('title')
    <title>DogBook - Muro</title>
@endsection

@section('css')
    <link href="/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="/css/styles/wall/wall.css" rel="stylesheet">
@endsection

@section('content')
<div class="container">
    <div class="row">
        <div class="col-sx-12 col-sm-12 col-md-10 col-lg-10 col-md-offset-2 col-lg-offset-2">
            <h2 class="text-center">Muro</h2>
            @if(session('message'))
                <div class="alert alert-success alert-dismissible" role="alert">
                    {{session('message')}}
                </div>
            @endif
        </div>
        <div class="col-sx-12 col-sm-12 col-md-8 col-lg-8 col-md-offset-2 col-lg-offset-2">
            {{-- Botón que activa el formulario para crear una nueva entrada --}}
            {{ Form::button('Publicar', array('id' => 'btnNewMessage','class' => 'btn btn-primary pull-left')) }}
            <br />
            <br />
            {{-- Formulario para la creación de una nueva entrada --}}
            {{ Form::open(array('route' => 'newMessage', 'method' => 'POST', 'files' => true, 'id' => 'formNewMessage'), array('role' => 'form')) }}
                {{ csrf_field() }}
                {{ Form::hidden('idPet', $pet->id, array('id' => 'idPet')) }}
                {{ Form::hidden('idWall', $pet->idMuro, array('id' => 'idWall')) }}
                {{-- Mensaje --}}
                <div class="form-group">
                  {{ Form::label('message', 'Mensaje')}}
                  {{ Form::textarea('message', null, ['id' => 'message','class' => 'form-control', 'rows' => 2, 'placeholder' => 'Escriba su nueva entrada']) }}
                </div>
                {{-- Foto --}}
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
                {{-- Video --}}
                <div class="form-group">
                  {{ Form::label('video', 'URL Youtube')}}
                  {{ Form::text('video', null, array('class' => 'form-control')) }}
                </div>
                {{ Form::submit('Enviar') }}
            {{ Form::close()}}
            <br />
        </div>
    </div>
    <div class="row">
        <div class="col-sx-2 col-sm-2 col-md-2 col-lg-2">
            {{-- TODO: Para la publicidad --}}
        </div>
        <div class="col-sx-8 col-sm-8 col-md-8 col-lg-8">
            <div class="comments-list">
                @foreach ($messages as $key => $value)
                    <div class="media" data-id="{{$value['idMensaje']}}">
                        <p class="pull-right"><small>{{$value['fecha']}}</small></p>
                        <a class="media-left" href="#">
                            {!! Html::image(asset('media/'.$value['idUsuario'].'/pets'.'/'.$value['idMascota'].'/profile.png'), 'imágen perfil',
                                array('height'=>50, 'weight'=>50)) !!}
                        </a>
                        <div class="media-body">
                              <h4 class="media-heading user_name">{{$value['nombreMascota']}}</h4>
                              {{$value['mensaje']}}
                              @if(isset($value['imagen']))
                                  {!! Html::image(asset('media/'.$value['idUsuario'].'/pets'.'/'.$value['idMascota'].'/wall'.'/'.$value['imagen']), 'imágen muro',
                                      array('height'=>200, 'weight'=>200, 'class'=>'img img-responsive')) !!}
                              @endif
                              @if(!is_null($value['video']))
                                  <div class="embed-responsive embed-responsive-16by9">
                                      <iframe class="embed-responsive-item" src="{{$value['video']}}"></iframe>
                                      {{-- <iframe class="embed-responsive-item" src="//www.youtube.com/embed/zpOULjyy-n8?rel=0"></iframe> --}}
                                  </div>
                              @endif
                              <a href="#!">
                                  <span id="btnDeleteMessage" class="btnDeleteMessage glyphicon glyphicon-trash pull-right" aria-hidden="true" title='Eliminar mensaje'></span>
                              </a>
                              <p><small><a href="">Like</a> - <a href="">Share</a></small></p>
                        </div>
                    </div>
                @endforeach
                {{-- Formulario para eliminar un mensaje --}}
                {{ Form::open(['route' => ['deleteMessageWall', ':MESSAGE_ID'], 'method' => 'delete', 'id' => 'formDeleteMessage'])  }}
                    {{ csrf_field() }}
                {{ Form::close()}}
            </div>
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
