<?php

namespace App\DTO;

use App\Database\FactoryDb;

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
        return FactoryDb::getDb()->query("SELECT * FROM " . self::$table . " WHERE id = :id", __CLASS__, ['id' => $id]);
    }

    public function getUrl(): string
    {
        return "index.php?p=article&id=" . $this->id;
    }

    public function getExtrait(): string
    {
        return substr($this->content, 0, 15) . " ...";
    }

    public static function Insert(array $post)
    {
        return FactoryDb::getDb()->query("INSERT INTO  " . self::$table . "( id, title, content, createAt)".
             " VALUES((SELECT IFNULL(Max(id)+1, 1) FROM " . self::$table . "), :title, :content, :createAt)",
             __CLASS__, $post);
    }

    public static function Update(array $post)
    {
         return FactoryDb::getDb()->query("UPDATE ". self::$table .
             " SET title = :title, content = :content, createAt = :createAt WHERE id = :id",
             __CLASS__, $post);
    }

    public static function Delete(array $post)
    {
        return FactoryDb::getDb()->query("DELETE FROM ". self::$table ." WHERE id = :id",
            __CLASS__, $post);
    }

}