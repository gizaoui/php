<?php

use App\DTO\ArticleDTO;

// foreach ($db->query("SELECT * FROM Article WHERE id = :id", '\App\DTO\ArticleDTO', ['id' => $_GET['id']]) as $row):
if ($_GET['id']) {
    foreach (ArticleDTO::findById($_GET['id']) as $row):
        ?>
        <h3 class="text-center p-1">Article N°<?= $row->id; ?></h3>
        <h4 class="text-right mb-2"><?= $row->title; ?></h4>
        <p>
            <?= $row->extrait; ?>
        </p>
    <?php endforeach;
} else {
    ?>
    <div class="alert alert-danger mt-4" role="alert">
        Veuillez selectionner l'un des articles de la page d'acceuil
    </div>
<?php } ?>


