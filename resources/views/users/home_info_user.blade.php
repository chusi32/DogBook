
<div class="panel panel-primary">
    <div class="panel-heading clickable">
        <h3 class="panel-title">Información de usuario</h3>
            <span class="pull-right "><i class="glyphicon glyphicon-minus"></i></span>
    </div>
    <div class="panel-body">
        <form>
        <div class="form-group">
            {{ Form::label('Nombre:')}}
            {{ Form::label(null, $user['name'], array())}}
        </div>
        <div class="form-group">
            {{ Form::label('Apellidos:')}}
            {{ Form::label(null, $user['surname'], array())}}
        </div>
        <div class="form-group">
            {{ Form::label('Usuario:')}}
            {{ Form::label(null, $user['user'], array())}}
        </div>
        <div class="form-group">
            {{ Form::label('Email:')}}
            {{ Form::label(null, $user['email'], array())}}
        </div>
        <a href="{{ url('/modifyUser')}}">
            {{ Form::button('Modificar', array('class' => 'btn btn-primary pull-right')) }}
        </a>
        {{ Form::button('Cuenta', array('class' => 'btn')) }}
        </form>
    </div>

</div>
