@extends('layouts.info.info')
@section('title')
    DogBook-Descripción
@endsection
@section('css')
    {{-- <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet"> --}}
    {{-- <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css"> --}}
    {{-- <link href="css/styles/info/description.css" rel="stylesheet"> --}}
    <link href="css/styles/info/styleInfo.css" rel="stylesheet">
@endsection
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <h1 class="text-center">-- DogBook --</h1>
            </div>
        </div>
      <div class="iconcontainer">
        <div class="row">
          <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <div class="iconbox">
              <div class="iconbox-icon">
                <span class="glyphicon glyphicon-book"></span>
              </div>
              <div class="featureinfo">
                <h4 class="text-center">¿Que es DogBook?</h4>
                <p class="text-center">
                  DogBook es una aplicación Web diseñada por amantes de los
                  perros y dirigida a amantes de los perros.
                </p>
                <p>
                    DogBook fue creada para facilitaros la vida a ti y a tu
                    perr@, todo lo que él puede necesitar, al alcance de tu mano:
                </p>
                <ul>
                    <li>
                        Crea un perfil que identifique a tu perro en la comunidad
                        'DogBook'. Sube una foto, indica sus intereses, su raza
                        y añade otros muchos rasgos que lo definan a la perfección.
                    </li>
                    <li>
                        Busca y localiza según tus propios filtros otros perros
                        que estén cerca de ti, chatea con ellos, añadelos como
                        favoritos y ... !Lo que surja¡
                    </li>
                    <li>
                        Localiza y administra por listaas una gran cantidad de
                        servicios que seŕan de una enorme utilidad para ti y tu
                        perro.
                    </li>
                    <li>
                        Gestiona y organiza los listados de 'perros' y 'servicios'
                        facoritos según distintos criterios (distancia, utilidad ...)
                    </li>
                </ul>
              </div>
            </div>
          </div>
          <div class="row">
              <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                  <h1 class="text-center">¿Qué ofrecemos?</h1>
              </div>
          </div>
        <div class="row">
          <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
            <div class="iconbox">
              <div class="iconbox-icon">
                <span class="glyphicon glyphicon-user"></span>
              </div>
              <div class="featureinfo">
                <h4 class="text-center">Conoce gente</h4>
                <p>
                  Conoce gente facilmente con la que compartir tu interés por las
                  mascotas caninas. Haz un grupo de amigos, queda para pasear,
                  jugar o incluso para buscar el amor a tu fiel amig@.
                </p>
              </div>
            </div>
          </div>
          <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
            <div class="iconbox">
              <div class="iconbox-icon">
                <span class="glyphicon glyphicon-euro"></span>
              </div>
              <div class="featureinfo">
                <h4 class="text-center">Compra - Venta</h4>
                <p>
                  Espacio dedicado a anuncios clasificados. Vende lo que tu mascota
                  ya no necesite y gana un dinero extra. Otra persona puede estar
                  buscando lo que tu ya no utilizas.¿Que mejor opción para ambos?
                </p>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
              <div class="iconbox">
                <div class="iconbox-icon">
                  <span class="glyphicon glyphicon-gift"></span>
                </div>
                <div class="featureinfo">
                  <h4 class="text-center">Concursos</h4>
                  <p>
                    Haz que tu mascota participe en numerosos concursos. Concursos
                    de disfraces de Halloween, concursos de San Valentin, navidad
                    y muchos mas para ganar fantásticos premios. ¿Conseguirá tu
                    mascota ser el favorito de la manada de DogBook?
                  </p>
                </div>
              </div>
            </div>
            <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
              <div class="iconbox">
                <div class="iconbox-icon">
                  <span class="glyphicon glyphicon-bullhorn"></span>
                </div>
                <div class="featureinfo">
                  <h4 class="text-center">Anunciate</h4>
                  <p>
                      Si tienes un negocio que tenga que ver con los canes,
                      (centro veterinario, peluqueria canina, tienda o el que
                      sea) puedes anunciarte en la comunidad de DogBook. ¿Que
                      mejor lugar que este para dar tu negocio a conocer?
                  </p>
                </div>
              </div>
            </div>
        </div>
      </div>
    </div>
@endsection
