<?php

$db_handle = pg_connect("host=mypostgres dbname=mydb user=postgres password=postgres");

if ($db_handle) {
  echo 'Connection attempt <strong>succeeded</strong>';
} else {
  echo 'Connection attempt failed.';
}
pg_close($db_handle);


phpinfo();
