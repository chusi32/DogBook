    <div class="container">
    <div class="col-sx-8 col-sm-8 col-md-8 col-lg-8">
    <div class='list-group gallery'>
        @foreach ($images as $key => $value)
            <div class='col-sm-4 col-xs-6 col-md-3 col-lg-3 divImage' data-id="{{$value['id']}}">
                <a class="thumbnail fancybox" rel="ligthbox" href="{{$value->ruta}}{{$value->imagen}}">
                    {!! Html::image(asset($value['ruta'].''.$value['imagen']), 'imágen galeria',
                        array('min-height'=>50, 'min-weight'=>50)) !!}
                    <img class="img-responsive" alt="" src="asset({{$value['ruta']}}{{$value['imagen']}})" />
                    <div class='text-right'>
                        @if($adminGallery == true)
                            <small class='text-muted deleteImage'>Eliminar</small>
                        @endif
                        {{-- <a href="#!">
                            <span id="btnDeleteMessage" class="btnDeleteMessage glyphicon glyphicon-trash pull-right" aria-hidden="true" title='Eliminar mensaje'></span>
                        </a> --}}
                    </div> <!-- text-right / end -->
                </a>
            </div> <!-- col-6 / end -->
        @endforeach
    </div> <!-- list-group / end -->
    {!! $images->render() !!}
    </div> <!-- row / end -->
    </div> <!-- container / end -->
    {{ Form::open(['route' => ['deleteImageGallery', ':IMAGE_ID'], 'method' => 'delete', 'id' => 'formDeleteImageGallery'])  }}
    {{ Form::close()}}
