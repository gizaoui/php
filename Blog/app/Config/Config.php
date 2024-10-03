<?php

namespace App\Config;

class Config
{
    private array $settings = [];
    private static ?object $_instance = null;

    public static function getInstance() {
        if(is_null(self::$_instance)) {
            self::$_instance = new Config();
        }
        return self::$_instance;
    }

    public function __construct()
    {
         $this->settings = require dirname(__DIR__) . '/Config/Parameter.php';
    }

    public function get(string $key)
    {
        if (!isset($this->settings[$key])) {
            return null;
        }
        return $this->settings[$key];
    }

}