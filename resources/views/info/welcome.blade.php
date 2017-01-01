@extends('layouts.info.info')
@section('title')
    DogBook
@endsection
@section('content')
    {!! Html::image(asset('media/resources/images/portada_web.jpg'), 'foto de portada',
        array('class' => 'img-responsive')) !!}
@endsection
