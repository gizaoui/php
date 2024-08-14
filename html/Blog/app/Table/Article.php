<?php

namespace App\Table;

use App\App;

class Article extends DAO {
    
    /* Param. */
    protected $id;
    protected $contenu;
    protected $titre;
    protected $dat;
    protected $categorie;
    
    public static function getLast() {
        return App::getDb ()->query ( "SELECT a.id, a.titre, a.contenu, a.dat, c.titre as categorie FROM Article a LEFT JOIN Categorie c ON a.categorie=c.id", __CLASS__ );
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
    
    public function getCategorie() {
        return $this->categorie;
    }
}
