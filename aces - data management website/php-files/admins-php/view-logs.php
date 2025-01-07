<?php include "../../db-files/db-checks/check-login.php"; ?>

<!DOCTYPE html>

<html>
    <head>
        <!--Contains all meta data info and neccessary js and css files to repeat on all php pages-->
        <?php include "../../php-files/repeat-php/head-info.php";?>
        <title>View Logs</title>
    </head>

    <body>
        <?php include "../../db-files/db-checks/check-header.php"; ?>
        <div class="dummy-header"></div>
        <div class="main-headings">View Logs</div>
        <div id="search-area">
        <form method="POST" class="search-form">
            <label for="search-room-id">Search by Room:</label>
            <select name="search-room-id" id="search-dropdown">
                <option>All</option>
                <?php
                        include("../../db-files/db-searches/db-room-dropdown.php");
                        $i=1;
                        while($i<count($room_ids)){
                        ?>
                            <option> <?php echo $room_ids[$i]; ?> </option>
                        <?php
                            $i++;
                        }
                ?>
            </select>
            <label for="search-date">Search By Date:</label>
            <input name="search-date" type="date">

            <input name="submit-search" type="Submit" value="Search">
        </form>
        <div class="main-content-area">
        <?php 
                try{
                    include "../../db-files/db-searches/db-view-logs.php";
                } 
                catch(Exception $e){
                    echo '<script>alert("Check Database Connection")</script>';
                }
        ?>
        </div>
        <div class="dummy-footer"></div>
    </body>
</html>