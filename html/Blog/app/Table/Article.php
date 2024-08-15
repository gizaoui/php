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
        
    private static $_instance;
    
    public static function getInstance() {
        if (is_null ( self::$_instance )) {
            self::$_instance = new Article ();
        }
        return self::$_instance;
    }
    
    public function __construct() {
        $this->id = uniqid ();
        echo __CLASS__." ".$this->id."<br>";
    }
    
    
    
    public static function getLast() {
        $config = App::getInstance ();
        return $config->getDb ()
            ->query ( "SELECT a.id, a.titre, a.contenu, a.dat, c.titre as categorie FROM Article a LEFT JOIN Categorie c ON a.categorie=c.id", __CLASS__ );
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
