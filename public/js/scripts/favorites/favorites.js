//Evento para eliminar la mascota de favoritos
$(document).on('click', '.btnDeleteFavorite', function(){
    if (confirm('¿Desea eliminar esta mascota de su lista de favoritos?'))
    {
        var favorite = $(this);
        var id = $(this).data('id');
        var form = $('#formDeleteFavorite');
        var url = form.attr('action').replace(':FAVORITE_ID', id);
        var data = form.serialize();

        $.post(url, data, function(result){
            if(result.status == 'true')
            {
                favorite.parents('.petList').hide();
            }
             alert(result.message);
         }).fail(function(){
             alert('Ocurrio un problema al elimiar la mascota de la lista de favoritos. Inténtelo más tarde');
         });
    }
});
