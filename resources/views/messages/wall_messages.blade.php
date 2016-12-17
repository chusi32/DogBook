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
                          <iframe class="embed-responsive-item" src="{{$value['video']}}" allowfullscreen></iframe>
                          {{-- <iframe class="embed-responsive-item" src="//www.youtube.com/embed/zpOULjyy-n8?rel=0"></iframe> --}}
                      </div>
                  @endif
                  {{-- Si el usuario está en su muro se habilita el icono de borrar mensajes --}}
                  @if(Auth::user()->id == $value['idUsuario'])
                  <a href="#!">
                      <span id="btnDeleteMessage" class="btnDeleteMessage glyphicon glyphicon-trash pull-right" aria-hidden="true" title='Eliminar mensaje'></span>
                  </a>
                  @endif
                  <p><small><a href="">Like</a> - <a href="">Share</a></small></p>
            </div>
        </div>
    @endforeach
    {{-- Formulario para eliminar un mensaje --}}
    {{ Form::open(['route' => ['deleteMessageWall', ':MESSAGE_ID'], 'method' => 'delete', 'id' => 'formDeleteMessage'])  }}
        {{ csrf_field() }}
    {{ Form::close()}}
</div>
