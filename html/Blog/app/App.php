<?php

namespace App;

class App {
    
    /* Param. */
    private static $database;
    private static $title = "Mon blog";
    private static $_instance;
    private $id;
    private $db_instance;
    
    public static function getInstance() {
        if (is_null ( self::$_instance )) {
            self::$_instance = new App ();
        }
        return self::$_instance;
    }
    
    public function __construct() {
        $this->id = uniqid ();
        echo __CLASS__." ".$this->id."<br>";
        // $this->settings = require dirname ( __DIR__ ) . '/app/Param.php';
    }
    
    public function getDb() {
        echo "Instance DB : " . $this->id . "<br>";
        if (! isset ( $this->db_instance )) {
            $this->db_instance = new Database ();
        }
        return $this->db_instance;
    }
    
    public static function getTitle() {
        return self::$title;
    }
    
    public static function setTitle($title) {
        self::$title = $title;
    }
}

