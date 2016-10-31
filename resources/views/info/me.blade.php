@extends('layouts.info.info')
@section('title')
    DogBook - Desarrollador
@endsection
@section('css')
    <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
    <link href="css/styles/info/me.css" rel="stylesheet">
@endsection
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg12">
                <h2 class="text-center">Equipo de Desarrollo</h2>
            </div>
        </div>
	       <div class="row">

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

	    </div>
    </div>
@endsection
