<?php

$link = mysqli_connect("us-cdbr-east-05.cleardb.net", "baa5da878138a6", "9cfc68cf", "heroku_4e924c59c9b8d54");

if (!$link) {
    echo "Error: Unable to connect to MySQL." . PHP_EOL;
    echo "Debugging errno: " . mysqli_connect_errno() . PHP_EOL;
    echo "Debugging error: " . mysqli_connect_error() . PHP_EOL;
    exit;
}

?>
