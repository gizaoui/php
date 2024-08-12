<?php

use \Tutoriel\Autoloader;
use \Tutoriel\Form;
use \Tutoriel\Text;
use \Tutoriel\Personnage;
use \Tutoriel\Archer;

// namespace Tutoriel;

# php -S localhost:3000 -t /home/gizaoui/git/github/php


// require "class/Text.php";
// require "class/Form.php";
// require 'class/Personnage.php';
// require 'class/Archer.php';

require 'class/Autoloader.php';
Autoloader::register();





 $form = new Form(array('username' => 'Roger'));

 echo $form->my_date();
 echo $form->input("username");
 echo $form->input("password");
 echo $form->submit();
 var_dump($form);

 var_dump(Text::withZero(4));


$merlin = new Personnage("Merlin");
$merlin->regenerer();

$harry = new Personnage("Harry");

$merlin->attaque($harry);

var_dump($merlin);
var_dump($harry);


$legolas = new Archer('Legolas');
$legolas->attaque($harry);

var_dump($legolas);

if ($harry->isDead()) {
  echo 'Harry est mort :(';
} else {
  echo 'Harry a survécu';
}