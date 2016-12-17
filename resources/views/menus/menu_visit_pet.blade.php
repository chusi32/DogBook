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
        {!! Html::image(asset('media/'.$petVisit->idUsuario.'/pets'.'/'.$petVisit->id.'/profile.png'), 'imágen perfil',
            array('class' => 'img-responsive media-object dp img-circle', 'style' => '25px;height:25px;')) !!}
    </a>
  </div>
  <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
          <li><a href="#!"><span><b>{{$petVisit->nombre}}</b></span></li></a>
          <li><a href="#">Información<i class="glyphicon glyphicon-adjust"></i></a></li>
          <li><a href="#">Muro<i class="glyphicon glyphicon-bell"></i></a></li>
          <li><a href="#">Galeria<i class="glyphicon glyphicon-user"></i></a></li>
          <li><a href="#">Enviar mensaje privado<i class="glyphicon glyphicon-user"></i></a></li>
      </ul>
  </div><!-- /.navbar-collapse -->
</nav>
