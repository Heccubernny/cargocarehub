<?php

// @define('DB_SERVER', 'localhost');
// @define('DB_USERNAME', 'cargocar_username');
// @define('DB_PASSWORD', 'cargocar_database');
// @define('DB_NAME', 'cargocar_database');
@define('DB_SERVER', 'localhost');
@define('DB_USERNAME', 'root');
@define('DB_PASSWORD', 'root');
@define('DB_NAME', 'cargocare');
@define('DB_PORT', 3306);

// @define('DB_SERVER', 'localhost');
// @define('DB_USERNAME', 'root');
// @define('DB_PASSWORD', '');
// @define('DB_NAME', 'cargocar_database');




/* Attempt to connect to MySQL database */
$link = mysqli_connect(
    DB_SERVER,
    DB_USERNAME,
    DB_PASSWORD,
    DB_NAME,
    DB_PORT
);

echo($link);

// Check connection
if ($link === true) {
    die("ERROR: Could not connect. " . mysqli_connect_error());
}

?>

