<?php

namespace App\Database;

use \PDO;
use \Exception;
use PDOStatement;

class Qry
{
    protected ?object $pdo = null;
    protected string $dsn;

    protected function __construct(string $dsn = null)
    {
        // Récupération de l'url de connection à la base de données
        $this->dsn = $dsn;
    }

    protected function query(string $statement, string $dto, array $attributes = []): array
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

    #################################################
    #   REQUÊTES COMMUNES AUX BASES DE DONNEES
    #################################################

    public function qryFindAll(string $table, string $dto): array
    {
        return $this->query("SELECT * FROM " . $table, $dto);
    }

    public function qryFindById(string $table, string $dto, array $attributes): array
    {
        return $this->query("SELECT * FROM " . $table . " WHERE id = :id", $dto, $attributes);
    }

    public function qryUpdateById(string $table, string $dto, array $attributes): array
    {
        return $this->query("UPDATE " . $table .
            " SET title = :title, content = :content, createdat = :createdat " .
            " WHERE id = :id", $dto, $attributes);
    }

    public function qryDeleteById(string $table, $dto, array $attributes): array
    {
        return $this->query("DELETE FROM " . $table . " WHERE id = :id", $dto, $attributes);
    }

}