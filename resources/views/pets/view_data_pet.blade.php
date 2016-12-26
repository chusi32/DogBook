<div class="container">
	<div class="row">
		<div class="col-xs-12 col-sm-6 col-md-6">
	<div class="well well-sm">
		<div class="row">
			<div class="col-sm-6 col-md-4">
				{!! Html::image(asset('media/'.$pet->idUsuario.'/pets'.'/'.$pet->id.'/profile.png'), 'imágen perfil',
					array('height'=>'100', 'weight'=>'100', 'img-responsive')) !!}
				{{-- <img src="http://placehold.it/380x500" alt="" class="img-rounded img-responsive" /> --}}
			</div>
			<div class="col-sm-6 col-md-8">
				<h4>{{$pet->nombre}}</h4>
				@if ($pet->sexo == "hombre")
					{!! Html::image(asset('images/icons/male.png'), 'imágen sexo',
						array()) !!}
				@else
					{!! Html::image(asset('images/icons/female.png'), 'imágen sexo',
						array()) !!}
				@endif
				<small><cite title="San Francisco, USA">{{$pet->location->nombreLocalidad}}, {{$pet->province->nombreProvincia}}<i class="glyphicon glyphicon-map-marker">
				</i></cite></small>
				<p>
					<i class=""></i><b class="data">Edad:</b> {{$pet->edad}}
					<br />
					<i class=""></i><b class="data">Raza:</b> {{$pet->breed->nombreRaza}}
					<br />
					@if(isset($pet->pedigree->id))
						<i class=""></i><b class="data">Pedigree</b>
						<br />
						<i class=""></i><b class="data">Nombre del padre:</b> {{$pet->pedigree->nombrePadre}}
						<br/>
						<i class=""></i><b class="data">Nombre de la madre:</b> {{$pet->pedigree->nombreMadre}}
						<br/>
						<i class=""></i><b class="data">Detalles:</b> {{$pet->pedigree->detalles}}
					@endif
				</p>
			</div>
		</div>
	</div>
</div>
