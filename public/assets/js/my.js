/*$(function ($) {
    window.onload = (event) => {
        $.ajax({
            "url": "https://api.hgbrasil.com/weather?format=json-cors&key=acca0bf5&user_ip=remote",
            "method": "GET",
            //"timeout": 0
        }).done(function(resposta) {
            var desc = resposta.results.description;
            $("#tempo").text(resposta.results.temp);
            $("#city").text(resposta.results.city)
            $("#description").text(resposta.results.description);
            if (desc == 'Tempo nublado') {
                $("#icon").addClass('fa fa-cloud');
            } else {
                $("#icon").addClass('icon-weather');
            }   
           
        });
    }
}
);*/

$('.textarea').each(function () {
    var editor = new Jodit(this);
    editor.value = '';
});

$('.pagination__list').paginate({
    items_per_page: 5
});
