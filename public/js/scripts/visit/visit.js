$(document).ready(function(){
    //Se crean los eventos del menu de la mascota que se visita para
    //para poder acceder a las vistas.
    $('li.petMenu a').click(function(event){
        event.preventDefault();
        var url = $(this).attr('href');

        $.get(url, function(result){
            $('#visitContent').empty().html(result);
        }).fail(function(){
            alert('Hubo un problema al acceder al contenido. Inténtelo más tarde');
        });
    });
});

//Enviar formulario de mensaje privado
// $('#btnSendPrivateMessage').click(function(event){
//     event.preventDefault();
//     // var send = false;
//     var form = $('$formPrivateMessage');
//     var url = form.attr('action');
//     var data = form.serializeArray();
//     var visitPet = $('#petReceived').val();
//
//     $.post(url, data, function(result){
//         //alert(result.message);
//
//     }).fail(function(){
//         alert('Ocurrio un problema al enviar el mensaje. Inténtelo más tarde');
//     });
//
//     if(send == "true")
//     {
//         $.get('/visit/' + visitPet, function(result){
//             $('#visitContent').empty().html(result);
//         }).fail(function(){
//             alert('No se pudo recargar el muro de la mascota que está visitando');
//         });
//     }
// });
