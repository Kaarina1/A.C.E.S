<?php
    $sql="SELECT log_details.LogID, log_details.CardID, log_details.Time, log_details.Decision,
             log.LogID, log.RoomID, log.Date
    FROM log_details

    INNER JOIN log ON log_details.LogID = log.LogID

    ORDER BY log.RoomID,log.Date,log_details.Time
    ";

   if(isset($_POST["submit-search"])){
        $room_id=$_POST["search-room-id"];
        $date=$_POST["search-date"];
        //Both searches filled
        if($room_id!="All" && $date!=""){
            $sql="SELECT log_details.LogID, log_details.CardID, log_details.Time, log_details.Decision,
             log.LogID, log.RoomID, log.Date
            FROM log_details

            INNER JOIN log ON log_details.LogID = log.LogID

            WHERE log.RoomID= '$room_id' AND log.Date= '$date'

            ORDER BY log.RoomID,log.Date,log_details.Time
            
            ";
        }
        //Date is blank
        else if($room_id!="All" &&$date==""){
            $sql="SELECT log_details.LogID, log_details.CardID, log_details.Time, log_details.Decision,
             log.LogID, log.RoomID, log.Date
            FROM log_details

            INNER JOIN log ON log_details.LogID = log.LogID

            WHERE log.RoomID= '$room_id'

            ORDER BY log.RoomID,log.Date,log_details.Time
            
            ";
        }
        //Room ID is blank
        else if($room_id=="All" &&$date!=""){
            $sql="SELECT log_details.LogID, log_details.CardID, log_details.Time, log_details.Decision,
            log.LogID, log.RoomID, log.Date
           FROM log_details

           INNER JOIN log ON log_details.LogID = log.LogID

           WHERE log.Date= '$date'

           ORDER BY log.RoomID,log.Date,log_details.Time
           
           ";
        }
 
        
    }

        $result = $conn->query($sql);   
    
        if ($result->num_rows > 0) {
        ?>
            <table>
                <tr>
                    <th>Room</th> 
                    <th>Date</th>
                    <th>Time</th>
                    <th>Card ID</th>
                    <th>Decision</th>
                </tr>
            <?php    
                while($row = $result->fetch_assoc()) {
            ?>
                <tr>
                <td>     <?php echo $row["RoomID"]      ?></td>
                <td>     <?php echo $row["Date"]      ?></td>
                <td>     <?php echo $row["Time"]      ?></td>
                <td><?php echo $row["CardID"]     ?></td>
                <td>  <?php 
                if($row["Decision"]==0){
                    echo "Unauthorised";
                }
                else{
                    echo "Authorised";
                }
                ?></td>
                </tr>
             <?php   ;
            }
            ?>
            </table>
            
        <?php 
        }
        else{
            echo "No accees attempts for this room";
        }

        $conn->close();   