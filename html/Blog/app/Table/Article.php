<?php

namespace App\Table;

class Article {
    
    /* Param. */
    private $id;
    private $contenu;
    private $titre;
    private $dat;
    
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
