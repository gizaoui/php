<h1>SINGLE PAGE</h1>

<?php




use App\Database;

$db = new Database();
$db->query("INSERT INTO Article(titre, contenu, dat) VALUES ('Mon titre', 'Mon contenu', '" . date("Y-m-d H:i:s") . "')");
var_dump($db->query("SELECT * FROM Article"));

echo 'Hello World !!';




?>