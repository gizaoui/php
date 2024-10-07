<?php

namespace App\Database;

use App\Config\Config;
use App\Database;

/**
 * Création des instances de connexion aux bases de données.
 */
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
            switch (Config::getInstance()->get('db') ?? 'sqlite') {
                case "sqlite":
                    $sqlite = Config::getInstance()->get('sqlite');
                    if (empty($sqlite)) {
                        self::message(Config::getInstance()->get('db'));
                    } else {
                        self::$database = new QrySQLite($sqlite['dsn']);
                    }
                    break;
                case "postgres":
                    $postgres = Config::getInstance()->get('postgres');
                    if (empty($postgres)) {
                        self::message(Config::getInstance()->get('db'));
                    } else {
                        self::$database = new QryPostgres($postgres['dsn'],$postgres['user'],$postgres['password']);
                    }
                    break;
                case "mysql":
                    // TODO: A mettre à jour
                    self::message("mysql");
                    break;
                case "sqlserver":
                    // TODO: A mettre à jour
                    self::message("sqlserver");
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