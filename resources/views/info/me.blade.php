@extends('layouts.info.info')
@section('title')
    DogBook - Desarrollador
@endsection
@section('css')
    {{-- <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet"> --}}
    {{-- <link href="css/styles/info/me.css" rel="stylesheet"> --}}
    <link href="css/styles/info/styleInfo.css" rel="stylesheet">
@endsection
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg12">
                <h2 class="text-center">-- Equipo de Desarrollo --</h2>
            </div>
        {{-- </div> --}}

    		<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
    	<div class="well well-sm">
    		<div class="row">
    			<div class="col-sm-6 col-md-4">
    				{!! Html::image(asset('media/resources/images/me.png'), 'imágen perfil',
    					array('height'=>'100', 'weight'=>'100', 'class'=>'img-responsive')) !!}
    				{{-- <img src="http://placehold.it/380x500" alt="" class="img-rounded img-responsive" /> --}}
    			</div>
    			<div class="col-sm-6 col-md-8">
    				<h4>Jesús Alegre Sancho</h4>

    				<small><cite title="San Francisco, USA">Zaragoza, España <i class="glyphicon glyphicon-map-marker">
    				</i></cite></small>
    				<p>
    					<i class=""></i><b class="data">Fecha de nacimiento: </b>
    					<br />
                        <i class=""></i>21/04/89
                        <br />
    					<i class=""></i><b class="data">Puesto: </b>
    					<br />
                        <i class=""></i>Programador
                        <br />
                        <i class=""></i><b class="data">Experiencia: </b>
    					<br />
                        <i class=""></i> c#, .NET, Visual Basic, vb.NET, Java, PHP, Javascript,
                        <br />
                        <i class=""></i><b class="data">Gustos: </b>
    					<br />
                        <i class=""></i>
                            Persona entusiasta y con ganas de seguir aprendiendo.
                            Me gusta estar actualizado con la tecnología, dedicando
                            mis ratos libres a curiosear y estudiar nuevos lenguajes
                            de programación. Disfruto creando aplicaciones, programas
                            y webs.
                        <br />
                        <i class=""></i><b class="data">Citas favoritas: </b>
    					<br />
                        <i class=""></i>
                            "A veces la persona que nadie imagina capaz de nada es la
                            que hace cosas que nadie imagina."    Alan Turing
                        <br />
    				</p>
    			</div>
    		</div>










	       {{-- <div class="row">

		             <div class="col-lg-3 col-sm-6">

                         <div class="card hovercard">
                             <div class="cardheader">

                             </div>
                             <div class="avatar">
                                 <img alt="" src="http://lorempixel.com/100/100/people/9/">
                             </div>
                             <div class="info">
                                 <div class="title">
                                     <a target="_blank" href="http://scripteden.com/">Script Eden</a>
                                 </div>
                                 <div class="desc">Passionate designer</div>
                                 <div class="desc">Curious developer</div>
                                 <div class="desc">Tech geek</div>
                             </div>
                             <div class="bottom">
                                 <a class="btn-card btn-primary btn-twitter btn-sm" href="https://twitter.com/webmaniac">
                                     <i class="fa fa-twitter"></i>
                                 </a>
                                 <a class="btn-card btn-danger btn-sm" rel="publisher"
                                 href="https://plus.google.com/+ahmshahnuralam">
                                 <i class="fa fa-google-plus"></i>
                             </a>
                             <a class="btn-card btn-primary btn-sm" rel="publisher"
                             href="https://plus.google.com/shahnuralam">
                             <i class="fa fa-facebook"></i>
                         </a>
                         <a class="btn-card btn-warning btn-sm" rel="publisher" href="https://plus.google.com/shahnuralam">
                             <i class="fa fa-behance"></i>
                         </a>
                     </div>
                 </div>

             </div>

	    </div> --}}
    </div>
@endsection
