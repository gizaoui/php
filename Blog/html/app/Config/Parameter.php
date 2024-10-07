<?php

const SQLITE = 'sqlite';
const POSTGRES = 'postgres';
const MYSQL = 'mysql';
const SQLSERVER = 'sqlserver';

return array(

    /**
     * Sélectionner la base à exploiter
     */
    'db' => POSTGRES,

    /**
     * SQLite
     */
    SQLITE => array(
        'dsn' => 'sqlite:' . __DIR__ . '/../../db/article.sqlite',
        'user' => null,
        'password' => null,
    ),

    /**
     * TODO: MySQL
     */
    MYSQL => array(
        'dsn' => 'mysql:host=localhost;dbname=article',
        'user' => 'postgres',
        'password' => 'postgres',
    ),

    /**
     * TODO: PostgreSQL
     */
    POSTGRES => array(
        'dsn' => 'pgsql:host=mypostgres;dbname=article',
        'user' => 'postgres',
        'password' => 'postgres',
    ),

    /**
     * TODO: SQL Server
     */
    SQLSERVER => array(
        'dsn' => 'sqlsrv:server=myserver;database=mydb',
        'user' => '???',
        'password' => '',
    ),


);
