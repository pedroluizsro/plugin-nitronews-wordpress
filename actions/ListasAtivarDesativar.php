<?php

Utils::carregaBibliotecaNitronews();

try {

    if(!is_array($_POST) OR !$_POST['id'] OR !$_POST['acao']){
        echo array(
            'sucesso' => 'no'
        );
        die;
    }

    $id = $_POST['id'];

    if(!$_POST['acao'] == 'ativar'){
        $resultado = (new Criaenvio\Grupo($id))->ativar();
    } else {
        $resultado = (new Criaenvio\Grupo($id))->desativar();
    }

    if ($resultado) {
        echo array(
            'sucesso' => 'ok'
        );
        die;
    } else {
        echo array(
            'sucesso' => 'no'
        );
        die;
    }

} catch (Exception $e) {
    echo array(
        'sucesso' => 'no'
    );
    die;
}
