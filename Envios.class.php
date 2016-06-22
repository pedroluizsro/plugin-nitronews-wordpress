<?php

/**
 * Created by PhpStorm.
 * User: pedro
 * Date: 24/05/16
 * Time: 20:13
 */
class Envios extends Utils {

    public static function inicial(){

        //Insere Script
        wp_enqueue_script('Listas',plugins_url('/javascript/envios.js',__FILE__));

        //Inicia array de listas;
        $dados['envios'] = array();

        //Carega biblioteca Criaenvio
        Utils::carregaBibliotecaNitronews();

        $contador = 0;
        //Busca envios
        $parametros = array();  // nome e id
        $envios = (new Criaenvio\Envio())->buscar($parametros);
        foreach ($envios->getDados() as $envio) {
            if($contador < 10){
                $mensagem = (new Criaenvio\Mensagem($envio->id_mensagem))->carregar();
                $dados['envios'][$envio->codigo] = $envio;
                $dados['envios'][$envio->codigo]->mensagem = $mensagem;
            }
            $contador++;
        }

        return self::view('listagem_envios',$dados);

    }

}