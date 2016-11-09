
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
            {{ Form::label('Email:')}}
            {{ Form::label(null, $user['email'], array())}}
        </div>
        {{ Form::button('Modificar', array('class' => 'btn')) }}
        {{ Form::button('Cuenta', array('class' => 'btn')) }}
        </form>
    </div>

</div>
