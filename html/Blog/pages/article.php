<h1>ARTICLE</h1>

<?php
use App\Table\Article;
foreach ( Article::find ( $_GET ['id'] ) as $post ) :
    ?>

<h4><?php echo $post->titre; ?></h4>
<p>
   <?php echo $post->contenu; ?>
</p>
<hr>
<?php endforeach; ?>
