$(document).ready(function () {
    $('.panel-heading span.clickable').click();
    $('.panel div.clickable').click();

    //Evento eliminar mensaje
    $('.btnDeletePet').click(function(event){
        event.preventDefault();

        if (confirm('Si borra la mascota, borrará toda la información que pertenezca a ella.' +
                    'Esta acción no puede deshacerse. ¿Desea continuar?'))
        {
            var pet = $(this).parents('.data-pet');
            var id = pet.data('id');
            var form = $('#formDeletePet');
            var url = form.attr('action').replace(':PET_ID', id);
            var data = form.serialize();

            $.post(url, data, function(result){
                alert(result.message);
                pet.fadeOut();
            }).fail(function(){
                alert('Ocurrio un problema al eliminar. Intentelo más tarde');
                pet.show();
            });
        }
    });

});

$(document).on('click', '.panel-heading span.clickable', function (e) {
    var $this = $(this);
    if (!$this.hasClass('panel-collapsed')) {
        $this.parents('.panel').find('.panel-body').slideUp();
        $this.addClass('panel-collapsed');
        $this.find('i').removeClass('glyphicon-minus').addClass('glyphicon-plus');
    } else {
        $this.parents('.panel').find('.panel-body').slideDown();
        $this.removeClass('panel-collapsed');
        $this.find('i').removeClass('glyphicon-plus').addClass('glyphicon-minus');
    }
});
$(document).on('click', '.panel div.clickable', function (e) {
    var $this = $(this);
    if (!$this.hasClass('panel-collapsed')) {
        $this.parents('.panel').find('.panel-body').slideUp();
        $this.addClass('panel-collapsed');
        $this.find('i').removeClass('glyphicon-minus').addClass('glyphicon-plus');
    } else {
        $this.parents('.panel').find('.panel-body').slideDown();
        $this.removeClass('panel-collapsed');
        $this.find('i').removeClass('glyphicon-plus').addClass('glyphicon-minus');
    }
});
