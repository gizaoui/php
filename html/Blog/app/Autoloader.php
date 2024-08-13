<?php

namespace App;

class Autoloader {

   static function register() {
      spl_autoload_register(array(__CLASS__, 'autoloader'));
   }

   static function autoloader($class_name) {
      // print( $class_name."<br>");
      require str_replace(__NAMESPACE__.'/','', str_replace('\\','/', $class_name)).'.php';
    }
}
