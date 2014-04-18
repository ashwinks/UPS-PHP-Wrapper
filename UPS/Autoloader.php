<?php

namespace UPS;

/**
 * Autoloads UPS classes
 *
 * @package ups
 */
class Autoloader {
    /**
     * Register the autoloader
     */
    public static function register() {
        spl_autoload_register(array(new self, 'autoload'));
    }

    /**
     * Autoloader
     *
     * @param   string
     */
    public static function autoload($class) {
        if (0 !== strpos($class, 'UPS\\')) {
            echo $class . ' naat found';
            return;
        } else if (file_exists($file = dirname(__FILE__) . '/' . preg_replace('{^UPS\\\}', '', $class) . '.php')) {
            echo $file;
            require $file;
        }
    }
}