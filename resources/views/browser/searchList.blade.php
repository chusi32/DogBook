<div class="row">
    <h2 class="text-center">Resultados</h2>
    @if(!count($pets) > 0)
        <div class="alert alert-dismissible alert-danger">
            <p>
                <b>No se han encontrado coincidencias.</b>
            </p>
        </div>
    @else
        <p class="pull-left">
            <b>{{$pets->total()}} </b> Resultados
        </p>
    @endif
</div>
<br />
@foreach ($pets as $key => $value)
    <div class="row petList">
        <div>
            <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
                <a class="pull-left" href="{{url('/visit'.'/'.$value['id'])}}">
                    {!! Html::image(asset('media/'.$value['idUsuario'].'/pets'.'/'.$value['id'].'/profile.png'), 'imágen perfil',
                        array('class' => 'img-responsive media-object dp', 'style' => '100px;height:100px;')) !!}
                </a>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
                <h3 class="text-center name">{{ $value['nombre'] }}</h3>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
                {{ HTML::link('/visit'.'/'.$value['id'], 'Visitar', array('class' => 'btn btn-custom'))}}
                {{ Form::button('Añadir a favoritos', array('class'=>'btn btn-custom btnAddFavorite', 'id'=>'prueba', 'data-id'=> $value->id))}}
            </div>
        </div>
    </div>
    <hr />
@endforeach
{!! $pets->appends(Request::all())->render() !!}

{{-- Formulario para añadir a favoritos --}}
{{ Form::open(['route' => ['addFavorite', ':FAVORITE_ID'], 'method' => 'post', 'id' => 'formAddFavorite'])  }}
    {{ csrf_field() }}
{{ Form::close()}}



{{-- <ul>
    @foreach ($pets as $key => $value)
        <li>
            {{$value['nombre']}}
        </li>
    @endforeach
</ul> --}}
