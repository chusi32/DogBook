$(document).ready(function(){
    $('#terms').hide();

    $('#viewTerms').click(function(event) {
        event.preventDefault();
        $('#terms').toggle('slow');
    });
});
