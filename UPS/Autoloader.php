<?php

namespace UPS;

class Autoloader {

    public static function register()
    {
        spl_autoload_register(array(new self, 'autoload'));
    }

    public static function autoload($class)
    {
        $file = realpath(dirname(__FILE__)) . '/' . str_replace('\\', '/', preg_replace('{^UPS\\\}', '', $class)) . '.php';
        if (0 !== strpos($class, 'UPS\\')){
            return;
        }else if (file_exists($file)){
            include ($file);
        }
    }
}