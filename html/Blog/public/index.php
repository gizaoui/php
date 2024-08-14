<?php

# php -S localhost:3000 -t /home/gizaoui/git/github/php/Blog/public
# html/Blog/public/index.php
require '../app/Autoloader.php';

use App\Autoloader;

Autoloader::register ();

// var_dump(Config::getInstance()->get("db_name"));

if (isset ( $_GET ['p'] )) {
    $p = $_GET ['p'];
}
else {
    $p = 'home';
}

ob_start ();

if ($p === 'home') {
    require '../pages/home.php';
}
elseif ($p === 'article') {
    require '../pages/article.php';
}
else {
    require '../pages/home.php';
}

$content = ob_get_clean ();
require '../pages/templates/default.php';
