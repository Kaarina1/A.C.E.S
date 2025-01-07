<?php
/* Credentials for database) */
define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');
define('DB_NAME', 'door_cards');
 
// Connection to database attempted with above details
$conn = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
 
// If the connection cannot connect an error message will show and states why
if($conn === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
?>