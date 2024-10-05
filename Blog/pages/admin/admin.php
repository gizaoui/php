<h3 class="text-center p-1">Liste des articles</h3>
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

    var_dump($_POST);


    if($_POST['title']) {
        unset($_POST['createAt_date']);
        unset($_POST['createAt_time']);
        if ($_POST['id']) {
            ArticleDTO::Update($_POST);
        }
        else {
            ArticleDTO::Insert($_POST);
        }
    }

    foreach (ArticleDTO::findAll() as $row):
        ?>
        <tr>
            <td><?= $row->title; ?></td>
            <td><?= $row->createAt; ?></td>
            <td>
                <div class="d-flex gap-1">
                    <a class="btn btn-primary btn-sm" href="index.php?p=add&id=<?= $row->id; ?>">Editer</a>
                    <form action="#" method="post">
                        <button type="submit" class="btn btn-danger btn-sm">Supprimer</button>
                    </form>
                </div>
            </td>
        </tr>
    <?php endforeach;
    ?>
</table>




