<?php
// Initialize the session
session_start();
 
// Empties session array
$_SESSION = array();
 
// Destroy the session.
session_destroy();
 
// Redirect to login page
header("location: http://aces/index.php");
exit;
?>
