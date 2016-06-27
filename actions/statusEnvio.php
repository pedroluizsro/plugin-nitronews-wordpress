<?php

include_once ('../../../../wp-load.php');

Utils::carregaBibliotecaNitronews();

$id = $_GET['id'];
$acao = $_GET['acao'];

switch ($acao) {

    //Iniciar/retomar envio
    case '1':
        try {
            $dados = ['data' => 'agora'];

            $envio = (new Criaenvio\Envio($id))->retomar($dados);

            if ($envio) {
                header('Location: '.$_SERVER['HTTP_REFERER']);
            }

            header('Location: '.$_SERVER['HTTP_REFERER']);
        } catch (Exception $e) {
            header('Location: '.$_SERVER['HTTP_REFERER']);
        }

    //Pausar envio.
    case '2':

        try {

            $envio = (new Criaenvio\Envio($id))->pausar();

            if ($envio) {
                header('Location: '.$_SERVER['HTTP_REFERER']);
            } else {
                header('Location: '.$_SERVER['HTTP_REFERER']);
            }

        } catch (Exception $e) {
            header('Location: '.$_SERVER['HTTP_REFERER']);
        }

}
