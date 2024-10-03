<?php

namespace App\DTO;

use App\Database;

class ArticleDTO extends Table
{
    /**
     * Doit $être définie 'static' dans la classe fille 'Table'
     * pour pouvoir être initialisé depuis la classe mère.
     * comme ci-dessous ($table="Article")
     * @var string
     */
    protected static string $table = "Article";

    // Déporté dans la classe Table
    // public static function findAll() :array {
    //   return App::getDb()->query("SELECT id, title, content, createAt FROM Article", __CLASS__);
    // }

    public static function findById(string $id): array
    {
        return Database::getDb()->query("SELECT * FROM " . self::$table . " WHERE id = :id", __CLASS__, ['id' => $id]);
    }

    public function getUrl(): string
    {
        return "index.php?p=article&id=" . $this->id;
    }

    public function getExtrait(): string
    {
        return substr($this->content, 0, 15) . " ...";
    }

}