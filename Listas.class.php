<?php

/**
 * Created by PhpStorm.
 * User: pedro
 * Date: 24/05/16
 * Time: 20:08
 */
class Listas extends Utils{

    public static function inicial(){

        //Inicia array de listas;
        $dados['listas'] = array();

        //Carega biblioteca Criaenvio
        Utils::carregaBibliotecaNitronews();

        //Parametros para busca de listas ativas.
        $parametros = array('ativo'=>true);
        $gruposAtivos = (new Criaenvio\Grupo())->buscar($parametros);

        //Parametros para busca de listas inativas.
        $parametros = array('ativo'=>false);
        $gruposNaoAtivos = (new Criaenvio\Grupo())->buscar($parametros);

        //Armazena listas ativas em array
        foreach ($gruposAtivos->getDados() as $grupoAtivo) {
            array_push($dados['listas'],$grupoAtivo);
        }

        //Armazena listas inativas em array
        foreach ($gruposNaoAtivos->getDados() as $grupoNaoAtivo) {
            array_push($dados['listas'],$grupoNaoAtivo);
        }

        //Ordena listas em ordem alfabética
        sort($dados['listas']);
        return self::view('listagem_listas',$dados);

    }

}