<div class="container-fluid">
    <!-- Second navbar for categories -->
    <nav class="navbar navbar-default">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#">DogBook</a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="navbar-collapse-1">
                <ul class="nav navbar-nav navbar-left">
                    <li><a href="{{ url('/description')}}">Sobre DogBook</a></li>
                    <li><a href="#">Patrocinate</a></li>
                    <li><a href="{{ url('/privacy')}}">Privacidad</a></li>
                    <li><a href="{{ url('/me')}}">Creador del sitio</a></li>
                </ul>
                @if (Route::has('login'))
                    <ul class="nav navbar-nav navbar-right">
                        <li><a href="{{ url('/login') }}">Entrar</a></li>
                        <li><a href="{{ url('/register') }}">Registrarse</a></li>
                    </ul>
                @endif
            </div><!-- /.navbar-collapse -->
        </div><!-- /.container -->
    </nav><!-- /.navbar -->
</div>
