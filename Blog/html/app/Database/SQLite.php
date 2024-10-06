<?php

namespace App\Database;

use \PDO;
use \Exception;

class SQLite extends SQL
{


    /**
     * Appelé par la classe FactoryDb.php à travers un Singleton.
     * @param string $db_file
     */
    public function __construct(string $db_file)
    {
        if ($this->pdo === null) {
            try {
                $this->pdo = new PDO("sqlite:" . __DIR__ . "/" . $db_file);
                $this->pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
                // ERRMODE_WARNING | ERRMODE_EXCEPTION | ERRMODE_SILENT
                $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                // Initilisation du construteur parent.
                parent::__construct("sqlite:" . __DIR__ . "/" . $db_file);

                // renvoie l'instance permettant d'atteindre
                // la méthode héritée 'query'.
                return $this->pdo;

            } catch (Exception $e) {
                ?>
                <div class="alert alert-danger mt-4" role="alert">
                    <?= $e->getMessage(); ?><br>
                    <em><?= __DIR__ . "/" . $db_file; ?></em>
                </div>
                <?php
                die();
            }
        } else {
            return $this->pdo;
        }
    }


}