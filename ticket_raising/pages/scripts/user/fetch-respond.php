<?php

require_once("../../includes/db.php");
session_start();


if(isset($_POST['ticket_id'])){
    $ticket_id = $_POST['ticket_id'];
    $query = "select t.ticket_id,t.ticket_subject,t.ticket_message,s.software_name,t.date_of_ticket_issue,ta.issue_status,iso.issue_solved_id,iso.date_of_solving from ticket t,software s,ticket_assigned ta,issues_solved iso 
where t.ticket_id=ta.ticket_id and t.software_id=s.software_id and t.ticket_id=iso.ticket_id HAVING t.ticket_id=$ticket_id";
    $result = mysqli_query($connection, $query);
    $row = mysqli_fetch_assoc($result);
    $_SESSION["fetch_id_respond"] = $ticket_id;
    echo json_encode($row);
}
    
?>