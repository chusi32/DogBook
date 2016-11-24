<div class="panel panel-primary">
    <div class="panel-heading clickable">
        <h3 class="panel-title">Mascotas</h3>
            <span class="pull-right "><i class="glyphicon glyphicon-minus"></i></span>
    </div>
    <div class="panel-body">
        @if(count($pets) > 0)
            <div class="container-fluid">
                @foreach ($pets as $key => $value)
                    {!! Html::image(asset('media/'.$value['idUsuario'].'/pets'.'/'.$value['id'].'/profile.png'), 'imágen perfil', array('class' => 'img-responsive', 'width' => 120, 'height' => 120)) !!}
                    <h4 class="text-primary">{{ $value['nombre'] }}</h4>
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
