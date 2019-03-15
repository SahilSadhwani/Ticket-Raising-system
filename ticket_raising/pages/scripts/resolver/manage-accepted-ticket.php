<?php
require_once("../../includes/db.php");
session_start();
if(isset($_SESSION["resolver_id"])){
    $resolver_id = $_SESSION["resolver_id"];
//    echo $resolver_id;
}

$columns = array("ticket_id", "ticket_subject","software_name", "date_of_ticket_issue", "issue_status","date_of_solving");
$query = "select t.ticket_id,t.ticket_subject,s.software_name,t.date_of_ticket_issue,ta.issue_status from ticket t,software s,ticket_assigned ta where ta.resolver_id=$resolver_id and t.ticket_id=ta.ticket_id and t.software_id=s.software_id";

//echo $query;

//if(isset($_POST["search"]["value"])){
//    $query .= " AND t.ticket_id like '%".$_POST["search"]["value"]."%' OR t.ticket_subject like '%". $_POST['search']['value']."%' OR s.software_name like '%". $_POST['search']['value']."%' OR t.date_of_ticket_issue like '%". $_POST['search']['value']."%'";
//}
//if(isset($_POST["order"])){
//    $query .= " ORDER BY ".$columns[$_POST['order']['0']['column']]." ".$_POST['order']['0']['dir'];
//}else{
//    $query .= " ORDER BY ".$columns[0]." ASC";
//}

//echo $query;

//$query1 = "";
//if($_POST["length"]!=-1){
//    $query1 = ' LIMIT '. $_POST['start'] . ', '.$_POST['length'];  
//}


$number_filtered_row = mysqli_num_rows(mysqli_query($connection, $query));

$result = mysqli_query($connection, $query);

$data = array();
while($row = mysqli_fetch_assoc($result)){
    $sub_array = array();
    
    $sub_array[] = $row["ticket_id"];
    $sub_array[] = $row["ticket_subject"];
    $sub_array[] = $row["software_name"];
    $sub_array[] = $row["date_of_ticket_issue"];
    $sub_array[] = $row["issue_status"];
//    $sub_array[] = $row["date_of_solving"];
    $sub_array[] = "<a><button class='edit fa fa-pencil btn blue btn-success' style='width:80px; height:35px; font-size:16px;' id='".$row['ticket_id']."' data-toggle='modal' >Reply</button></a>";
//    $sub_array[] = "<button class='delete fa fa-trash btn red' id='".$row['customer_id']."' data-toggle='modal' data-target='#deleteModal'></button>";
    // I MAY HAVE TO ADD SOME MORE COLUMNS!!!
    
    $data[] = $sub_array;
}

function get_all_data($connection,$resolver_id){
    $query = "select t.ticket_id,t.ticket_subject,s.software_name,t.date_of_ticket_issue,ta.issue_status from ticket t,software s,ticket_assigned ta where ta.resolver_id=$resolver_id and t.ticket_id=ta.ticket_id and t.software_id=s.software_id";
    
//    echo $query;
    return(mysqli_num_rows(mysqli_query($connection, $query)));
}

$output = array(
    "draw" => intval($_POST['draw']),
    "recordsTotal" => get_all_data($connection,$resolver_id),
    "recordsFiltered" => $number_filtered_row,
    "data" => $data,
);


echo json_encode($output);

//echo "tp";
?>