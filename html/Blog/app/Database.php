<?php

namespace App;

use PDO;
use PDOException;

class Database {
    
    /* Param. */
    private $db_name;
    private $db_user;
    private $db_pass;
    private $db_host;
    private $db_conn;
    
    public function __construct($db_host = 'mypostgres', $db_name = 'mydb', $db_user = 'postgres', $db_pass = 'postgres') {
        unset ( $this->db_conn );
        $this->db_name = $db_name;
        $this->db_user = $db_user;
        $this->db_pass = $db_pass;
        $this->db_host = $db_host;
        $this->getPDO ();
    }
    
    private function getPDO() {
        if (! isset ( $this->db_conn )) {
            try {
                $this->db_conn = new PDO ( "pgsql:host={$this->db_host};dbname={$this->db_name};user={$this->db_user};password={$this->db_pass}" );
                $this->db_conn->setAttribute ( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
            }
            catch ( PDOException $e ) {
                echo $e->getMessage ();
            }
        }
        return $this->db_conn;
    }
    
    public function query($statement, $class_name) {
        $this->getPDO ();
        try {
            $resultset = $this->db_conn->query ( $statement );
            $resultset->setFetchMode ( PDO::FETCH_CLASS, $class_name );
            return $resultset->fetchAll ();
        }
        catch ( PDOException $e ) {
            echo $e->getMessage ();
        }
    }
    
    public function prepare($statement, $attributes, $class_name) {
        $this->getPDO ();
        try {
            $resultset = $this->db_conn->prepare ( $statement );
            $resultset->execute ( $attributes );
            $resultset->setFetchMode ( PDO::FETCH_CLASS, $class_name );
            return $resultset->fetchAll ();
        }
        catch ( PDOException $e ) {
            echo $e->getMessage ();
        }
    }
}
