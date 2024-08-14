<?php

namespace App\Table;

use App\App;

class DAO {
    protected static $table;
    
    public function __get($key) {
        $method = 'get' . ucfirst ( $key );
        $this->$key = $this->$method ();
        return $this->$key;
    }
    
    private static function getTable() {
        static::$table = end ( explode ( '\\', get_called_class () ) );
        return static::$table;
    }
    
    public static function find($id) {
        return App::getDb ()->prepare ( "SELECT * FROM " . self::getTable () . " WHERE id=?", [ $id ], __CLASS__ );
    }
}