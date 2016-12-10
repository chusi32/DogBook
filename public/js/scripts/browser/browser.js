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
