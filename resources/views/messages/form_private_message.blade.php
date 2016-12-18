{{ Form::open(array('route' => 'sendPrivateMessage', 'method' => 'POST', 'files' => true, 'id' => 'formPrivateMessage'), array('role' => 'form')) }}
    {{ Form::hidden('idPetReceived', $petReceived->id, array('id' => 'idPetReceived')) }}
    {{ Form::textarea('message', null, ['id' => 'message','class' => 'form-control', 'placeholder'=>'Escriba el mensaje', 'rows'=>'7', 'required', 'maxlength'=>'500']) }}
    {{ Form::submit('Enviar', array('id'=>'btnSendPrivateMessage', 'class'=>'btn btn-primary'))}}
{{ Form::close()}}
