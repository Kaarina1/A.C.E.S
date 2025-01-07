<?php include "../../db-files/db-checks/check-login.php"; ?>

<!DOCTYPE html>

<html>
    <head>
        <!--Contains all meta data info and neccessary js and css files to repeat on all php pages-->
        <?php include "../../php-files/repeat-php/head-info.php"; 
        ?>
        <title>View Users</title>
    </head>

    <body>
        <!--Places the navigation bar at the top
        Must place on each php page-->
        <?php include "../../db-files/db-checks/check-header.php"; ?>
        <div class="dummy-header"></div>     
        <div class="main-headings">View Users</div>
        <div id="search-area">
        <form method="POST">

        </form>
        </div>
        <div class="main-content-area">
            <?php 
            
                try{
                    include "../../db-files/db-searches/db-view-users.php";
                } 
                catch(Exception $e){
                    echo '<script>alert("Check Database Connection")</script>';
                } 
            ?>
        </div>


        <div class="dummy-footer"></div>
    </body>
</html>