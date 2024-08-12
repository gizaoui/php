<?php

namespace App;


class Config
{
   public $id;
   private $settings = [];
   private static $_instance;

   public static function getInstance()
   {
      if (is_null(self::$_instance)) {
         self::$_instance = new Config();
      }
      return self::$_instance;
   }

   public function __construct()
   {
      $this->id = uniqid();
      $this->settings = require dirname(__DIR__) . '/config/Param.php';
   }

   public function get($key)
   {
      if (!isset($this->settings[$key])) {
         return null;
      } else {
         return $this->settings[$key];
      }
   }
}
