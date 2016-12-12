$(document).ready(function(){
    //init
    $('#filters').hide();
    $('#divSex').hide();
    $('#divProvince').hide();
    $('#divBreed').hide();

    //Evento al pulsar el boton de filtros
    $('#btnFilter').click(function(event) {
        $('#filters').toggle('slow');
    });

    //Evento eliminar filtros
    $('#btnRemoveFilters').click(function(event) {
        $('#chkSex').prop("checked", "");
        $('#chkBreed').prop("checked", "");
        $('#chkProvince').prop("checked", "");
        $('#divSex').hide();
        $('#divProvince').hide();
        $('#divBreed').hide();
    });

    //Evento checkboxes
    $('#chkSex').click(function(event) {
        $('#divSex').toggle('fast');
    });

    $('#chkProvince').click(function(event) {
        $('#divProvince').toggle('fast');
    });

    $('#chkBreed').click(function(event) {
        $('#divBreed').toggle('fast');
    });
});

//Enviar formulario al pulsar boton
$('#btnSearch').click(function(event) {
    var form = $('#formBrowser');
    var url = form.attr('action');
    var data = form.serialize();

    $.post(url, data, function(result){
        $('#searchResult').empty().html(result.message);
        //message.fadeOut();
    }).fail(function(){
        alert('Ocurrio un problema al buscar. Intentelo más tarde');
        // message.show();
    });
});
