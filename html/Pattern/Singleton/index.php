<?php

# php -S localhost:3000 -t /home/gizaoui/git/github/php/Pattern/Singleton
# http://localhost:8000/Pattern/Singleton/index.php


require 'config/Autoloader.php';

use \App\Autoloader;
use \App\Config;

Autoloader::register();

var_dump(Config::getInstance()->get("db_name"));
 