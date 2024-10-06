<?php

use App\DTO\ArticleDTO;

// foreach ($db->query("SELECT * FROM Article WHERE id = :id", '\App\DTO\ArticleDTO', ['id' => $_GET['id']]) as $row):
if ($_GET['id']) {
    // /!\ Ne renvoie qu'un seul enregistrement
    foreach (ArticleDTO::findById($_GET['id']) as $row): ?>

        <div class="container-fluid m-0 p-0">
            <h2 class='text-center p-3 mb-3'>Article N°<?= $row->id; ?></h2>
        </div>

        <div class="container">
            <h4 class="text-right mb-2"><?= $row->title; ?></h4>
            <p>
                <?= $row->content; ?>
            </p>
        </div>
    <?php endforeach;
} else {
    ?>
    <div class="container">
        <div class="alert alert-danger mt-4" role="alert">
            Veuillez selectionner l'un des articles de la page d'acceuil
        </div>
    </div>
<?php } ?>


