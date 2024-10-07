<div class="container-fluid m-0 p-0">
    <h2 class='text-center p-3 mb-3'>Liste des articles</h2>
</div>

<div class="container">
    <p class="mb-t-2">
        <a class="btn btn-primary" href="index.php?method=post">Nouvel article</a>
    </p>

    <table class="table">
        <tbody>
        <tr>
            <th>Titre</th>
            <th>Création</th>
            <th>Action</th>
        </tr>
        </tbody>
        <?php

        use App\DTO\ArticleDTO;

        // Suppression des paramètres du $_POST pour la requêtes de màj.
        unset($_POST['createdat_date']);
        unset($_POST['createdat_time']);

        // Gestion des requêtes de mise à jour.
        switch ($_POST['method'] ?? null) {
            case "post":
                unset($_POST['method']); // Non pris en charge pour la requête de màj
                if ($_POST['title']) {
                    ArticleDTO::Insert($_POST);
                }
                break;
            case "put":
                unset($_POST['method']); // Non pris en charge pour la requête de màj
                if ($_POST['id'] && $_POST['title']) {
                    ArticleDTO::Update($_POST);
                }
                break;
            case "delete":
                unset($_POST['method']); // Non pris en charge pour la requête de màj
                if ($_POST['id']) {
                    ArticleDTO::Delete($_POST);
                }
                break;
            default:
        }


        // Liste des articles
        foreach (ArticleDTO::findAll() as $row): ?>
            <tr>
                <td><?= $row->title; ?></td>
                <td><?= $row->createdat; ?></td>
                <td>
                    <div class="d-flex gap-1">
                        <a class="btn btn-primary btn-sm" href="index.php?method=put&id=<?= $row->id; ?>">Editer</a>
                        <form action="index.php" method="post">
                            <input type='hidden' id='id' name='id' value='<?= $row->id; ?>'>
                            <input type='hidden' id='method' name='method' value='delete'>
                            <button type="submit" class="btn btn-danger btn-sm">Supprimer</button>
                        </form>
                    </div>
                </td>
            </tr>
        <?php endforeach;
        // var_dump($_POST);
        ?>
    </table>
</div>



