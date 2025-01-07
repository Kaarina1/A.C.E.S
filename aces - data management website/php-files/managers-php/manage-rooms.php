<?php include "../../db-files/db-checks/check-manager-login.php"; ?>
<?php include "../../db-files/db-manage-rooms.php"; ?>

<!DOCTYPE html>

<html>
    <head>
        <!--Contains all meta data info and neccessary js and css files to repeat on all php pages-->
        <?php include "../../php-files/repeat-php/head-info.php"; ?>
        <title>Manage Rooms</title>
    </head>

    <body>
        <?php include "../../php-files/repeat-php/manager-header.php"; ?>
        <div class="dummy-header"></div>     

        <div class="main-headings">Manage Rooms</div>

        <div id="search-area">
        <form method="POST" class="search-form">
        Enter a valid room ID to delete or update the room type
        <br>
        (View Rooms to find Room ID)
        <br><br>
            <label for="search-room-id">Enter Room ID:</label>
            <input name="search-room-id" type="text">

            <input name="submit-delete-room" type="Submit" value="Delete">
            <br>
            <span class="invalid-feedback"><?php echo $room_id_delete_err; ?></span>
            <br>
            <label for="edit-room-type">New Room Type:</label>
            <select name="edit-room-type" class="search-dropdown">
                <option>Lec</option>
                <option>Teach</option>
                <option>Sec</option> 
                <option>Staff</option>                  
            </select>   
            <input name="submit-edit-room" type="Submit" value="Edit">
            <br>
            <span class="invalid-feedback"><?php echo $room_id_update_err; ?></span>
            <br><br>
            Enter a building ID, floor, room number and room type
            <br>
            (New rooms added will have a Normal state)
            <br><br>
            <label for="add-building-id">Building ID:</label>
            <select name="add-building-id" class="search-dropdown">
                <option>K</option>
                <option>KI</option>
                <option>KH</option> 
                <option>KS</option>                  
            </select>
            <label for="add-floor-number">Floor Number:</label>
            <input name="add-floor-number" type="number">
            <label for="add-room-number">Room Number:</label>
            <input name="add-room-number" type="number">
            <label for="add-room-type">Room Type:</label>
            <select name="add-room-type" class="search-dropdown">
            <option>Lec</option>
                <option>Teach</option>
                <option>Sec</option> 
                <option>Staff</option>                   
            </select>
            <input name="submit-add-room" type="Submit" value="Add">
            <br>
            <span class="invalid-feedback"><?php echo $room_add_err; ?></span>
            <br><br>
            <span class="invalid-feedback"><?php echo $message; ?></span>
        </form>
        <div class="dummy-footer"></div>
    </body>
</html>