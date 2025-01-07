
<?php include "db-files/login.php" ?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <title>A.C.E.S Login Page</title>
        <?php include "php-files/repeat-php/head-info.php" ?>
    </head>
    <body>

        <img id="logo-large" src="../img-files/logo.png" alt="Home" onerror="this.onerror=null;this.src='data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHdpZHRoPSIyNCIgaGVpZ2h0PSIyNCIgdmlld0JveD0iMCAwIDI0IDI0Ij48cGF0aCBkPSJNMjQgMTIuMTQ4bC0xLjM2MSAxLjQ2NS0xMC42MzktOS44ODMtMTAuNjM5IDkuODY4LTEuMzYxLTEuNDY1IDEyLTExLjEzMyAxMiAxMS4xNDh6bS00IDEuNzQ5bC0yIDEwLjEwM2gtMTJsLTItMTAuMTAzIDgtNy40NDQgOCA3LjQ0NHptLTcgNi4xMDNjMC0uNTUyLS40NDgtMS0xLTFzLTEgLjQ0OC0xIDEgLjQ0OCAxIDEgMSAxLS40NDggMS0xem0xLTVjMC0xLjEwNS0uODk2LTItMi0ycy0yIC44OTUtMiAyIC44OTYgMiAyIDIgMi0uODk1IDItMnoiLz48L3N2Zz4=';">

       
        <div class="main-container width-40">
            <br>
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                <div class="form-group">
                    <h2>Login</h2>
                    <label>Username</label>
                    <input class="black-text" type="text" name="username" class="form-control <?php echo (!empty($username_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $username; ?>">
                </div>    
                <div class="form-group">
                    <label>Password</label>
                    <input class="black-text" type="password" name="password" class="form-control <?php echo (!empty($password_err)) ? 'is-invalid' : ''; ?>">
                    
                </div>
                <div class="form-group">
                    <input type="submit" class="button" value="Login">
                    <br>
                    <span class="invalid-feedback"><?php echo $username_err; ?></span>
                    <span class="invalid-feedback"><?php echo $password_err; ?></span>
                    <?php 
                        if(!empty($login_err)){
                            echo '<div class="alert alert-danger">' . $login_err . '</div>';
                        }        
                    ?>
                </div>
            </form>
        </div>
    </body>
</html>