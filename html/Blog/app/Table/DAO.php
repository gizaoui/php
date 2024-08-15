<?php

namespace App\Table;

use App\App;

class DAO {
    protected $table;
    
    public function __construct() {
        if (is_null ( $this->table )) {
            $this->table = end ( explode ( '\\', get_class ( $this ) ) );
            echo  '- ' . $this->table .'<br>';
        }
    }
    
    public function __get($key) {
        $method = 'get' . ucfirst ( $key );
        $this->$key = $this->$method ();
        return $this->$key;
    }
    
    private static function getTable() {
        echo  end ( explode ( '\\', get_called_class () ) ) .'<br>';
        return end ( explode ( '\\', get_called_class () ) );
    }
    
    public static function find($id) {
        $config = App::getInstance();
        return $config->getDb ()->prepare ( "SELECT * FROM " . self::getTable () . " WHERE id=?", [ $id ], __CLASS__ );
    }
}