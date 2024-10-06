<?php
# php -S localhost:3000 -t /home/gizaoui/Phpstorm/Blog/public

session_start();

require "../app/Autoloader.php";
use App\Autoloader;
Autoloader::register();

# L'autoloader peut être remplacé par (respecter l'ordre) :
//require "/home/gizaoui/Phpstorm/Blog/app/Config/Config.php";
//require "/home/gizaoui/Phpstorm/Blog/app/DTO/Table.php";
//require "/home/gizaoui/Phpstorm/Blog/app/DTO/ArticleDTO.php";
//require "/home/gizaoui/Phpstorm/Blog/app/Database.php";


require "../pages/base.php";
