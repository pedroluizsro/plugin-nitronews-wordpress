<?php

/**
 * Created by PhpStorm.
 * User: pedro
 * Date: 24/05/16
 * Time: 21:26
 */
class Controlador {

    /**
     * Prepara os dados e monta a view.
     *
     * @param $view string
     * @param $dados array
     * @return mixed
     */
    public function view($view, $dados = null){

        if(!$view){
            die('Informe o nome da view.');
        }

        //Extrai variáveis do array.
        if($dados){

            if(!is_array($dados)){
                die('Dados não é um array.');
            }

            extract($dados);
        }

        $arquivo = __DIR__.'/views/'.get_called_class().'/'.$view.'.php';

        if(!file_exists($arquivo)){
            die('View informada não existe.');
        }

        $logo_nitronews = plugins_url('/imagens/nitronews.png',__FILE__);

        echo "<br><br>";
        echo "<img src=\"$logo_nitronews\">";

        include_once($arquivo);

    }

    public static function carregaBibliotecaNitronews($parchave = null){
        global $wpdb;

        $sql = "
            SELECT chave FROM wpnn_chave ORDER BY id DESC LIMIT 1
        ";

        $chaves = $wpdb->get_results($sql);

        include_once('biblioteca-nitronews/Criaenvio_loader.php');

        if($parchave){
            define('NN_CHAVE', $parchave);
            return $parchave;
        } elseif (count($chaves)){
            foreach ($chaves as $chave) {
                define('NN_CHAVE', $chave->chave);
                return $chave->chave;
            }
        }

        return false;
    }

    public static function gerarUrl($params = null){

        if(!$params){
            die('Parâmetros não informados');
        }

        $url = $_SERVER['REQUEST_URI'];
        foreach ($params as $chave => $param) {
            $url .= "&$chave=$param";
        }

        return $url;
    }

}