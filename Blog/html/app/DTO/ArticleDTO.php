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


    #################################################
    #        SPECIFIQUE A LA TABLE ARTICLE
    #################################################

    public function getUrl(): string
    {
        return "index.php?id=" . $this->id;
    }

    public function getExtrait(): string
    {
        return substr($this->content, 0, 15) . " ...";
    }
}