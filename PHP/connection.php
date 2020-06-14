<?php

$link = mysqli_connect("wp433upk59nnhpoh.cbetxkdyhwsb.us-east-1.rds.amazonaws.com", "mglbu7bzklbh2ud0", "ioor0u0o7bhoerdr", "be9o21xifa7ekf3y");

if (!$link) {
    echo "Error: Unable to connect to MySQL." . PHP_EOL;
    echo "Debugging errno: " . mysqli_connect_errno() . PHP_EOL;
    echo "Debugging error: " . mysqli_connect_error() . PHP_EOL;
    exit;
}

?>
