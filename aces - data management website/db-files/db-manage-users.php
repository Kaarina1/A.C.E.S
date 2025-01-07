<?php
// Connection details held in seperate document
include "../../db-files/connection.php";
$card_id=$message="";
$card_id_delete_err=$card_id_update_err=$card_add_err="";
if($_SERVER["REQUEST_METHOD"] == "POST"){
    if(isset($_POST["submit-delete-user"])){
        $card_id=$_POST["card-id"];
        if(!empty($card_id)){
            $stmt=$conn->prepare("SELECT count(1) FROM person WHERE CardID = ?");
            $stmt->bind_param("s", $card_id);
            $stmt->execute();
            $stmt->bind_result($count);
            $stmt->fetch();

            if($count){
                $stmt->close();
                $result =$conn->prepare("DELETE FROM person WHERE CardID=?");
                $result->bind_param("s", $card_id);
                $result ->execute();
                $message=$card_id."Deleted";
                $result ->close();
            }
            else{
                $card_id_delete_err="Enter a Valid Card ID";
            }
        }
        else{
            $card_id_delete_err="Enter a Card ID";
        }     
    }

    //Edit User
    //Check Card ID is valid
    //Just review date and role type
    //Review Date needs a time added

    if(isset($_POST["submit-edit-user"])){
    
        $card_id=$_POST["card-id"];
        if(!empty($card_id)){
            $stmt=$conn->prepare("SELECT count(1) FROM person WHERE CardID = ?");
            $stmt->bind_param("s", $card_id);
            $stmt->execute();
            $stmt->bind_result($count);
            $stmt->fetch();
            $stmt->close();
            if($count){
                $new_date=$_POST["end-date"];
                $result =$conn->prepare("UPDATE person SET EndDate=? AND RoleID=? WHERE CardID=?");
                $result->bind_param("iisi",$new_date,$new_role, $card_id);
                $result ->execute();
                $message=$card_id." Updated: ".$new_date." ".$new_role;
            }
            else{
                $card_id_update_err="Enter a Valid Card ID";
            }
        }
        else{
            $card_id_update_err="Enter a Card ID";
        }     
    }

    if(isset($_POST["submit-add-user"])){
        $person_id=$_POST["add-user-id"];
        $first_name=$_POST["add-user-fname"];
        $surname=$_POST["add-user-sname"];
        $start_date=$_POST["add-user-date"];
        $role=$_POST["add-user-role"];
        if(empty( $person_id) ||empty($first_name) || empty($start_date)){
            $card_add_err="Enter All Details";
        }
        else if($person_id<0){
            $card_add_err="Enter whole number for ID";
        }
       else{
                $stmt=$conn->prepare("SELECT count(1) FROM person WHERE PersonID = ?");
                $stmt->bind_param("s", $person_id);
                $stmt->execute();
                $stmt->bind_result($count);
                $stmt->fetch();
                $stmt->close();
                if($count){
                    $card_add_err="User already exists";
                }
                else{
                    $stmt=$conn->prepare("SELECT Years,Months,Days FROM role WHERE RoleID = ?");
                    $stmt->bind_param("s", $role);
                    $stmt->execute();
                    $stmt->bind_result($years,$months,$days);
                    $stmt->fetch();
                    $stmt->close();
                
                    $end_date=date('Y-m-d',strtotime($start_date.'+ '.$years.' years'.'+ '.$months.' months'.'+ '.$days.' days'));
                    
                    $stmt=$conn->prepare("INSERT INTO person (PersonID, FirstName, LastName, StartDate, EndDate, RoleID) VALUES (?,?,?,?,?,?)");
                    $stmt->bind_param("isssss", $person_id,$first_name,$surname,$start_date,$end_date,$role);
                    $stmt->execute();
                    $stmt->close();
                    $message=$first_name." ".$surname." Added. Person ID: ".$person_id." Start Date: ".$start_date." Role ID:".$role;
                }
       }
    }
}
?>