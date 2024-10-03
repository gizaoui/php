<?php
# php -S localhost:3000 -t /home/gizaoui/Phpstorm/Test

use \Tutorial\Autoloader;
use \Tutorial\Form;

require 'class/Autoloader.php';
Autoloader::register();

/* Equivalent à :  */
// use \Tutorial\Form;
// require 'class/Controls.php';
// require 'class/Form.php';



// $form = new Form(['firstname' => 'John', 'lastname' => 'DOE']);
$form = new Form($_POST);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Form</title>
    <link href="bootstrap/css/bootstrap.css" rel="stylesheet">
    <style>
        h1 {
            background: lightcyan;
        }

    </style>
</head>
<body>
<div class="container-fluid p-0">
    <h1 class='text-center p-3 mb-3'>Formumaires</h1>
</div>
<div class="container">
    <div class="row g-5 text-center">
        <div class="col-sm-6 col-md-4">
            <h2 class='text-start mb-2'>Paramètres</h2>
            <!-- Intégration des methode de construction entre les balises html 'form'  -->
            <form action="#" method="post">
                <?php
                // Les paramètres des méthodes 'Input' correspondent aux indexes
                // du tableau du associatif $_POST.
                echo $form->Input('firstname');
                echo $form->Input('lastname');
                echo $form->Input('id');
                echo $form->Submit('send');
                ?>
            </form>
        </div>
        <div class="col-6 col-md-8">
            <h2 class='text-start mb-2'>Traces</h2>
            <?php
            echo $form->getDate();
            // var_dump($_POST);
            echo $form->LogPost();
            ?>
        </div>
    </div>
</div>

<script src="bootstrap/js/bootstrap.bundle.min.js"></script>
</body>
</html>








