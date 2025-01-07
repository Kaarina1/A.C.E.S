<?php include "../../db-files/db-checks/check-manager-login.php"; ?>
<?php include "../../db-files/db-add-account.php"; ?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <!--Contains all meta data info and neccessary js and css files to repeat on all php pages-->
        <?php include "../repeat-php/head-info.php"; ?>
        <title>Add Account Page</title>
    </head>
    <body>
        <!--Places the navigation bar at the top
        Must place on each php page-->
        <?php include "../repeat-php/manager-header.php"; ?>
        <div class="dummy-header"></div>     
        <div class="headings main-headings">
            <h2>Register Account</h2>
        </div>
        <!--Form for input and submit to create an account-->
        <div class="main-container width-60 align-left">
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                <div class="form-group">
                <div class="tooltip">?
                    <span class="tooltiptext">Only capitals, lowercase and underscores. No spaces.</span>
                </div> 
                    <label>Username</label>
                    <input class="black-text" type="text" name="username" class="form-control <?php echo (!empty($username_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $username; ?>">
                     <span class="invalid-feedback"><?php echo $username_err; ?></span>
                </div>   <br>  
                <div class="form-group">
                <div class="tooltip">?
                    <span class="tooltiptext">One upper, one lower and one number</span>
                </div>          
                    <label>Password</label>
                    <input class="black-text" type="password" name="password" class="form-control <?php echo (!empty($password_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $password; ?>">
                    <span class="invalid-feedback"><?php echo $password_err; ?></span>
                </div><br> 
                <div class="form-group">
                    <label>Confirm Password</label>
                    <input class="black-text" type="password" name="confirm_password" class="form-control <?php echo (!empty($confirm_password_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $confirm_password; ?>">
                    <span class="invalid-feedback"><?php echo $confirm_password_err; ?></span>
                </div><br> 

                <div class="form-group">
                    <label>Check to selct for Managers account</label>
                    <input class="black-text" type="checkbox" name="level" class="form-control">
                </div>

                <div class="form-group">
                    <input type="submit" class="button" value="Submit">
                    <input type="reset" class="button button-grey" value="Reset">
                </div>
            </form>
        </div>
        <div class="dummy-footer"></div>
    </body>
</html>