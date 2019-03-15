<?php

require_once("../../includes/db.php");
session_start();
if(isset($_POST['ticket_id'])){
    $ticket_id = $_POST['ticket_id'];
    $query = "select t.ticket_id,t.ticket_subject,t.ticket_message,t.ticket_specification,s.software_name,t.date_of_ticket_issue,t.timestamp_of_ticket FROM ticket t,software s WHERE t.software_id = s.software_id HAVING t.ticket_id=$ticket_id";
    $result = mysqli_query($connection, $query);
    $row = mysqli_fetch_assoc($result);
    $_SESSION["fetch_id"]=$ticket_id;
    echo json_encode($row);
}
    
?>