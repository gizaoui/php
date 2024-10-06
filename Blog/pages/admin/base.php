<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Form</title>
    <!-- De admin -->
    <link href="../css/bootstrap.css" rel="stylesheet">
    <link href="../css/app.css" rel="stylesheet">
</head>
<body>

<!-- ==============  Navbar  ============== -->
<nav class="navbar navbar-light navbar-expand-sm" style="background-color: #f7e3fd;">
    <div class="container-fluid m-0">
        <a class="navbar-brand" href="index.php">Administration</a>
        <button class="navbar-toggler collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#monsite"
                aria-controls="monsite" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="monsite">
            <ul class="navbar-nav me-auto">
                <!-- Retour à la page d'acceuil -->
                <li class="nav-item">
                    <!-- Sortie de l'interface d'amin => pas de màj 'active' -->
                    <a class="nav-link" href="../index.php">Acceuil</a>
                </li>
                <!-- Liste des articles à mettre à jour-->
                <li class="nav-item">
                    <!-- On reste la gestion de articles
                         sauf quand on retourne à la page d'acceuil => pas de màj 'active' -->
                    <a class="nav-link active" href="index.php">Articles</a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<!-- ==============  Routing  ============== -->
<div class="container-fluid m-0 p-0">
    <?php
    switch ($_GET['method'] ?? null) {
        case "post":
        case "put":
            // L'emplacement est équivalent à celle de public/index.php
            require "../../pages/admin/updateDb.php";
            break;
        default:
            // L'emplacement est équivalent à celle de public/index.php
            require "../../pages/admin/home.php"; // Acceuil
    } ?>
</div>
<script src="../js/bootstrap.bundle.min.js"></script>
</body>
</html>