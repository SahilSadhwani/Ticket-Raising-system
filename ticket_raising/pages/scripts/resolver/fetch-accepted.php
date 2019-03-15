<?php

require_once("../../includes/db.php");
session_start();
if(isset($_SESSION["resolver_id"])){
    $resolver_id = $_SESSION["resolver_id"];
}
if(isset($_POST['ticket_id'])){
    $ticket_id = $_POST['ticket_id'];
    $query = "select t.ticket_id,t.ticket_subject,t.ticket_message,t.ticket_specification,s.software_name,t.date_of_ticket_issue,t.timestamp_of_ticket,ta.issue_status,ta.ticket_allocated_day,ta.time_of_ticket_allocated,ta.reply, ta.resolver_id FROM ticket t,software s,ticket_assigned ta WHERE t.software_id = s.software_id and t.ticket_id=ta.ticket_id HAVING t.ticket_id=$ticket_id and ta.resolver_id=$resolver_id";
    $result = mysqli_query($connection, $query);
    $row = mysqli_fetch_assoc($result);
    $_SESSION["fetch_id"]=$ticket_id;
    echo json_encode($row);
}
    
?>