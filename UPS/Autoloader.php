<?php

namespace UPS;

class Autoloader {

    public static function register()
    {
        spl_autoload_register(array(new self, 'autoload'));
    }

    public static function autoload($class)
    {
        if (0 !== strpos($class, 'UPS\\')){
            echo $class . ' naat found';
            return;
        }else if (file_exists($file = dirname(__FILE__) . '/' . preg_replace('{^UPS\\\}', '', $class) . '.php')){
            echo $file;
            require $file;
        }
    }
}