<?php
// Initialize the session
session_start();
 
// Checks to see if a user is logged in already, this is by checking a set array.
if(!isset($_SESSION["loggedin"]) && !$_SESSION["loggedin"] === true){
    header("location: http://aces/index.php");

}
?>