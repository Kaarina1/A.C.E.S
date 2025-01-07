<?php
// Initialize the session
session_start();

// Define variables and initialize with empty values
$username = $password = $level= "";
$username_err = $password_err = $login_err = "";
 
// Checks to see if a user is logged in already, this is by checking a set array.
if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
    
    if($_SESSION["level"]==1){
        header("location: http://aces/php-files/manager-account.php");
    }
    else{
        header("location: http://aces/php-files/admin-account.php");
    }
    exit;
}
 
// link to connection file
require_once "connection.php";
 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
 
    // Check if username is empty
    if(empty(trim($_POST["username"]))){
        $username_err = "Please enter username.";
    } else{
        $username = trim($_POST["username"]);
    }
    
    // Check if password is empty
    if(empty(trim($_POST["password"]))){
        $password_err = "Please enter your password.";
    } else{
        $password = trim($_POST["password"]);
    }
    
    // Validate credentials
    if(empty($username_err) && empty($password_err)){
        // Prepare a select statement
        $sql = "SELECT id, username, password,level FROM users WHERE username = ?";
        //
        if($stmt = mysqli_prepare($conn, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_username);
            
            // Set parameters
            $param_username = $username;
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Store result
                mysqli_stmt_store_result($stmt);
                
                // Check if username exists, if yes then verify password
                if(mysqli_stmt_num_rows($stmt) == 1){                    
                    // Bind result variables
                    mysqli_stmt_bind_result($stmt, $id, $username, $hashed_password,$level);
                    if(mysqli_stmt_fetch($stmt)){
                        if(password_verify($password, $hashed_password)){
                            // Password is correct, so start a new session
                            session_start();
                            
                            // Store data in session variables
                            $_SESSION["loggedin"] = true;
                            $_SESSION["id"] = $id;
                            $_SESSION["username"] = $username;                         
                            $_SESSION["level"] = $level;
                            // Redirect user correct level page
                            if($level==1){
                                header("location: http://aces/php-files/manager-account.php");
                            }
                            else{
                                header("location: http://aces/php-files/admin-account.php");
                            }
                        } else{
                            // Password is not valid, display a generic error message
                            $login_err = "Invalid username or password.";
                        }
                    }
                } else{
                    // Username doesn't exist, display a generic error message
                    $login_err = "Invalid username or password.";
                }
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }

            // Close statement
            mysqli_stmt_close($stmt);
        }
    }
        // Close connection
        mysqli_close($conn);
    }
?>