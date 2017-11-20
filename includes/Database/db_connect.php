<?php

$db['db_host'] = "localhost";
$db['db_user'] = "ryandelarosa08";
$db['db_pass'] = "pandaman@08";
$db['db_name'] = "clients";

foreach ($db as $key => $value) {
    define(strtoupper($key), $value);
}
$connect = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);

if (!$connect) {
    echo("Database not connected");
}

?>


