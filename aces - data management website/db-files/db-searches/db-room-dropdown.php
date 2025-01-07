<?php
    include "../../db-files/connection.php";
//GETTNG Variant IDS for search as arrays do not retain the values when serach button pressed
    $room_ids=array();

    $sql="SELECT RoomID
    
    FROM room

    ";

$result = $conn->query($sql);
     if ($result->num_rows > 0) {
        
        while($row = $result->fetch_assoc()) {
            
                $room=$row["RoomID"];
            

            array_push($room_ids,trim($room));
        }
        
    }
