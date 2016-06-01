<?php

/**
 * Created by PhpStorm.
 * User: pedro
 * Date: 17/05/16
 * Time: 20:34
 */

class Nitronews extends Controlador {

    public static function iniciar(){

        add_action('admin_menu', array('Nitronews','insereMenu'));
        add_action('admin_menu', array('Nitronews','menuListas'));
        add_action('admin_menu', array('Nitronews','menuMensagens'));
        add_action('admin_menu', array('Nitronews','menuEnvios'));
        add_action('admin_menu', array('Nitronews','menuCamposPersonalizados'));
        add_action('admin_menu', array('Nitronews','menuRemetentes'));

    }

    public static function instalar(){
        global $wpdb;

        $sql = "
            CREATE TABLE IF NOT EXISTS wpnn_chave (
              id INT AUTO_INCREMENT PRIMARY KEY,
              chave VARCHAR(100)
            )
        ";

        $wpdb->query($sql);

    }

    public static function desinstalar(){
        global $wpdb;

        $sql = "
            DROP TABLE wpnn_chave;
        ";

        $wpdb->query($sql);
    }

    public static function insereMenu(){
        add_menu_page('Plugin Nitronews','Nitronews',10,'nitronews',array('Nitronews','menuNitronews'),'',67);
    }

    public static function menuNitronews(){

        //Caso haja chave no post, efetua inserção.
        if($_POST['chave']){
            self::cadastrarChave($_POST['chave']);
            return self::view('cadastrado',array('chave' => $_POST['chave'],'sucesso' => true));
        }

        //Carrega chave da API e Biblioteca Criaenvio
        $chave = self::carregaBibliotecaNitronews();

        //Verifica se possui chave e se quer cadastrar nova;
        if($chave AND !$_GET['nova']){
            return self::view('cadastrado',array('chave' => $chave));
        }

        //Retorna view para cadastro.
        return self::view('cadastrar');
    }

    public static function menuListas(){
        add_submenu_page('nitronews','Listas','Listas',10,'listas',array('Listas','inicial'));
    }

    public static function menuMensagens(){
        add_submenu_page('nitronews','Mensagens','Mensagens',10,'mensagens',array('Mensagens','inicial'));
    }

    public static function menuEnvios(){
        add_submenu_page('nitronews','Envios','Envios',10,'envios',array('Envios','inicial'));
    }

    public static function menuCamposPersonalizados(){
        add_submenu_page('nitronews','Campos Personalizados','Campos Personalizados',10,'campos-personalizados',array('CamposPersonalizados','inicial'));
    }

    public static function menuRemetentes(){
        add_submenu_page('nitronews','Remetentes','Remetentes',10,'remetentes',array('Remetentes','inicial'));
    }

    public static function cadastrarChave($chave){
        global $wpdb;

        $sql = "
            INSERT INTO wpnn_chave (chave) VALUES ('$chave');
        ";

        $wpdb->query($sql);
    }

}