<h1>ARTICLE</h1>

<?php
$db = new App\Database ();

?>

<?php foreach ($db->prepare('SELECT * FROM Article WHERE id=?', [$_GET['id']],'App\Table\Article') as $post): ?>

<h4>
	<a href="index.php?p=article&id=<?php echo $post->id; ?>"><?php echo $post->titre; ?></a>
</h4>
<p>
   <?php echo $post->contenu; ?>
</p>
<hr>
<?php endforeach; ?>
