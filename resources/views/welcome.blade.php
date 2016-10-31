<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

        <!-- Styles -->
        {!!Html::style('css/styles/welcome.css')!!}
        <style>

        </style>
    </head>
    <body>
        <div id="welcome-content" class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    <a href="{{ url('/login') }}">Login</a>
                    <a href="{{ url('/register') }}">Register</a>
                </div>
            @endif

            <div class="content">
                <div class="title m-b-md">
                    DogBook
                </div>

                <div class="links">
                    <a href="{{ url('/description')}}">Sobre DogBook</a>
                    <a href="https://laracasts.com">Patrocina tu empresa</a>
                    <a href="{{ url('/privacy') }}">Privacidad</a>
                    <a href="https://forge.laravel.com">Noticias</a>
                    <a href="{{ url('/me') }}">Creador del sitio</a>
                </div>
            </div>
        </div>
    </body>
</html>
