<?php

namespace App\Config;

class Param
{
    public static string $SQLITE='sqlite';
    public static string $POSTGRES = 'postgres';
    public static string $MYSQL = 'mysql';

    public static function db(): array
    {
        return array(
            'db' => self::$SQLITE,
            self::$SQLITE => array(
                'db_file' => '../../db/article.sqlite',
                'qry' => array(
                    'findAll' => 'SELECT ...',
                    'findById' => 'SELECT ...',
                )
            ),
        );

        /**
         * TODO: MySQL
         */

        /**
         * TODO: PostgreSQL
         */

    }
}