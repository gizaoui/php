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
     * Permet de cutomiser l'appel de methode
     * @param $get
     *  Remplacer '$row->getExtrait();' par '$row->extrait;' dans home.php
     *  -> Renvoie string(7) "extrait"
     * @return void
     */
    public function __get($key)
    {
        // var_dump($key);
        // Renvoie la chaîne 'getExtrait'
        $method = 'get' . ucfirst($key);
        $this->$key = $this->$method(); // Permet de ne construire qu'une fois la methode
        return $this->$key; // renvoie la methode 'getExtrait()'
    }

    /**
     * Extraction du nom de la table
     * static::$table permet la récupération du contenu du
     *  paramètre '$table' initialisé depuis la classe mère.
     * @return array
     */
    public static function findAll(): array
    {
        // Le paramètre static::$table est initialisé dans la classe 'mère'.
        return FactoryDb::getDb()->query("SELECT * FROM ".static::$table, get_called_class());
    }

}