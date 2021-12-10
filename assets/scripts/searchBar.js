// ATTENTION A MODIFIER
let url = "http://localhost:8000";
let name ='';
let cp = '';
let typeCuisine = '';
$('input#name').keyup(function () {
    name = $(this).val();
    requestAjaxAndDisplayResponse(name,cp,typeCuisine);
})
$('input#code_postal').keyup(function () {
    cp = $(this).val();
    requestAjaxAndDisplayResponse(name,cp,typeCuisine);
})
$('select#typeCuisine').change(function () {
    typeCuisine = $(this).val();
    requestAjaxAndDisplayResponse(name,cp,typeCuisine);
})

function requestAjaxAndDisplayResponse(name, cp, typeCusine) {
    $.ajax({
        url: url + "?nom=" + name + "&cp=" + cp + "&typeCuisine=" + typeCusine,
        method: "GET"
    })
        .done(function (response) {
            $('#displayCardContent').html(response);
        })
}