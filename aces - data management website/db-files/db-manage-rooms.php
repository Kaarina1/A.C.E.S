<?php
// Connection details held in seperate document
include "../../db-files/connection.php";
$room_id=$message="";
$room_id_delete_err=$room_id_update_err=$room_add_err="";

if($_SERVER["REQUEST_METHOD"] == "POST"){

    $room_id=$_POST["search-room-id"];
    $edit_room_type=$_POST["edit-room-type"];
    $add_building_id=$_POST["add-building-id"];
    $add_floor_number=$_POST["add-floor-number"];
    $add_room_number=$_POST["add-room-number"];
    $add_room_type=$_POST["add-room-type"];

    if(isset($_POST["submit-delete-room"])){
    
        if(!empty($room_id)){
            $stmt=$conn->prepare("SELECT count(1) FROM room WHERE RoomID = ?");
            $stmt->bind_param("s", $room_id);
            $stmt->execute();
            $stmt->bind_result($count);
            $stmt->fetch();

            if($count){
                $stmt->close();
                $result =$conn->prepare("DELETE FROM room WHERE RoomID=?");
                $result->bind_param("s", $room_id);
                $result ->execute();
                $message=$room_id."Deleted";
                $result ->close();
            }
            else{
                $room_id_delete_err="Enter a Valid Room ID";
            }
        }
        else{
            $room_id_delete_err="Enter a Room ID";
        }  
        
    }

    if(isset($_POST["submit-edit-room"])){
    
        if(!empty($room_id)){
            $stmt=$conn->prepare("SELECT count(1) FROM room WHERE RoomID = ?");
            $stmt->bind_param("s", $room_id);
            $stmt->execute();
            $stmt->bind_result($count);
            $stmt->fetch();
            $stmt->close();
            if($count){
                $result =$conn->prepare("UPDATE room SET RoomTypeID=? WHERE RoomID=?");
                $result->bind_param("ss",$edit_room_type, $room_id);
                $result ->execute();
                $message=$room_id." Type Changed to: ".$edit_room_type;
                $result ->close();
            }
            else{
                $room_id_update_err="Enter a Valid Room ID";
            }
        }
        else{
            $room_id_update_err="Enter a Room ID";
        }  

        
    
    
    }
    if(isset($_POST["submit-add-room"])){
        //Check if floor or room is blank
        if(empty($add_floor_number) ||empty($add_room_number) ){
            $room_add_err="Enter floor and room number";
        }
        else if($add_floor_number<0 ||$add_room_number<0){
            $room_add_err="Enter whole numbers";
        }
       else{
            //Checks if the floor is valid
            $stmt=$conn->prepare("SELECT Floors FROM building WHERE BuildingID = ?");
            $stmt->bind_param("s", $add_building_id);
            $stmt->execute();
            $stmt->bind_result($output);
            $stmt->fetch();
            $stmt->close();

            if($output>=$add_floor_number){
                $room_number=sprintf("%02d",$add_room_number);

                $room_id=$add_building_id.$add_floor_number.$room_number;

            //Check if room already exists:
                $stmt=$conn->prepare("SELECT count(1) FROM room WHERE RoomID = ?");
                $stmt->bind_param("s", $room_id);
                $stmt->execute();
                $stmt->bind_result($count);
                $stmt->fetch();
                $stmt->close();

                if($count){
                    $room_add_err="Room ".$room_id." already exists";
                }
                else{
                    $state="N";
                    $stmt=$conn->prepare("INSERT INTO room (RoomID, BuildingID, Floor, RoomNumber, StateID, RoomTypeID) VALUES (?,?,?,?,?,?)");
                    $stmt->bind_param("ssiiss", $room_id,$add_building_id,$add_floor_number,$room_number,$state,$add_room_type);
                    $stmt->execute();
                    $stmt->close();
                    $message=$room_id." Added Successfully";
                    $room_add_err="".$output;
                }
            }
            else{
                $room_add_err="This building only has ".$output." floors";
            }
        

        
       }
        

    }
    mysqli_close($conn);
}
?>