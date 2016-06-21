/**
 * Created by pedro on 14/06/16.
 */
$(document).ready( function () {

    $('#listas').on('click','.ativar-lista',function () {
        var idlista = $(this).data('id');
        var url = $('#listas').data('url');
        $.ajax({
            url: url,
            method: 'post',
            data: {
                id: idlista,
                acao: 'ativar'
            },
            dataType: 'json'
        }).done(function(retorno) {



        });
    });

});