<?php

/**
 * Created by PhpStorm.
 * User: pedro
 * Date: 24/05/16
 * Time: 20:16
 */
class Remetentes extends Utils {

    public static function inicial(){
        echo "<h2>Remetentes</h2>";

        self::view('testando',array('teste1' => '111', 'teste2' => '222'));
    }

}