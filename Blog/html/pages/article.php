
    <?php

    use App\DTO\ArticleDTO;
    use \App\Form\Floating;

    /**
     * Affichage de l'article sélectionné.
     */
    if (!empty($_GET['id'])) {
        $form = new Floating();
        // /!\ Ne renvoie qu'un seul enregistrement malgré le 'foreach'.
        foreach (ArticleDTO::findById($_GET['id']) as $row): ?>

            <div class="container-fluid m-0 p-0">
                <h2 class='text-center p-3 mb-3'>Article N°<?= $row->id; ?></h2>
            </div>

            <div class="container">
                <h4 class="text-right mb-2"><?= $row->title; ?></h4>
                <p class="mb-5">
                    <?= $row->content; ?>
                </p>
                <?= $form->Cancel(); ?>

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




