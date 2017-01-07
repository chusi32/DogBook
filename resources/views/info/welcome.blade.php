@extends('layouts.info.info')
@section('title')
    DogBook
@endsection
@section('content')
    {!! Html::image(asset('media/resources/images/portada_web.jpg'), 'foto de portada',
        array('class' => 'img-responsive')) !!}

        {{-- <div id="myModal" class="modal fade">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title">Política de cookies</h4>
                    </div>
                    <div class="modal-body">
                        <p>
                            Esta web utiliza cookies para obtener datos estadísticos de la navegación de sus usuarios.
                            Si continúas navegando consideramos que aceptas su uso.
                        </p>
                        <p class="text-warning"><small>If you don't save, your changes will be lost.</small></p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Ok</button>
                        <button type="button" class="btn btn-primary">No</button>
                    </div>
                </div>
            </div>
        </div> --}}
@endsection
