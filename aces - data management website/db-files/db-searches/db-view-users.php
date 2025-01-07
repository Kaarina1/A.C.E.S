<?php
include "../../db-files/connection.php";
    $sql="SELECT person.CardID,person.PersonID,person.FirstName,person.LastName,person.StartDate,person.EndDate,person.RoleID,role.Role
    FROM person

    INNER JOIN role ON person.RoleID=role.RoleID

    ORDER BY person.LastName
    ";    
$result = $conn->query($sql);   
    
    if ($result->num_rows > 0) {
        // output data of each row
    ?>
        <table>
            <tr>
                <th>CardID </th>
                <th>PersonID</th>
                <th>First Name</th>
                <th>Last Name </th>
                <th>Start Date</th>
                <th>End Date</th>
                <th>Role Type</th>
            </tr>
            <?php    
                while($row = $result->fetch_assoc()) {
            ?>
            <tr>
                    <td>    <?php echo $row["CardID"]     ?>   </t>
                    <td>    <?php echo $row["PersonID"]     ?>   </td>
                    <td>    <?php echo $row["FirstName"]     ?>  </td>
                    <td>    <?php echo $row["LastName"]      ?>  </td>
                    <td>    <?php echo $row["StartDate"]     ?>   </td>
                    <td>    <?php echo $row["EndDate"]     ?>   </td>
                    <td>    <?php echo $row["Role"]      ?>  </td>
            </tr>
         <?php   ;
        }
        ?>
        </table>
    <?php 
}   
$conn->close();   