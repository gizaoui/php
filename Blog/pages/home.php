<div class="container-fluid m-0 p-0">
    <h2 class='text-center p-3 mb-3'>Acceuil</h2>
</div>

<div class="container">
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

        // foreach ($db->query("SELECT id, title, content, createAt FROM Article", '\App\DTO\ArticleDTO') as $row):
        foreach (ArticleDTO::findAll() as $row):
            ?>
            <tr>
                <td><?= $row->title; ?></td>
                <!-- alias vers la methode 'getExtrait()' -->
                <td><a href="<?= $row->url; ?>"
                       class="link-info link-offset-2 link-underline-opacity-25 link-underline-opacity-100-hover"><?= $row->extrait; ?></a>
                </td>
                <td><?= $row->createAt; ?></td>
            </tr>
        <?php endforeach;
        ?>
    </table>
</div>