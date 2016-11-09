<!-- Información del usuario -->
{{-- <h3>Información de usuario</h3> --}}

<div class="panel panel-default">
    <div class="panel-heading">Información de usuario</div>

    <div class="panel-body">
        <form>
        <div class="form-group">
            {{ Form::label('Nombre:')}}
            {{ Form::label(null, $user['name'], array())}}
        </div>
        <div class="form-group">
            {{ Form::label('Email:')}}
            {{ Form::label(null, $user['email'], array())}}
        </div>
        {{ Form::button('Modificar', array('class' => 'btn')) }}
        {{ Form::button('Cuenta', array('class' => 'btn')) }}
        </form>
    </div>


    {{-- <div>
        @foreach($id as $item )
            {
                <label>{{ $item['nombre'] }}</label>
            }
        @endforeach
    </div> --}}


</div>
