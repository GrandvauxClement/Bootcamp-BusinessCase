$(document).ready(function() {
    $('#input-search').on('keyup', function() {

        let value = $(this).val().toLowerCase();
        $.get('/search?terms=' + value, function(restos) {


            $('#results').html("");
            restos.forEach((resto) => {
                $('#results').append("<li><a href=" + '/reservations/' + resto.id + ">" + resto.nom +"</li>");
            });
        })
    })
});