<?php
namespace Tutoriel;

class Archer extends Personnage {
   
   public $arc = 3;


   public function attaque($cible){
      parent::attaque($cible);
   }
}
