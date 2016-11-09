@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-sx-12 col-sm-12 col-md-12 col-lg-12">
            <h2 class="text-center">Panel de Usuario</h2>
        </div>
    </div>
    <div class="col-sx-2 col-sm-2 col-md-2 col-lg-2">
        {{-- TODO: Para la publicidad --}}
    </div>
    <div class="col-sx-7 col-sm-7 col-md-7 col-lg-7">

    </div>
    <div class="col-sx-3 col-sm-3 col-md-3 col-lg-3">
        @include('users.home_info_user')
    </div>
        {{-- <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    You are logged in! id usuario
                </div>


                <div>
                    @foreach($id as $item )
                        {
                            <label>{{ $item['nombre'] }}</label>
                        }
                    @endforeach
                </div>


            </div>
        </div> --}}

    {{-- </div> --}}
</div>
@endsection
