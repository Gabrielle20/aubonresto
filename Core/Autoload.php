<?php

class Autoload
{

    // récupère les classes
    public static function autoloader($class) {
        $class = str_replace("\\", "/", $class);
        require ROOT."/$class.php";
    }


    // automatisation des requires
    public static function register() {
        spl_autoload_register(array(__CLASS__, 'autoloader'));
    }
}