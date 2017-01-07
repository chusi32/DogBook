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
        type: 'GET',
        dataType: 'json',
        success: function(data){
            $('#searchResult').empty().html(data);
        }
    });
});
