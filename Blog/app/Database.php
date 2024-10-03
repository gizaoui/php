<?php

namespace App;

use \PDO;
use \Exception;
use App\Config\Config;

class Database
{
    private array $settings = [];
    private string $db_file;
    private ?object $pdo = null;

    private static ?object $database = null;

    /**
     * Singleon
     * Tester ($this->id = uniqid() ds le constructeur)
     * var_dump(Database::getDb());
     * var_dump(Database::getDb());
     * die();
     * @return Database|object|null
     */
    public static function getDb()
    {
        if (is_null(self::$database)) {
            self::$database = new Database(Config::getInstance()->get('db_file'));
        }
        return self::$database;
    }

    public function __construct(string $db_file)
    {
        // $this->id = uniqid();
        $this->db_file = $db_file;
    }

    private function getPDO(): object
    {
        if ($this->pdo === null) {
            try {
                $this->pdo = new PDO("sqlite:" . __DIR__ . "/" . $this->db_file);
                $this->pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
                // ERRMODE_WARNING | ERRMODE_EXCEPTION | ERRMODE_SILENT
                $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                return $this->pdo;
            } catch (Exception $e) {
                echo $e->getMessage();
                die();
            }
        } else {
            return $this->pdo;
        }
    }

    public function query(string $statement, string $class_name, array $attributes = []): array
    {
        try {
            $this->getPDO();
            if (count($attributes) > 0) {
                $stmt = $this->pdo->prepare($statement);
                $stmt->execute($attributes);
            } else {
                $stmt = $this->pdo->query($statement);
            }
            // return $stmt->fetchAll(PDO::FETCH_OBJ);
            return $stmt->fetchAll(PDO::FETCH_CLASS, $class_name);
        } catch (Exception $e) {
            echo $e->getMessage();
            die();
        }
    }


}