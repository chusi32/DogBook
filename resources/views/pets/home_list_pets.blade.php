<div class="panel panel-primary">
    <div class="panel-heading clickable">
        <h3 class="panel-title">Mascotas</h3>
            <span class="pull-right "><i class="glyphicon glyphicon-minus"></i></span>
    </div>
    <div class="panel-body">
        @if(count($pets) > 0)
            <div class="container-fluid">
                @foreach ($pets as $key => $value)
                    <div class="row">
                        <div>
                            <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
                                <a class="pull-left" href="#">
                                    {!! Html::image(asset('media/'.$value['idUsuario'].'/pets'.'/'.$value['id'].'/profile.png'), 'imágen perfil',
                                        array('class' => 'img-responsive media-object dp img-circle', 'style' => '100px;height:100px;')) !!}
                                </a>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
                                <h3 class="text-center">{{ $value['nombre'] }}</h3>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
                                <button class="btn btn-primary dropdown-toggle pull-right" type="button" data-toggle="dropdown">
                                    <span class="glyphicon glyphicon-option-horizontal" aria-hidden="true"></span>
                                </button>
                                <ul class="dropdown-menu">
                                    <li><a href="{{ url('/modifyPet'.'/'.$value['id']) }}">Modificar</a></li>
                                    <li><a href="{{ url('/deletePet'.'/'.$value['id']) }}">Eliminar</a></li>
                                </ul>
                            </div>


                        </div>
                    </div>
                    <hr />

                    {{-- <h4 class="text-primary">{{ $value['nombre  '] }}</h4> --}}
                    {{-- {!! Html::image(asset('profile.png'))!!} --}}
                @endforeach
            </div>

        @else
            <p> Todavía no tiene ninguna mascota </p>
        @endif
        <a href="{{ url('/newPet')}}">
            <button class="btn btn-primary pull-right">Nueva mascota</button>
        </a>
    </div>





</div>
