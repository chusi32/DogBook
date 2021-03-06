<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    {{-- <title>{{ config('app.name', 'Laravel') }}</title> --}}
    @yield('title')

    <!-- Styles -->
    {{-- <link href="/css/app.css" rel="stylesheet"> --}}
    <link href="https://fonts.googleapis.com/css?family=Montserrat|Raleway|Roboto" rel="stylesheet"> 
    <link href="/bootstrap/css/bootstrap.min.css" rel="stylesheet" />
    {!!Html::style('css/styles/application.css')!!}
    @yield('css')

    <!-- Scripts Head -->
    @yield('headJs')

    <!-- Scripts -->
    <script>
        window.Laravel = <?php echo json_encode([
            'csrfToken' => csrf_token(),
        ]); ?>
    </script>
</head>
<body>
    @include('layouts.app_menu')
    @yield('content')
    @include('layouts.app_footer')

    <!-- Scripts -->
    <script src="/js/app.js"></script>
    @yield('js')
</body>
</html>
