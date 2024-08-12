<h1>SINGLE PAGE</h1>

<?php

$conn = pg_connect("host=mypostgres dbname=mydb user=postgres password=postgres");

if ($conn) {
   echo 'Connection attempt <strong>succeeded</strong><br>';

   $query = "INSERT INTO Article(titre, contenu, dat) VALUES ('Mon titre', 'Mon contenu', '" . date("Y-m-d H:i:s") . "');";
   $result = pg_query($conn, $query);
   if (!$result) {
      echo "An error occurred<br>.";
      exit;
   } else {
      echo "Query success at " . date("Y-m-d H:i:s") . "<hr>";

      $result = pg_query($conn, "select * from Article");
      var_dump(pg_fetch_all($result));
   }
} else {
   echo 'Connection attempt failed.<br>';
}
pg_close($conn);

?>