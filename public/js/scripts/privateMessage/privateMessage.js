$(document).ready(function(){

    //Evento eliminar mensaje
    $('.btnDeleteMessage').click(function(event){
        event.preventDefault();

        if (confirm('Esta acción no puede deshacerse. ¿Desea continuar?'))
        {
            var message = $(this).parents('.media');
            var id = message.data('id');
            var form = $('#formDeleteMessage');
            var url = form.attr('action').replace(':MESSAGE_ID', id);
            var data = form.serialize();

            $.post(url, data, function(result){
                alert(result.message);
                message.fadeOut();
            }).fail(function(){
                alert('Ocurrio un problema al eliminar. Intentelo más tarde');
                message.show();
            });
        }
    });

    //Evento eliminar todos los mensajes
    $('#btnDeleteAllMessages').click(function(event){
        event.preventDefault();

        if (confirm('Esta acción no puede deshacerse. ¿Desea vaciar la bandeja de entrada?'))
        {
            var form = $('#formDeleteAllMessages');
            var url = form.attr('action');
            var data = form.serialize();

            $.post(url, data, function(result){
                alert(result.message);
                $('div.comments-list').fadeOut();
            }).fail(function(){
                alert('Ocurrio un problema al vaciar la bandeja de entrada. Intentelo más tarde');
                $('div.comments-list').show();
            });
        }
    });

});
