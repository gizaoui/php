<?php
session_start();

require "../../app/Autoloader.php";
use App\Autoloader;
Autoloader::register();


use App\Database;
use App\Config\Config;
use App\Form\Floating;


switch ($_GET['p'] ?? "home") {
    case "add":
        $p = "add";
        break;
    default:
        $p = "home";
}

// De puplic/admin/index.php
require "../../pages/admin/base.php";




