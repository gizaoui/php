<?php

use App\Form\Floating;
use App\DTO\ArticleDTO;




?>

<div class="container-fluid p-0">
    <h1 class='text-center p-3 mb-3'>Ajouter</h1>
</div>
<div class="container">
    <form action="index.php" method="post">
        <?php
        if ($_GET['id']) {
            $findById = ArticleDTO::findById($_GET['id']);
            $form = new Floating(((array)$findById[0]));
        } else {
            $form = new Floating($_POST);
        }
        ?>
        <div class="row text-right">
            <div class="col-12 col-md-4 m-0 p-2">
                <!-- Intégration des methode de construction entre les balises html 'form'  -->
                <?php
                // Les paramètres des méthodes 'Input' correspondent aux indexes
                // du tableau du associatif $_POST.
                echo $form->Input('title');
                echo $form->Input('createAt', 'datetime');
                ?>
            </div>
            <div class="col-12 col-md-8 m-0 p-2">
                <?= $form->Input('content', 'textarea'); ?>
            </div>

            <?php
            echo $form->Submit('send');
            ?>
    </form>

</div>

<script>
    window.onload = function () {
        document.getElementById('createAt_date').addEventListener('change', e => {
            document.getElementById('createAt').value = e.target.value + ' ' +
                document.getElementById('createAt_time').value
        });
        document.getElementById('createAt_time').addEventListener('change', e => {
            document.getElementById('createAt').value = document.getElementById('createAt_date').value + ' ' +
                e.target.value
        });
    };
</script>

<script defer>
    // Exécuté en fin de chargement
    document.getElementById('createAt').value =
        document.getElementById('createAt_date').value + ' ' +
        document.getElementById('createAt_time').value
</script>



