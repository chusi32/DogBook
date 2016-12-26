<div class="panel panel-default">
    <div class="panel-heading clickable">
        <h3 class="panel-title">Mascotas</h3>
            <span class="pull-right "><i class="glyphicon glyphicon-minus"></i></span>
    </div>
    <div class="panel-body">
        @if(count($pets) > 0)
            <div class="container-fluid">
                @foreach ($pets as $key => $value)
                    <div class="row data-pet" data-id="{{$value['id']}}">
                        <div>
                            <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
                                <a class="pull-left" href="{{url('/wall'.'/'.$value['id'])}}">
                                    {!! Html::image(asset('media/'.$value['idUsuario'].'/pets'.'/'.$value['id'].'/profile.png'), 'imágen perfil',
                                        array('class' => 'img-responsive media-object dp', 'style' => '100px;height:100px;')) !!}
                                </a>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
                                <h3 class="name text-center">{{ $value['nombre'] }}</h3>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
                                {{ HTML::link('/wall'.'/'.$value['id'], 'Entrar', array('class' => 'btn btn-custom pull-right'))}}
                                <button class="btn btn-custom dropdown-toggle pull-right" type="button" data-toggle="dropdown">
                                    <span class="glyphicon glyphicon-option-horizontal" aria-hidden="true"></span>
                                </button>
                                <ul class="dropdown-menu">
                                    <li><a href="{{ url('/modifyProfile'.'/'.$value['id']) }}">Cambiar imagen de perfil</a></li>
                                    <li><a href="{{ url('/modifyPet'.'/'.$value['id']) }}">Modificar datos</a></li>
                                    <li><a href="{{ url('/modifyPedigreePetForm'.'/'.$value['id']) }}">Modificar Pedigree</a></li>
                                    <li><a href="#!" class="btnDeletePet">Eliminar</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

        @else
            <p> Todavía no tiene ninguna mascota </p>
        @endif
        <a href="{{ url('/newPet')}}">
            <button class="btn btn-custom pull-right">Nueva mascota</button>
        </a>
        {{-- Formulario para eliminar un mensaje --}}
        {{ Form::open(['route' => ['deletePet', ':PET_ID'], 'method' => 'delete', 'id' => 'formDeletePet'])  }}
        {{ Form::close()}}
    </div>





</div>
