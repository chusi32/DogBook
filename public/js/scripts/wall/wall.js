$(document).ready(function(){
    // Se oculta el formulario de añadir entrada
    $('#formNewMessage').hide();

    //Evento al pulsar el boton de nuevo mensaje. (Mostrar u ocultar formulario)
    $('#btnNewMessage').click(function(){
        $('#formNewMessage').toggle();
    });

    //Se comprueba si se envian datos y si no se cancela el envio del formulario.
    $('#formNewMessage').submit(function( event ) {
        if($('#message').val() == '' && $('#image').val() == '' && $('#video').val() == '')
        {
            return false;
        }
        else
        {
            return true;
        }
    });

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
});



/*
    PARA EL INPUT FILE
 */

$(function() {
    // Create the close button
    var closebtn = $('<button/>', {
        type:"button",
        text: 'x',
        id: 'close-preview',
        style: 'font-size: initial;',
    });
    closebtn.attr("class","close pull-right");
    // Set the popover default content
    $('.image-preview').popover({
        trigger:'manual',
        html:true,
        title: "<strong>Preview</strong>"+$(closebtn)[0].outerHTML,
        content: "There's no image",
        placement:'bottom'
    });
    // Clear event
    $('.image-preview-clear').click(function(){
        $('.image-preview').attr("data-content","").popover('hide');
        $('.image-preview-filename').val("");
        $('.image-preview-clear').hide();
        $('.image-preview-input input:file').val("");
        $(".image-preview-input-title").text("Buscar");
    });
    // Create the preview image
    $(".image-preview-input input:file").change(function (){
        var img = $('<img/>', {
            id: 'dynamic',
            width:250,
            height:200
        });
        var file = this.files[0];
        var reader = new FileReader();
        // Set preview image into the popover data-content
        reader.onload = function (e) {
            $(".image-preview-input-title").text("Change");
            $(".image-preview-clear").show();
            $(".image-preview-filename").val(file.name);
            img.attr('src', e.target.result);
            $(".image-preview").attr("data-content",$(img)[0].outerHTML);//.popover("show");
        }
        reader.readAsDataURL(file);

        $('.image-preview').hover(
            function () {
               $('.image-preview').popover('show');
            },
             function () {
               $('.image-preview').popover('hide');
            }
        );
    });
});
