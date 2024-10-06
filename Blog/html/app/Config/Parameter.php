<?php

const SQLITE = 'sqlite';
const POSTGRES = 'postgres';
const MYSQL = 'mysql';

return array(

    /**
     * SQLitre
     */
    'db' => SQLITE,
    SQLITE => array(
        'db_file' => '../../db/article.sqlite',
        'qry' => array(
            'findAll' => 'SELECT ...',
            'findById' => 'SELECT ...',
        )
    ),

    /**
     * TODO: MySQL
     */

    /**
     * TODO: PostgreSQL
     */

);