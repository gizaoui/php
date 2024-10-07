<?php

namespace App\Database;

use \PDO;
use \Exception;

class QrySQLite extends Qry
{
    /**
     * Appelé par la classe FactoryDb.php à travers un Singleton.
     * @param string $db_file
     */
    public function __construct(string $dsn)
    {
        if ($this->pdo === null) {
            try {
                $this->pdo = new PDO($dsn);
                $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                // Initilisation du construteur parent.
                parent::__construct($dsn);

                // renvoie l'instance permettant d'atteindre
                // la méthode héritée 'query'.
                return $this->pdo;

            } catch (Exception $e) {
                ?>
                <div class="alert alert-danger mt-4" role="alert">
                    <?= $e->getMessage(); ?><br>
                    <em><?= $dsn; ?></em>
                </div>
                <?php
                die();
            }
        } else {
            return $this->pdo;
        }
    }

    #################################################
    #   REQUÊTE SPECIFIQUE A LA BASES DE DONNEES
    #################################################
    public function qryInsert(string $table, string $dto, array $attributes)
    {
        return FactoryDb::getDb()->query("INSERT INTO  " . $table . "( id, title, content, createdat)" .
            " VALUES((SELECT IFNULL(Max(id)+1, 1) FROM " . $table . "), :title, :content, :createdat)",
            $dto, $attributes);
    }

}