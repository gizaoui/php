<?php
namespace Tutoriel;

class Personnage
{
   // Propre à la classe et non à l'instance
   private static $max_vie = 100;

   protected $vie = 80;
   protected $atk = 20;
   protected $nom;

   public function __construct($nom)
   {
      $this->nom = $nom;   
   }


   public function isDead() {

      return $this->vie <= 0;
   }

   public function regenerer($vie=null)
   {
      if(is_null($vie)) {
         $this->vie = 100;
      }
      else {
         $this->vie += $vie;
      }
   }

   public function attaque($cible){
      $cible->vie -= 20;
      $this->vie +=20;
   }
}
