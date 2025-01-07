<?php
include "../../db-files/connection.php";
    $sql="SELECT room.RoomID,room.StateID,room.BuildingID,
    roomtype.RoomType,roomtype.RoomTypeID,building.BuildingName
    FROM room

    INNER JOIN roomtype ON room.RoomTypeID = roomtype.RoomTypeID
    INNER JOIN building ON room.BuildingID=building.BuildingID

    ORDER BY room.RoomID
    ";    
//CHECKING search button press
if(isset($_POST["submit-search"])){
    $search_building_name=$_POST["search-building-name"];
    $search_room_type=$_POST["search-room-type"];

    
    if($_POST["search-state"]=="Any"){
        $sql="SELECT room.RoomID,room.StateID,room.BuildingID,
        roomtype.RoomType,roomtype.RoomTypeID,building.BuildingName
        FROM room

        INNER JOIN roomtype ON room.RoomTypeID = roomtype.RoomTypeID
        INNER JOIN building ON room.BuildingID=building.BuildingID

        WHERE (building.BuildingName LIKE '%".$search_building_name."%' AND roomType.RoomType LIKE '%".$search_room_type."%') 
        

        ORDER BY room.RoomID 
    ";
    }
    else{
        $search_state=$_POST["search-state"];

        $sql="SELECT room.RoomID,room.StateID,room.BuildingID,
        roomtype.RoomType,roomtype.RoomTypeID,building.BuildingName
        FROM room

        INNER JOIN roomtype ON room.RoomTypeID = roomtype.RoomTypeID
        INNER JOIN building ON room.BuildingID=building.BuildingID

        WHERE (building.BuildingName LIKE '%".$search_building_name."%' AND roomType.RoomType LIKE '%".$search_room_type."%') 
        AND (room.StateID = '$search_state') 

        ORDER BY room.RoomID
    ";

    }

    
}
        $result = $conn->query($sql);   
    
        if ($result->num_rows > 0) {
            // output data of each row
        ?>
            
            <table>
                <tr>
                    <th>Buliding Name </th>
                    <th>Room ID</th>
                    <th>Room Type</th>
                    <th>State</th>
                </tr>
            <?php    
                
                while($row = $result->fetch_assoc()) {

            ?>
                <tr>
                    <td>    <?php echo $row["BuildingName"]     ?>   </td>
                    <td>    <?php echo $row["RoomID"]     ?>   </td>
                    <td>    <?php echo $row["RoomType"]     ?>  </td>
                    <td>    <?php echo $row["StateID"]      ?>  </td>
                </tr>
             <?php   ;
            }
            ?>
            </table>
            
        <?php 
        }
    
    
    
        $conn->close();   