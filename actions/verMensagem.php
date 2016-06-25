<?php

include_once ('../../../../wp-load.php');

Utils::carregaBibliotecaNitronews();

if($_GET['id']){
    $mensagem = (new Criaenvio\Mensagem($_GET['id']))->carregar();

    echo $mensagem->html;

} else {
    die ("Informe um id de mensagem");
}

