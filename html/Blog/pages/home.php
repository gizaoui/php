<h1>HOME</h1>

<?php
$db = new App\Database ();

// $db->query("INSERT INTO Article(titre, contenu, dat) VALUES ('Mon titre', 'Mon contenu', '" . date("Y-m-d H:i:s") . "')");
// var_dump($db->query("SELECT * FROM Article"));
?>

<?php foreach ($db->query('SELECT * FROM Article', 'App\Table\Article') as $post): ?>

<h4>
	<a href="index.php?p=article&id=<?php echo $post->id; ?>"><?php echo $post->titre; ?></a>
</h4>
<p>
      <?php echo $post->contenu; ?>
   </p>
<hr>
<?php endforeach; ?>