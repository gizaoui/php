<?php

namespace App\Database;

use \PDO;
use \Exception;

class SQL
{
    protected ?object $pdo = null;
    protected string $connDbURL;

    protected function __construct(string $connDbURL = null)
    {
        // Récupération de l'url de connection à la base de données
        $this->connDbURL = $connDbURL;
    }

    public function query(string $statement, string $dto, array $attributes = []): array
    {
        try {
            if (count($attributes) > 0) {
                $stmt = $this->pdo->prepare($statement);
                $stmt->execute($attributes);
            } else {
                $stmt = $this->pdo->query($statement);
            }
            // return $stmt->fetchAll(PDO::FETCH_OBJ);
            return $stmt->fetchAll(PDO::FETCH_CLASS, $dto);
        } catch (Exception $e) {
            echo $statement . '<hr>' . PHP_EOL;
            echo $e->getMessage() . '<hr>' . PHP_EOL;
            die();
        }
    }


}