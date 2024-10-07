<?php

use App\Form\Floating;
use App\DTO\ArticleDTO;

?>
<div class="container-fluid m-0 p-0">
    <h2 class='text-center p-3 mb-3'><?= $_GET['method'] == 'post' ? 'Ajout' : 'Mise à jour'; ?></h2>
</div>
<div class="container">
    <form action="index.php" method="post">
        <?php
        if (!empty($_GET['id'])) {
            $findById = ArticleDTO::findById($_GET['id']);
            $form = new Floating(((array)$findById[0]), $_GET);
        } else {
            $form = new Floating($_POST, $_GET);
        }
        ?>
        <div class="row text-right ms-1">
            <div class="col-12 col-md-4 m-0 ps-0">
                <!-- Intégration des methode de construction entre les balises html 'form'  -->
                <?php
                // Les paramètres des méthodes 'Input' correspondent aux indexes
                // du tableau du associatif $_POST.
                echo $form->Input('title');
                echo $form->Input('createdat', 'datetime');
                ?>
            </div>
            <div class="col-12 col-md-8 m-0 ps-0">
                <?= $form->Input('content', 'textarea'); ?>
            </div>
            <div class="d-flex gap-1 m-0 ps-0">
                <?= $form->Submit(); ?>
                <?= $form->Cancel(); ?>
            </div>


        </div>

    </form>


    <script>
        window.onload = function () {
            document.getElementById('createdat_date').addEventListener('change', e => {
                document.getElementById('createdat').value = e.target.value + ' ' +
                    document.getElementById('createdat_time').value
            });
            document.getElementById('createdat_time').addEventListener('change', e => {
                document.getElementById('createdat').value = document.getElementById('createdat_date').value + ' ' +
                    e.target.value
            });
        };
    </script>

    <script defer>
        // Exécuté en fin de chargement
        document.getElementById('createdat').value =
            document.getElementById('createdat_date').value + ' ' +
            document.getElementById('createdat_time').value
    </script>



