<?php

require 'config/Autoloader.php';

use \App\Autoloader;
use \App\Config;

Autoloader::register();

var_dump(Config::getInstance()->get("db_name"));
 