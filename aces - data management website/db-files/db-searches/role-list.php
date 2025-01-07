<?php
    include "../connection.php";

    $role_types=array();
    $role_IDs=array();

    $sql="SELECT *
    
    FROM role

    ";

$result = $conn->query($sql);
     if ($result->num_rows > 0) {
        
        while($row = $result->fetch_assoc()) {
                        
            array_push($role_types,$row["Role"]);
            array_push($role_IDs,$row["RoleID"]);
        }
    }
