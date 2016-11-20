<div class="panel panel-primary">
    <div class="panel-heading clickable">
        <h3 class="panel-title">Mascotas</h3>
            <span class="pull-right "><i class="glyphicon glyphicon-minus"></i></span>
    </div>
    <div class="panel-body">


        @if(count($pets) > 0)


        @else
            <p> Todavía no tiene ninguna mascota </p>
            <a href="{{ url('/newPet')}}">
                <button class="btn btn-primary pull-right">Nueva mascota</button>
            </a>
        @endif
    </div>



</div>
