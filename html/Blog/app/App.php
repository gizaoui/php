<?php

namespace App;

class App {
    
    /* Param. */
    const BD_HOST = 'mypostgres';
    const BD_NAME = 'mydb';
    const BD_USER = 'postgres';
    const BD_PASS = 'postgres';
    private static $database;
    private static $title = "Mon blog";
    
    public static function getDb() {
        if (self::$database === null) {
            self::$database = new Database ( self::BD_HOST, self::BD_NAME, self::BD_USER, self::BD_PASS );
        }
        return self::$database;
    }
    
    public static function getTitle() {
        return self::$title;
    }
    
    public static function setTitle($title) {
        self::$title = $title;
    }
}

