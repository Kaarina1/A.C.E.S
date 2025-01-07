<?php include "../db-files/db-checks/check-login.php"; ?>

<!DOCTYPE html>

<html>
    <head>
        <!--Contains all meta data info and neccessary js and css files to repeat on all php pages-->
        <?php include "../php-files/repeat-php/head-info.php"; ?>
        <title>Admin Account Home Page</title>
    </head>

    <body>
        <!--Places the navigation bar at the top
        Must place on each php page-->
        <?php include "../php-files/repeat-php/admin-header.php"; ?>
        <div class="dummy-header"></div>     
        <div class="sub-container">
            As an Administrator:
            <br><br>- Rooms and users can be viewed but not amended. 
            <br>- Access logs can be viewed
            <br>- Room and building states can be changed between emergency and normal
            <br><br>To add, update or delete rooms and users you must have a Managers account

        </div>
        <div class="dummy-footer"></div>
    </body>
</html>