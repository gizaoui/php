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
<nav class="navbar navbar-light navbar-expand-sm" style="background-color: #f7e3fd;">
    <div class="container-fluid m-0">
        <!-- De admin/|index|add|.php -->
        <a class="navbar-brand" href="index.php">Administration</a>
        <button class="navbar-toggler collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#monsite"
                aria-controls="monsite" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="monsite">
            <ul class="navbar-nav me-auto">
                <li class="nav-item">
                    <!-- De admin/|index|add|.php -->
                    <a class="nav-link <?php echo $_GET['p'] == 'home' ? 'active' : ''; ?>"
                       href="../index.php">Acceuil</a>
                </li>
                <li class="nav-item">
                    <!-- De admin/|index|add|.php -->
                    <a class="nav-link <?php echo $_GET['p'] ?? 'active'; ?>"
                       href="index.php">Articles</a>
                </li>
                <li class="nav-item">
                    <!-- De admin/|index|add|.php -->
                    <a class="nav-link <?php echo $_GET['p'] == 'add' ? 'active' : ''; ?>"
                       href="index.php?p=add">Ajouter</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
<div class="container-fluid m-0">
    <?php
    // Chargement de la page sélectionnée via
    // le paramètre 'p' de  l'url dans la page 'index.php'
    switch ($_GET['p'] ?? "admin") {
        case "add":
            // L'emplacement est équivalent à celle de public/index.php
            require "../../pages/admin/add.php";
            break;
        case "update":
            // L'emplacement est équivalent à celle de public/index.php
            require "../../pages/admin/update.php";
            break;
        default:
            // L'emplacement est équivalent à celle de public/index.php
            require "../../pages/admin/admin.php";
    }
    ?>
</div>
<script src="../js/bootstrap.bundle.min.js"></script>
</body>
</html>