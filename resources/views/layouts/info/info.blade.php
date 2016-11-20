<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>@yield('title')</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

        <!-- Styles -->
        <link href="/css/app.css" rel="stylesheet">
        {!!Html::style('css/styles/info/wel.css')!!}
        @yield('css')
        {{-- {!!Html::style('css/styles/welcome.css')!!} --}}
        <style>

        </style>
    </head>
    <body>
        @include('info.menu')
        @yield('content')
        @include('layouts.app_footer')
        <!-- Scripts -->
        <script src="/js/app.js"></script>
        {!!Html::script('js/scripts/info/info.js')!!}
        @yield('js')
    </body>
</html>
