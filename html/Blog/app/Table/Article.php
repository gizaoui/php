<?php

namespace App\Table;

use App\App;

class Article {
    
    /* Param. */
    private $id;
    private $contenu;
    private $titre;
    private $dat;
    
    public static function getLast() {
        return App::getDb()->query('SELECT * FROM Article', __CLASS__);
    }
    
    public function __get($key) {
        $method = 'get' . ucfirst ( $key );
        $this->$key = $this->$method ();
        return $this->$key;
    }
    
    public function getId() {
        return $this->id;
    }
    
    public function getContenu() {
        return $this->contenu;
    }
    
    public function getTitre() {
        return $this->titre;
    }
    
    public function getDate() {
        return $this->dat;
    }
}
