<?php

namespace App\Table;

use App\App;

class Table {
    
  
    
    public function __get($key) {
        $method = 'get' . ucfirst ( $key );
        $this->$key = $this->$method ();
        return $this->$key;
    }
    
    
  
    
}