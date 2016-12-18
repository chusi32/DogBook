<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
<div class="container">
	<div class="row">
		<div class="col-lg-3 col-sm-6">

            <div class="card hovercard">
                <div class="cardheader">

                </div>
                <div class="avatar">
					{!! Html::image(asset('media/'.$pet->idUsuario.'/pets'.'/'.$pet->id.'/profile.png'), 'imágen perfil',
						array('height'=>'300', 'weight'=>'300')) !!}

                </div>
                <div class="info">
                    <div class="title">
                        <a target="_blank" href="http://scripteden.com/">{{$pet->nombre}}</a>
                    </div>
					<div class="desc">
						@if ($pet->sexo == "hombre")
							{!! Html::image(asset('images/icons/male.png'), 'imágen sexo',
								array()) !!}
						@else
							{!! Html::image(asset('images/icons/female.png'), 'imágen sexo',
								array()) !!}
						@endif
					</div>
					<div class="desc text-primary">Edad</div>
                    <div class="desc ">{{$pet->edad}}</div>
					<div class="desc text-primary">Provincia</div>
                    <div class="desc">{{$pet->province->nombreProvincia}}</div>
					<div class="desc text-primary">Localidad</div>
					<div class="desc">{{$pet->location->nombreLocalidad}}</div>
					<div class="desc text-primary">Raza</div>
                    <div class="desc">{{$pet->breed->nombreRaza}}</div>
					@if(isset($pet->pedigree->id))
						<div class="desc">Tengo pedigree</div>
						<div class="desc">Nombre del padre</div>
						<div class="desc">{{$pet->pedigree->nombrePadre}}</div>
						<div class="desc">Nombre de la madre</div>
						<div class="desc">{{$pet->pedigree->nombreMadre}}</div>
						<div class="desc">Detalles</div>
						<div class="desc">{{$pet->pedigree->detalles}}</div>
					@else
						<div class="desc">No tengo pedigree</div>
					@endif
                </div>
            </div>
        </div>
	</div>
</div>
