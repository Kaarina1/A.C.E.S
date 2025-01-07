<?php
// Connection details held in seperate document
require_once "connection.php";
 
// Sets variables ready to input into the database
$username = $password = $confirm_password ="" ;
$username_err = $password_err = $confirm_password_err ="";
 
// Although placed first this will listen for the form submit event
if($_SERVER["REQUEST_METHOD"] == "POST"){
 
    // User validation

    //Does not allow an empty input
    if(empty(trim($_POST["username"]))){
        $username_err = "Please enter a username.";
        //Stops SQL injection USE: " ' OR 1=1 -- " to test
    } 
    //Passes each character, symbol and number to see if all are acceptable. 
    //Username must only contiain letters, numbers or underscores
    elseif(!preg_match('/^[a-zA-Z0-9_]+$/', trim($_POST["username"]))){
        //Gives message if contains anything else
        $username_err = "Username can only contain letters, numbers, and underscores.";
    } else{
        // Prepare a select statement
        $sql = "SELECT id FROM users WHERE username = ?";
        
        if($stmt = mysqli_prepare($conn, $sql)){
            // Binds the username variable to the connected database and entity, informing it is a string by "s" 
            mysqli_stmt_bind_param($stmt, "s", $param_username);
            
            // Gives username input to variable
            $param_username = trim($_POST["username"]);
            
            

            // If the username is valid the next steps occur
            if(mysqli_stmt_execute($stmt)){
                /* Stores the result for further checks */
                mysqli_stmt_store_result($stmt);
                //Checks if the username is taken or not
                if(mysqli_stmt_num_rows($stmt) == 1){
                    $username_err = "This username is already taken.";
                } else{
                    $username = trim($_POST["username"]);
                }
            } else{
                //Any inturruptions during process will produce the error message
                echo "Oops! Something went wrong. Please try again later.";
            }

            // Close statement
            mysqli_stmt_close($stmt);
        }
    }
    
    // Password validation

    // Checks that the password contains one upper, one lower, one number and one special charcter
    $uppercase = preg_match('@[A-Z]@', trim($_POST["password"]));
    $lowercase = preg_match('@[a-z]@', trim($_POST["password"]));
    $number    = preg_match('@[0-9]@', trim($_POST["password"]));
    //Checks for user input
    if(empty(trim($_POST["password"]))){
        $password_err = "Please enter a password.";     
    } 
    //Sees if the password is long enough
    elseif(!$uppercase || !$lowercase || !$number || strlen(trim($_POST["password"])) < 8) {
        $password_err = 'Password not strong, hover over ?.';
    }
    elseif(!preg_match('/^[a-zA-Z0-9_]+$/', trim($_POST["password"]))){
        $password_err = 'Password can only contain letters, numbers, and underscores.';
    }
    else{
        $password = trim($_POST["password"]);
    }
    
    // Checks password has been confirmed
    if(empty(trim($_POST["confirm_password"]))){
        $confirm_password_err = "Please confirm password.";     
    } else{
        //If the confirm input is there this checks both passwords match
        $confirm_password = trim($_POST["confirm_password"]);
        if(empty($password_err) && ($password != $confirm_password)){
            $confirm_password_err = "Password did not match.";
        }
    }
    

    // Checks for any error messages from the previous
    if(empty($username_err) && empty($password_err) && empty($confirm_password_err) &&  empty($level_err)){
        
        // a variable for placeholders to insert into database
        $sql = "INSERT INTO users (username, password, level) VALUES (?, ?, ?)";
         
        if($stmt = mysqli_prepare($conn, $sql)){
            // Places inputted username and password into the statement
            mysqli_stmt_bind_param($stmt, "ssb", $param_username, $param_password,$param_level);
            
            
            $param_username = $username;

            /// Gives the level boolean to variable
            if(empty($_POST["level"])){
                $param_level =0;
            }
            else{
                $param_level =1;
            }
            
            //Gives a unique hash to the password for protection
            $param_password = password_hash($password, PASSWORD_DEFAULT);
            
            // Sending to the database
            if(mysqli_stmt_execute($stmt)){
                // Redirect to login page
                header("location: ../manager-account.php");
                echo "Account Successfully Created.";
            } 
            //Error message for interupptions
            else{

                echo "Oops! Something went wrong. Please try again later.";
            }

            // Close statement
            mysqli_stmt_close($stmt);
        }
    }
    
    
    // Closes connection as the first login is required
    mysqli_close($conn);
}
?>