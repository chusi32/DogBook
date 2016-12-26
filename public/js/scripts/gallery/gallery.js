$(document).ready(function(){
    //Init


    //Se comprueba si se envian datos y si no se cancela el envio del formulario.
    $('#formNewImage').submit(function( event ) {
        if($('#image').val() == '')
        {
            return false;
        }
        else
        {
            return true;
        }
    });

    //Evento eliminar imagen
    $('.deleteImage').click(function(event){
        event.preventDefault();

        if (confirm('Esta acción no puede deshacerse. ¿Desea continuar?'))
        {
            var image = $(this).parents('.divImage');
            var id = image.data('id');
            var form = $('#formDeleteImageGallery');
            var url = form.attr('action').replace(':IMAGE_ID', id);
            var data = form.serialize();

            $.post(url, data, function(result){
                alert(result.message);
                image.fadeOut();
            }).fail(function(){
                alert('Ocurrio un problema al eliminar. Intentelo más tarde');
                image.show();
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
