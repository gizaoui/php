<?php
namespace Tutoriel;

class Autoloader {

   static function register() {
      spl_autoload_register(array(__CLASS__, 'autoloader'));
   }

   static function autoloader($class_name) {
      // var_dump($class_name);
      require 'class/'.str_replace(__NAMESPACE__.'\\','',$class_name).'.php';
    }
}
