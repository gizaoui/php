<?php
namespace Tutoriel;


class Text {

   const SUFFIX= "€";
   private static $suffix = " (ou $)";
   

   public static function withZero($chiffre){

      // Text::privWithZero($chiffre);
      return self::privWithZero($chiffre).self::$suffix;
   }

   private static function privWithZero($chiffre){
      return str_pad($chiffre, 4, "0", STR_PAD_LEFT).self::SUFFIX;
   }

}