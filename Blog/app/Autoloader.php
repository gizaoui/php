<?php

namespace App;

class Autoloader
{
    static function register(): void
    {
        spl_autoload_register(array(__CLASS__, 'autoloader'));
    }

    static function autoloader(string $class_name): void
    {
        if (strpos($class_name, __NAMESPACE__) === 0) {
            $require = str_replace('\\', '/', str_replace(__NAMESPACE__ . '\\', '', $class_name));
            require __DIR__ . '/' . $require . '.php';
        } else {
            echo "<h2>Namespace non valide</h2>";
            var_dump($class_name);
        }
    }
}

