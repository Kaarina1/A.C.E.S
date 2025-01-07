<?php include "../../db-files/db-checks/check-login.php"; ?>
<?php include "../../db-files/db-manage-state.php"; ?>

<!DOCTYPE html>

<html>
    <head>
        <!--Contains all meta data info and neccessary js and css files to repeat on all php pages-->
        <?php include "../../php-files/repeat-php/head-info.php"; ?>
        <title>Manage Room States</title>
    </head>

    <body>
    <?php include "../../db-files/db-checks/check-header.php"; ?>
        <div class="dummy-header"></div>     

        <div class="main-headings">Manage Room States</div>

        <div id="search-area">
        <form method="POST" class="search-form">
        Enter a valid room ID to change state
        <br>
        (View Rooms to find Room ID)
        <br><br>
            <label for="room-id">Enter Room ID:</label>
            <input name="room-id" type="text">
            <label for="room-state">Room State:</label>
            <select name="room-state" class="search-dropdown">
                <option>N</option>
                <option>E</option>            
            </select>
            <input name="submit-room-state" type="Submit" value="Change Room State">
            <br>
            <span class="invalid-feedback"><?php echo $room_state_err; ?></span>
            <br>
            Enter a valid building ID to change entire buidling state
            <br>
            <br>
            <label for="building-id">Building ID:</label>
            <select name="building-id" class="search-dropdown">
                <option>K</option>
                <option>KI</option>
                <option>KH</option> 
                <option>KS</option>                  
            </select>
            <label for="building-state">Building State:</label>
            <select name="building-state" class="search-dropdown">
                <option>N</option>
                <option>E</option>            
            </select>
            <input name="submit-building-state" type="Submit" value="Change Building State">
            <br>
            <span class="invalid-feedback"><?php echo $building_state_err; ?></span>
            <br><br>
            <span class="invalid-feedback"><?php echo $message; ?></span>
        </form>
        <div class="dummy-footer"></div>
    </body>
</html>