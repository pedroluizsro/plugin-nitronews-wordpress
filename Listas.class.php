<?php

/**
 * Created by PhpStorm.
 * User: pedro
 * Date: 24/05/16
 * Time: 20:08
 */
class Listas {

    public static function inicial(){

        Controlador::carregaBibliotecaNitronews();

        $parametros = array('ativo' => true);
        $grupos = (new Criaenvio\Grupo())->buscar($parametros);


        var_dump($grupos->getDados());

    }

}