<?php

namespace App\DTO;

use App\Database\FactoryDb;

class Table
{
    /**
     * initialisé dans la classe 'mère'.
     * @var string
     */
    protected static string $table;

    /**
     * Remplace '$row->getExtrait();' par '$row->extrait;' dans home.php
     * @param $get
     * /!\ LES CHAMPS DE LA BASE DE DONNEES DOIVENT ÊTRE EN MINUSCULE
     * @return void
     */
    public function __get($key)
    {
        // var_dump($key);
        // Renvoie la chaîne 'getExtrait' (-> Renvoie string(7) "extrait")
        $method = 'get' . ucfirst($key);
        $this->$key = $this->$method(); // Permet de ne construire qu'une fois la methode
        return $this->$key; // renvoie la methode 'getExtrait()'
    }

    #################################################
    #    REQUÊTES COMMUNES AUX BASES DE DONNEES
    #################################################

    public static function findAll(): array
    {
        // Le paramètre static::$table est initialisé dans la classe 'mère'.
        return FactoryDb::getDb()->qryFindAll(static::$table, get_called_class());
    }

    public static function findById(string $id): array
    {
        // Le paramètre static::$table est initialisé dans la classe 'mère'.
        return FactoryDb::getDb()->qryFindById(static::$table, get_called_class(), ['id' => $id]);
    }

    public static function Update(array $post): array
    {
        // Le paramètre static::$table est initialisé dans la classe 'mère'.
        return FactoryDb::getDb()->qryUpdateById(static::$table, get_called_class(), $post);
    }

    public static function Delete(array $post): array
    {
        // Le paramètre static::$table est initialisé dans la classe 'mère'.
        return FactoryDb::getDb()->qryDeleteById(static::$table, get_called_class(), $post);
    }
    public static function Insert(array $post): array
    {
        return FactoryDb::getDb()->qryInsert(static::$table, get_called_class(), $post);
    }

}