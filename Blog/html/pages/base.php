<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Form</title>
    <link href="css/bootstrap.css" rel="stylesheet">
    <link href="css/app.css" rel="stylesheet">
</head>
<body>

<!-- ==============  Navbar  ============== -->
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
                    <a class="nav-link <?= empty($_GET['id']) ? 'active' : ''; ?>"
                       href="index.php">Acceuil</a>
                </li>
                <li class="nav-item">
                    <!-- L'emplacement est équivalent à celle de public/index.php -->
                    <a class="nav-link <?= !empty($_GET['id']) ? 'active' : ''; ?>"
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

<!-- ==============  Routing  ============== -->
<div class="container-fluid m-0 p-0">
    <?php
    if(empty($_GET['id'])) {
        // Liste des articles a visualiser.
        require "../pages/home.php";
    }
    else {
        // Visualisation de l'article sélectionné.
        require "../pages/article.php";
    }
    ?>
    <!--    <button id="myBtn" type="button" class="btn btn-primary click">Click me!</button>-->
</div>
<script src="js/bootstrap.bundle.min.js"></script>
<!--<script src="js/app.js"></script>-->
</body>
</html>