<?php include "../../db-files/db-checks/check-login.php"; ?>

<!DOCTYPE html>

<html>
    <head>
        <!--Contains all meta data info and neccessary js and css files to repeat on all php pages-->
        <?php include "../../php-files/repeat-php/head-info.php"; 
        //Retains search terms
        $search_building_name=$search_room_type="";
        if(isset($_POST["search-building-name"])){
            $search_building_name=$_POST["search-building-name"];
        }
        if(isset($_POST["search-room-type"])){
            $search_room_type=$_POST["search-room-type"];
        }
        if(isset($_POST["search-state"])){
            $search_state=$_POST["search-state"];
        }
        ?>

        <title>View Rooms</title>
    </head>

    <body>
        <?php include "../../db-files/db-checks/check-header.php"; ?>
        <div class="dummy-header"></div>     
        <div class="main-headings">View Rooms</div>
        <div id="search-area">
        <form method="POST" class="search-form">
            <label for="search-building-name">Search by Building Name:</label>
            <input name="search-building-name" type="text" value=<?php echo $search_building_name ?>>    
        
            <label for="search-room-type">Search by Room Type:</label>
            <input name="search-room-type" type="text" value=<?php echo $search_room_type ?>>

            <label for="search-state">State Type:</label>
            <select name="search-state" id="search-dropdown">
                <option>Any</option>
                <option>E</option>
                <option>N</option>                  
            </select>
            
            <input name="submit-search" type="Submit" value="Search">
        </form>
        <div class="main-content-area">
            <?php 
                try{
                    include "../../db-files/db-searches/db-view-rooms.php";
                } 
                catch(Exception $e){
                    echo '<script>alert("Check Database Connection")</script>';
                }
            ?>
        </div>
        <div class="dummy-footer"></div>
    </body>
</html>