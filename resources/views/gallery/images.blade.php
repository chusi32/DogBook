    <div class="container">
    	<div class="col-sx-8 col-sm-8 col-md-8 col-lg-8">
    		<div class='list-group gallery'>
                @foreach ($images as $key => $value)
                    <div class='col-sm-4 col-xs-6 col-md-3 col-lg-3'>
                        <a class="thumbnail fancybox" rel="ligthbox" href="{{$value->ruta}}{{$value->imagen}}">
                            {!! Html::image(asset($value['ruta'].''.$value['imagen']), 'imágen galeria',
                                array('height'=>50, 'weight'=>50)) !!}
                            <img class="img-responsive" alt="" src="asset({{$value['ruta']}}{{$value['imagen']}})" />
                            <div class='text-right'>
                                {{-- <small class='text-muted'>Image Title</small> --}}
                                <small class="text-muted">
                                    Eliminar{{-- <span id="btnDeleteMessage" class="btnDeleteMessage glyphicon glyphicon-trash pull-right" aria-hidden="true" title='Eliminar mensaje'></span> --}}
                                </small>

                            </div> <!-- text-right / end -->
                        </a>
                    </div> <!-- col-6 / end -->
                @endforeach
            </div> <!-- list-group / end -->
    	</div> <!-- row / end -->
    </div> <!-- container / end -->
