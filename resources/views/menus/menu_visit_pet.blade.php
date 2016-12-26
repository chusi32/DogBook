{!! Html::image(asset('media/'.$petVisit->idUsuario.'/pets'.'/'.$petVisit->id.'/profile.png'), 'imágen perfil',
    array('class' => 'img-responsive media-object dp', 'style' => '100px;height:100px;')) !!}
<nav class="navbar navbar-default navbar-xs" role="navigation">
  <!-- Brand and toggle get grouped for better mobile display -->
  <div class="navbar-header">
    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
      <span class="sr-only"></span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
    </button>
    <a class="navbar-brand" href="#!">

    </a>
  </div>
  <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
          <li><a href="{{url('/visit'.'/'.$petVisit->id)}}"><span><b>{{$petVisit->nombre}}</b></span></li></a>
          <li class="petMenu"><a href="{{'/viewDataPet'.'/'.$petVisit->id}}">Información<i class="glyphicon glyphicon-user"></i></a></li>
          <li><a href="{{url('/visit'.'/'.$petVisit->id)}}">Muro<i class="glyphicon glyphicon-home"></i></a></li>
          <li class="petMenu"><a href="{{'/visitGallery'.'/'.$petVisit->id}}">Galeria<i class="glyphicon glyphicon-picture"></i></a></li>
          <li class="petMenu"><a href="{{'/getFormPrivateMessage'.'/'.$petVisit->id}}">Enviar mensaje privado<i class="glyphicon glyphicon-pencil"></i></a></li>
      </ul>
  </div><!-- /.navbar-collapse -->
</nav>
