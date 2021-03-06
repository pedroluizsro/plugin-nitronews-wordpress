<?php

/*
Plugin Name: Nitronews Plugin
Plugin URI: http://URI_Of_Page_Describing_Plugin_and_Updates
Description: Plugin de Wordpress para o sistema de e-mail marketing Nitronews.
Version: 1.0
Author: Pedro Luiz Sroczynski
Author URI: http://www.nitronews.com.br/
License: A "Slug" license name e.g. GPL2
*/

spl_autoload_register(function ($classe) {
    if(!strstr($classe,'Criaenvio')){
        include $classe. '.class.php';
    }
});

//Executa quando ativar o plugin.
register_activation_hook(__FILE__,array('Nitronews','instalar'));
register_deactivation_hook(__FILE__,array('Nitronews','desinstalar'));


add_filter('init',array('Nitronews','iniciar'));