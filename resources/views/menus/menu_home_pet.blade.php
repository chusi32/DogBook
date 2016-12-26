<div class="logo">
    {!! Html::image(asset('media/'.$pet->idUsuario.'/pets'.'/'.$pet->id.'/profile.png'), 'imágen perfil',
        array('class' => 'img-responsive center-block')) !!}
</div>
<br>
<div class="left-navigation">
    <ul class="list">
        <h3><strong>{{$pet->nombre}}</strong></h3>
        <li><a href="{{ url('') }}">Muro</a></li>
        <li><a href="{{ url('/getGallery') }}">Galeria</a></li>
        <li><a href="{{ url('/browser') }}">Buscador</a></li>
        <li><a href="{{ url('/getPrivateMessages') }}">Mensajes</a></li>
        <li><a href="">Favoritos</a></li>
    </ul>
</div>






{{-- <div class="sidebar-nav">
    <div class="well" style="width:300px; padding: 8px 0;">
        <ul class="nav nav-list">
          <li class="nav-header">{!! Html::image(asset('media/'.$pet->idUsuario.'/pets'.'/'.$pet->id.'/profile.png'), 'imágen perfil',
              array('class' => 'img-responsive media-object dp img-circle', 'style' => '50px;height:50px;')) !!}
              {{$pet->nombre}}</li>
          <li class="active"><a href="index"><i class="icon-home"></i> Dashboard</a></li>
          <li><a href="#"><i class="icon-edit"></i> Add Blog Post</a></li>
          <li><a href="#"><i class="icon-calendar"></i> Calendar</a></li>
          <li><a href="#"><i class="icon-user"></i> Members</a></li>
          <li><a href="#"><i class="icon-comment"></i> Comments</a></li>
          <li><a href="#"><i class="icon-picture"></i> Gallery</a></li>
        </ul>
    </div>
</div> --}}
