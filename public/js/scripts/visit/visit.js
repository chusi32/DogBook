$(document).ready(function(){
    //Se crean los eventos del menu de la mascota que se visita para
    //para poder acceder a las vistas.
    $('ul li a').click(function(event){
        event.preventDefault();
        var url = $(this).attr('href');

        $.get(url, function(result){
            alert(result);
            $('#visitContent').empty().html(result);
        }).fail(function(){
            alert('Ocurrio un problema al cargar la galeria de la mascota. Intentelo más tarde');
        });
    });
});
