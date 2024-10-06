<?php

namespace App\Database;


use App\Config\Config;
use App\Database;
use App\Config\Param;

class FactoryDb
{
    private static ?object $database = null;


    /**
     * Singleon
     * Tester ($this->id = uniqid() ds le constructeur)
     * var_dump(Database::getDb()); // Le uniqid doit rester le même
     * var_dump(Database::getDb()); // Le uniqid doit rester le même
     * die();
     * @return Database|object|null
     */
    public static function getDb()
    {
        if (is_null(self::$database)) {
            /**
             * Factory
             */
            switch (Config::getInstance()->get('db') ?? Param::$SQLITE) {
                case "sqlite":
                    $sqlite = Config::getInstance()->get(Param::$SQLITE)['db_file'];
                    if (empty($sqlite)) {
                        self::message(Config::getInstance()->get('db'));
                    } else {
                        //
                        self::$database = new SQLite($sqlite);
                    }
                    break;
                case "postgres":
                    // TODO: A mettre à jour
                    self::message("postgres");
                    break;
                case "mysql":
                    // TODO: A mettre à jour
                    self::message("mysql");
                    break;
                default:
                    self::message(Config::getInstance()->get('db'));
            }
        }
        return self::$database;
    }

    private static function message(string $message)
    {
        ?>
        <div class='alert alert-danger mt-4' role='alert'>
            "La base de données <em><?= $message ?></em> n'est pas disponible".
        </div>
        <?php
    }
}