<div class="row">
    @if(!count($favorites) > 0)
        <div class="alert alert-dismissible alert-info">
            <p>
                <b>Nada que mostrar.</b>
            </p>
        </div>
    {{-- @else
        <p class="pull-left">
            <b>{{$favorites->total()}} </b> Mascotas en la lista de favoritos
        </p> --}}
    @endif
</div>
<br />
@foreach ($favorites as $key => $value)
    <div class="row petList data-pet">
        <div>
            <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
                <a class="pull-left" href="{{url('/visit'.'/'.$value->pet->id)}}">
                    {!! Html::image(asset('media/'.$value->pet->idUsuario.'/pets'.'/'.$value->pet->id.'/profile.png'), 'imágen perfil',
                        array('class' => 'img-responsive media-object dp', 'style' => '100px;height:100px;')) !!}
                </a>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
                <h3 class="text-center name">{{ $value->pet->nombre }}</h3>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
                {{ HTML::link('/visit'.'/'.$value->pet->id, 'Visitar', array('class' => 'btn btn-custom'))}}
                {{ Form::button('Eliminar de favoritos', array('class' => 'btn btn-danger btnDeleteFavorite', 'data-id'=>$value->pet->id)) }}
            </div>
        </div>
    </div>
@endforeach
{{-- {!! $favorites->render() !!} --}}

{{-- Formulario para eliminar de favoritos --}}
{{ Form::open(['route' => ['deleteFavorite', ':FAVORITE_ID'], 'method' => 'post', 'id' => 'formDeleteFavorite'])  }}
{{ Form::close()}}
