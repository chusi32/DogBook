{{-- Desplegable con las opciones: Eliminar mensajes.... --}}
<div class="btn-group">
  <button type="button" class="btn btn-custom dropdown-toggle" data-toggle="dropdown" title="Opciones">
      <span class="glyphicon glyphicon-cog"></span>
  </button>
  <ul class="dropdown-menu" role="menu">
    <li><a href="#" id="btnDeleteAllMessages">Vaciar bandeja</a></li>
  </ul>
</div>
{{-- Boton para refrescar la lista de mensajes --}}
<a href="{{ url('/getPrivateMessages') }}" class="btn btn-custom" title="Refrescar">
    <span class="glyphicon glyphicon-refresh"></span>
</a>

<div class="comments-list">
    @foreach ($messages as $key => $value)
        <div class="media" data-id="{{$value->id}}">
            {{-- <p class="pull-right"><small>{{$value->created_at}}</small></p> --}}
            <a class="media-left" href="#">
                {!! Html::image(asset('media/'.$value->pet->idUsuario.'/pets'.'/'.$value->idMascota.'/profile.png'), 'imágen perfil',
                    array('height'=>50, 'weight'=>50)) !!}
            </a>
            <div class="media-body">
                  <h4 class="media-heading user_name">{{$value->pet->nombre}}</h4>
                  {{$value->mensaje}}
                  <p>
                      <small>
                          <a href="{{ url('/getFormPrivateMessage'.'/'.$value->idMascota)}}">
                              <span class="btnMessageResponse glyphicon glyphicon-share " aria-hidden="true" title='Responder'></span>
                          </a> -
                          <a href="">
                              <span class="btnDeleteMessage glyphicon glyphicon-trash " aria-hidden="true" title='Eliminar mensaje'></span>
                          </a>
                      </small>
                  </p>
            </div>
        </div>
    @endforeach
    {!! $messages->render() !!}
    {{-- Formulario para eliminar un mensaje --}}
    {{ Form::open(['route' => ['deleteMessageWall', ':MESSAGE_ID'], 'method' => 'delete', 'id' => 'formDeleteMessage'])  }}
    {{ Form::close()}}
    {{-- Formulario para eliminar todos los mensajes --}}
    {{ Form::open(['route' => 'deleteAllPrivateMessages', 'method' => 'post', 'id' => 'formDeleteAllMessages'])  }}
        {{ Form::hidden('idPet', $pet->id)}}
    {{ Form::close()}}
</div>
