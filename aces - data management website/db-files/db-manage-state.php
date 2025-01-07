<?php
// Connection details held in seperate document
include "../../db-files/connection.php";

$message=$building_state_err=$room_state_err="";

if($_SERVER["REQUEST_METHOD"] == "POST"){

    $room_id=$_POST["room-id"];
    $building_id=$_POST["building-id"];
    $room_state=$_POST["room-state"];
    $building_state=$_POST["building-state"];

    if(isset($_POST["submit-room-state"])){
    
        if(!empty($room_id)){
            $stmt=$conn->prepare("SELECT count(1) FROM room WHERE RoomID = ?");
            $stmt->bind_param("s", $room_id);
            $stmt->execute();
            $stmt->bind_result($count);
            $stmt->fetch();

            if($count){
                $stmt->close();
                $result =$conn->prepare("UPDATE room SET StateID=?  WHERE RoomID=?");
                $result->bind_param("ss", $room_state,$room_id);
                $result ->execute();
                $message=$room_id." State updated to ".$room_state;
                $result ->close();
            }
            else{
                $room_state_err="Enter a Valid Room ID";
            }
        }
        else{
            $room_state_err="Enter a Room ID";
        }  
        
    }

    if(isset($_POST["submit-building-state"])){
                $result =$conn->prepare("UPDATE room SET StateID=?  WHERE BuildingID=?");
                $result->bind_param("ss", $building_state,$building_id);
                $result ->execute();
                $message=$building_id." Building state has changed to ".$building_state;
                $result ->close();
    
    }  
        mysqli_close($conn);   
    }

?>