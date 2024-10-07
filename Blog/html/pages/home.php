<div class="container-fluid m-0 p-0">
    <h2 class='text-center p-3 mb-3'>Acceuil</h2>
</div>

<div class="container">
    <!-- Affichage de la liste des articles  -->
    <table class="table">
        <tbody>
        <tr>
            <th>Titre</th>
            <th>Contenu</th>
            <th>Création</th>
        </tr>
        </tbody>
        <?php
        use App\DTO\ArticleDTO;

        // Boucle sur les articles retournés par la requête SQL
        foreach (ArticleDTO::findAll() as $row):
            ?>
            <tr>
                <td><?= $row->title; ?></td>
                <!-- alias vers la methode 'getExtrait()' via ArticleDTO -->
                <td><a href="<?= $row->url; ?>"
                       class="link-info link-offset-2 link-underline-opacity-25 link-underline-opacity-100-hover"><?= $row->extrait; ?></a>
                </td>
                <!-- /!\ Le champs doit être déclaré en minuscule dans les bases de données -->
                <td><?= $row->createdat; ?></td>
            </tr>
        <?php endforeach;
        ?>
    </table>
</div>