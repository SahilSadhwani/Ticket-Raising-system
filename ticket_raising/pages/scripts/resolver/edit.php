<?php

require_once("../../includes/functions.php");
session_start();

if(isset($_POST['edit_ticket'])){
    $ticket_id = $_POST['ticket_id'];
    $ticket_subject = $_POST['ticket_subject'];
    $software_name = $_POST['software_name'];
    $date_of_ticket_issue = $_POST['date_of_ticket_issue'];
    $timestamp_of_ticket = $_POST['timestamp_of_ticket'];
    
//    $employee_id = $_SESSION['employee_id'];
    
    $query = "UPDATE ticket SET ticket_taken = 1 WHERE ticket_id = $ticket_id";
    
    $result = mysqli_query($connection, $query);
//    checkQueryResult($result);
    
    //echo "Updated!";
    $_SESSION['status'] = CATEGORY_EDIT_SUCCESS;
    header("Location: http://".BASE_SERVER."/ticket_raising/pages/index-resolver.php");
    exit();
}
?>