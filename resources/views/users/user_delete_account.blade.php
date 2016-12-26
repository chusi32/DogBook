@extends('layouts.app')

@section('title')
    <title>DogBook - Borrar usuario</title>
@endsection

@section('css')
@endsection

@section('content')
<div class="container">
    <div class="row">
        <div class="col-sx-12 col-sm-12 col-md-12 col-lg-12">
            <div class="row">
                <h1 class="text-center"> -- Borrar usuario --</h1>
                @if(session('message'))
                    <div class="alert alert-success alert-dismissible" role="alert">
                        <b>{{session('message')}}</b>
                    </div>
                @endif
            </div>
            <p class="text-center">
                Va a proceder a borrar su cuenta. Esta acción eliminarará toda la
                información que esté asociada a esta cuenta. Es una acción que no
                puede deshacerse. Si sigue queriendo eliminar su cuenta, pulse en
                el botón Eliminar cuenta. De lo contrario, pulse el botón "Cancelar"
            </p>
            <div class="form-group">
                <a href="{{url('/deleteUser')}}" class="btn btn-custom pull-left">Eliminar cuenta</a>
                <a href="{{ URL::previous() }}" class="btn btn-danger pull-right">Cancelar</a>
            </div>
        </div>
    </div>
</div>
@endsection

@section('js')
    <script src="/js/scripts/home/home.js"></script>
@endsection
