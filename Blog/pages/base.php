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
        <a class="navbar-brand" href="index.php">Mon site</a>
        <button class="navbar-toggler collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#monsite"
                aria-controls="monsite" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="monsite">
            <ul class="navbar-nav me-auto">
                <li class="nav-item">
                    <!-- L'emplacement est équivalent à celle de public/index.php -->
                    <a class="nav-link <?php echo $_GET['p'] ?? 'active'; ?>"
                       href="index.php">Acceuil</a>
                </li>
                <li class="nav-item">
                    <!-- L'emplacement est équivalent à celle de public/index.php -->
                    <a class="nav-link <?php echo $_GET['p'] == 'article' ? 'active' : ''; ?>"
                       href="index.php?p=article">Article</a>
                </li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li class="nav-item">
                    <a class="nav-link"
                       href="../admin/index.php">Admin</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
<div class="container-fluid m-0">
    <?php
    // Chargement de la page sélectionnée via
    // le paramètre 'p' de  l'url dans la page 'index.php'
    switch ($_GET['p'] ?? "home") {
        case "article":
            // L'emplacement est équivalent à celle de public/index.php
            require "../pages/article.php";
            break;
        default:
            // L'emplacement est équivalent à celle de public/index.php
            require "../pages/home.php";
    }
    ?>
    <!--    <button id="myBtn" type="button" class="btn btn-primary click">Click me!</button>-->
</div>
<script src="js/bootstrap.bundle.min.js"></script>
<!--<script src="js/app.js"></script>-->
</body>
</html>