@foreach ($companies as $key => $value)
    <div>
        <ul class="event-list">
            <li>
                <div class="info">
                    <h2 class="title">{{$value->nombre}}</h2>
                    {!! Html::image(asset(''.$value['rutaImagen'].''), 'imágen empresa',
                        array('height'=>200, 'weight'=>250, 'class'=>'img img-responsive')) !!}
                    {{-- <p class="desc">PS Vita</p> --}}
                    <ul>
                        <li style="width:50%;"><a href="{{$value->web}}"><span class="fa fa-globe"></span> Visitar</a></li>
                        {{-- <li style="width:50%;"><span class="fa fa-money"></span> $39.99</li> --}}
                    </ul>
                </div>
            </li>
        </ul>
    </div>
@endforeach
