$(document).ready(function(){
    //inicializar select localidades
    $.get('/locations/1', function(response, province){
        $('#location').empty();
        for(i=0; i<response.length; i++)
        {
            $('#location').append('<option value="' + response[i].id + '">' + response[i].nombreLocalidad + '</option>');
        }
    });

    //Ocultamos la region del div de la información del pedigree
    $('#pedigree').hide();

    //Si está el checkbox de pedigree marcado al inicio de la carga de la página,
    //significa que se ha intentado registrar pero ha dado fallo la validación de
    //la información del pedigree. Por lo tanto mostramos el div de pedigree para
    //que se vea el error y si no lo ocultamos.
    if($('#chkPedigree').is(':checked'))
        $('#pedigree').show();
    else
        $('#pedigree').hide();
        
    //Mostrar u ocultar el div de la info del pedigree dependiendo del estado del checkbox
    $("#chkPedigree").click(function() {
        if($(this).is(':checked')) {
            $('#pedigree').toggle();
        } else {
            $('#pedigree').toggle();
            $('#nameFather').val('');
            $('#nameMother').val('');
            $('#description').val('')
        }
    });
});

$('#province').change(function(event){
    $.get('/locations/' + event.target.value, function(response, province){
        $('#location').empty();
        for(i=0; i<response.length; i++)
        {
            $('#location').append('<option value="' + response[i].id + '">' + response[i].nombreLocalidad + '</option>');
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
        $(".image-preview-input-title").text("Browse");
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
