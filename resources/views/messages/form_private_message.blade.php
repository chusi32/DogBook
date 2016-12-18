{{ Form::open(array('route' => 'newMessage', 'method' => 'POST', 'files' => true, 'id' => 'formNewMessage'), array('role' => 'form')) }}
    {{ Form::hidden('idPetReceived', $petReceived->id, array('id' => 'idPetReceived')) }}
    {{ Form::textarea('message', null, ['id' => 'message','class' => 'form-control', 'placeholder'=>'Escriba el mensaje', 'required']) }}
    {{ Form::submit('Enviar')}}
{{ Form::close()}}
