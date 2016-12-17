{{-- <div class="col-sx-12 col-sm-12 col-md-8 col-lg-8 col-md-offset-2 col-lg-offset-2"> --}}
<div>
    {{-- Botón que activa el formulario para crear una nueva entrada --}}
    {{ Form::button('Publicar', array('id' => 'btnNewMessage','class' => 'btn btn-primary pull-left')) }}
    <br />
    <br />
    {{-- Formulario para la creación de una nueva entrada --}}
    {{ Form::open(array('route' => 'newMessage', 'method' => 'POST', 'files' => true, 'id' => 'formNewMessage'), array('role' => 'form')) }}
        {{ csrf_field() }}
        {{ Form::hidden('idPet', $pet->id, array('id' => 'idPet')) }}
        {{ Form::hidden('idWall', $pet->idMuro, array('id' => 'idWall')) }}
        {{-- Mensaje --}}
        <div class="form-group">
          {{ Form::label('message', 'Mensaje')}}
          {{ Form::textarea('message', null, ['id' => 'message','class' => 'form-control', 'rows' => 2, 'placeholder' => 'Escriba su nueva entrada']) }}
        </div>
        {{-- Foto --}}
        <div class="input-group image-preview">
            <input type="text" class="form-control image-preview-filename" disabled="disabled"> <!-- don't give a name === doesn't send on POST/GET -->
            <span class="input-group-btn">
                <!-- image-preview-clear button -->
                <button type="button" class="btn btn-default image-preview-clear" style="display:none;">
                    <span class="glyphicon glyphicon-remove"></span> Clear
                </button>
                <!-- image-preview-input -->
                <div class="btn btn-default image-preview-input">
                    <span class="glyphicon glyphicon-folder-open"></span>
                    <span class="image-preview-input-title">Browse</span>
                    <input type="file" accept="image/png, image/jpeg, image/gif" id="image" name="image"/> <!-- rename it -->
                </div>
            </span>
        </div>
        {{-- Video --}}
        <div class="form-group">
          {{ Form::label('video', 'URL Youtube')}}
          {{ Form::text('video', null, array('class' => 'form-control')) }}
        </div>
        {{ Form::submit('Enviar') }}
    {{ Form::close()}}
    <br />
</div>
