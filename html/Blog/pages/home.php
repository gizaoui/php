<h1> HOME PAGE</h1>

<?php
$db = new App\Database();

// $db->query("INSERT INTO Article(titre, contenu, dat) VALUES ('Mon titre', 'Mon contenu', '" . date("Y-m-d H:i:s") . "')");
// var_dump($db->query("SELECT * FROM Article"));
?>

<?php foreach ($db->query('SELECT * FROM Article', 'App\Table\Article') as $post): ?>

   <h4><a href="index.php?p=single&id=<?php echo $post->getId(); ?>"><?php echo $post->getTitre(); ?></a></h4>
   <p>
      <?php echo $post->getContenu(); ?>
   </p>
   <hr>
<?php endforeach; ?>