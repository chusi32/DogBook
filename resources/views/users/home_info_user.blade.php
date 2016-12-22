
<div class="panel panel-default">
    <div class="panel-heading clickable">
        <h3 class="panel-title">Información de usuario</h3>
            <span class="pull-right "><i class="glyphicon glyphicon-minus"></i></span>
    </div>
    <div class="panel-body">
        <form>
        <div class="form-group">
            {{-- {{ Form::label('Nombre:')}} --}}
            {{ Form::label('name', 'Nombre:', array('class' => 'label-custom')) }}
            {{ Form::label(null, $user['name'], array())}}
        </div>
        <div class="form-group">
            {{-- {{ Form::label('Apellidos:')}} --}}
            {{ Form::label('surname', 'Apellidos:', array('class' => 'label-custom')) }}
            {{ Form::label(null, $user['surname'], array())}}
        </div>
        <div class="form-group">
            {{-- {{ Form::label('Usuario:')}} --}}
            {{ Form::label('user', 'Usuario:', array('class' => 'label-custom')) }}
            {{ Form::label(null, $user['user'], array())}}
        </div>
        <div class="form-group">
            {{-- {{ Form::label('Email:')}} --}}
            {{ Form::label('email', 'Email:', array('class' => 'label-custom')) }}
            {{ Form::label(null, $user['email'], array())}}
        </div>
        <a href="{{ url('/modifyUser')}}">
            {{ Form::button('Modificar', array('class' => 'btn btn-custom pull-right')) }}
        </a>
        {{ Form::button('Cuenta', array('class' => 'btn btn-custom')) }}
        </form>
    </div>

</div>
