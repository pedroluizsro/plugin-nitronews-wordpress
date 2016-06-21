<?php

include_once ('../../../../wp-load.php');

Utils::carregaBibliotecaNitronews();

try {

    if(!is_array($_POST) OR !$_POST['id'] OR !$_POST['acao']){
        echo json_encode(array(
            'sucesso' => 'no'
        ));
        die;
    }

    $id = $_POST['id'];

    if($_POST['acao'] == 'ativar'){
        $resultado = (new Criaenvio\Grupo($id))->ativar();
    } else {
        $resultado = (new Criaenvio\Grupo($id))->desativar();
    }

    if ($resultado) {
        echo json_encode(array(
            'sucesso' => 'ok'
        ));
        die;
    } else {
        echo json_encode(array(
            'sucesso' => 'no'
        ));
        die;
    }

} catch (Exception $e) {
    echo json_encode(array(
        'sucesso' => 'no'
    ));
    die;
}
