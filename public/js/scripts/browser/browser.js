$(document).ready(function(){
    //Init
    $('#filters').hide();
    $('#divSex').hide();
    $('#divProvince').hide();
    $('#divBreed').hide();

    $.get('/locations/1', function(response, province){
        $('#location').empty();
        for(i=0; i<response.length; i++)
        {
            $('#location').append('<option value="' + response[i].id + '">' + response[i].nombreLocalidad + '</option>');
        }
    });

    //Evento al cambiar la provincia
    $('#province').change(function(event){
        $.get('/locations/' + event.target.value, function(response, province){
            $('#location').empty();
            for(i=0; i<response.length; i++)
            {
                $('#location').append('<option value="' + response[i].id + '">' + response[i].nombreLocalidad + '</option>');
            }
        });
    });

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

    //Evento eliminar filtro nombre.
    $('.input-group-addon').click(function(event) {
        $('#name').val('');
    });



});

//Enviar formulario al pulsar boton
$('#btnSearch').click(function(event) {
    var form = $('#formBrowser');
    var url = form.attr('action');
    var data = form.serialize();

    $.post(url, data, function(result){
        $('#searchResult').empty().html(result);
        //message.fadeOut();
    }).fail(function(){
        alert('Ocurrio un problema al buscar. Intentelo más tarde');
        // message.show();
    });
});

//Evento para la paginación
$(document).on('click', '.pagination a', function(e){
    e.preventDefault();

    var page = $(this).attr('href').split('page=')[1];
    var form = $('#formBrowser');
    var url = form.attr('action');
    var data = form.serializeArray();
    data.push({name: 'page', value: page});



    $.ajax({
        url: url,
        headers: {
             'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          },
        data: data,
        type: 'POST',
        dataType: 'json',
        success: function(data){
            $('#searchResult').empty().html(data);
        }
    });
});

//Evento para añadir mascotas a favoritos
$(document).on('click', '.btnAddFavorite', function(){

    // event.preventDefault();

    if (confirm('¿Desea agregar esta mascota a su lista de favoritos?'))
    {
        var favorite = $(this);
        var id = $(this).data('id');
        alert(id);
        var form = $('#formAddFavorite');
        var url = form.attr('action').replace(':FAVORITE_ID', id);
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
