<div class="logo">
    {!! Html::image(asset('media/'.$pet->idUsuario.'/pets'.'/'.$pet->id.'/profile.png'), 'imágen perfil',
        array('class' => 'img-responsive center-block')) !!}
</div>
<br>
<div class="left-navigation">
    <ul class="list">
        <h3><strong>{{$pet->nombre}}</strong></h3>
        <li><a href="{{ url('/home') }}">Home</a></li>
        <li><a href="{{ url('/browser') }}">Buscador</a></li>
        <li><a href="{{ url('/wall'.'/'.$pet->id) }}">Muro</a></li>
        <li><a href="{{ url('/getGallery') }}">Galeria</a></li>
        <li><a href="{{ url('/favorites') }}">Favoritos</a></li>
        <li><a href="{{ url('/getPrivateMessages') }}">Mensajes</a></li>
    </ul>
</div>
