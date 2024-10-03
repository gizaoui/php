<?php
# php -S localhost:3000 -t /home/gizaoui/Phpstorm/Blog/public

session_start();

require "../app/Autoloader.php";
use App\Autoloader;
Autoloader::register();

//require "/home/gizaoui/Phpstorm/Blog//app/Entity/Article.php";
//require "/home/gizaoui/Phpstorm/Blog/app/Database.php";

use App\Database;
use App\Config\Config;


//var_dump(Database::getDb());
//var_dump(Database::getDb());
//die();

switch ($_GET['p'] ?? "home") {
    case "article":
        $p = "article";
        break;
    default:
        $p = "home";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Form</title>
    <link href="css/bootstrap.css" rel="stylesheet">
    <link href="css/app.css" rel="stylesheet">
</head>
<body>
<nav class="navbar navbar-light navbar-expand-sm" style="background-color: #f7e3fd;">
    <div class="container-fluid m-0">
        <button class="navbar-toggler collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#monsite"
                aria-controls="monsite" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="monsite">
            <ul class="navbar-nav me-auto">
                <li class="nav-item">
                    <a class="nav-link <?php echo $p == 'home' ? 'active' : ''; ?>"
                       href="index.php?p=home">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?php echo $p == 'article' ? 'active' : ''; ?>"
                       href="index.php?p=article">Article</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
<div class="container-fluid m-0">
<?php
switch ($_GET['p'] ?? "home") {
    case "article":
        require "../pages/article.php";
        break;
    default:
        require "../pages/home.php";
}
?>
</div>
<script src="js/bootstrap.bundle.min.js"></script>
</body>
</html>