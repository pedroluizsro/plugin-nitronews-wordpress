/**
 * Created by pedro on 14/06/16.
 */
$(document).ready( function () {

    $('#listas').on('click','.ativar-lista',function () {
        var lista = $(this);
        var idlista = lista.data('id');
        var url = $('#listas').data('url');
        var btext = lista.text();
        if(!lista.prop('disabled')){
            lista.text('...').prop('disabled',true);
            $.ajax({
                url: url,
                method: 'post',
                data: {
                    id: idlista,
                    acao: 'ativar'
                },
                dataType: 'json'
            }).done(function(retorno) {

                if(retorno.sucesso == "ok"){
                    lista.text('Y').removeClass('ativar-lista').addClass('desativar-lista');
                }

            }).always(function () {
                lista.prop('disabled',false);
            }).fail(function () {
                lista.text(btext);
            });
        }
    });

    $('#listas').on('click','.desativar-lista',function () {
        var lista = $(this);
        var idlista = lista.data('id');
        var url = $('#listas').data('url');
        var btext = lista.text();
        if(!lista.prop('disabled')){
            lista.text('...').prop('disabled',true);
            $.ajax({
                url: url,
                method: 'post',
                data: {
                    id: idlista,
                    acao: 'desativar'
                },
                dataType: 'json'
            }).done(function(retorno) {

                if(retorno.sucesso == "ok"){
                    lista.text('N').removeClass('desativar-lista').addClass('ativar-lista');
                }

            }).always(function () {
                lista.prop('disabled',false);
            }).fail(function () {
                lista.text(btext);
            });
        }
    });

});