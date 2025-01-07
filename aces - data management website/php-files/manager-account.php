<?php include "../db-files/db-checks/check-manager-login.php"; ?>

<!DOCTYPE html>

<html>
    <head>
        <!--Contains all meta data info and neccessary js and css files to repeat on all php pages-->
        <?php include "../php-files/repeat-php/head-info.php"; ?>
        <title>Managers Account Home Page</title>
    </head>

    <body>
        <!--Places the navigation bar at the top
        Must place on each php page-->
        <?php include "../php-files/repeat-php/manager-header.php"; ?>
        <div class="dummy-header"></div>     
        <div class="sub-container">
            As an Admin Manager:
            <br><br>- Rooms and users can be added, updated or deleted. 
            <br>- Access logs, users and rooms can be viewed
            <br>- Room and building states can be changed between emergency and normal
            <br><br>Accounts can be created to access the administration site

        </div>
        <div class="dummy-footer"></div>
    </body>
</html>