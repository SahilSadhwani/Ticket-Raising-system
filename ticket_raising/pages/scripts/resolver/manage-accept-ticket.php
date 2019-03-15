<?php
require_once("../../includes/db.php");
session_start();
if(isset($_SESSION["resolver_id"])){
    $resolver_id = $_SESSION["resolver_id"];
//    echo $resolver_id;
}

$query1 = "SELECT resolver_type,current_no_of_issues FROM resolvers WHERE resolver_id = $resolver_id";
//echo $query1;
$result1 = mysqli_query($connection,$query1);
$row = mysqli_fetch_assoc($result1);
$resolver_type = $row["resolver_type"];
//echo "s";
//echo $resolver_type;

$current_no_of_issues = $row["current_no_of_issues"];

date_default_timezone_set('Asia/Kolkata');
$date = date("Y-m-d");
$time = date("H:i:s");
//echo $time;

$query = "";
$columns = array("ticket_id", "ticket_subject","software_name", "date_of_ticket_issue","timestamp_of_ticket");

if($time >= '15:00:00' && $time <= '18:00:00'){
//    echo "hi";
//    echo $time;
    if($current_no_of_issues <=2){
        
        if($resolver_type==1){
            $query = "select t.ticket_id,t.ticket_subject,s.software_name,t.date_of_ticket_issue,t.timestamp_of_ticket FROM ticket t,software s, software_resolver sr, resolvers r WHERE t.software_id = s.software_id and t.ticket_taken = 0 and t.ticket_specification='critical' and t.software_id = sr.software_id and r.resolver_id = sr.resolver_id AND r.resolver_id = $resolver_id";
        }
        else if($resolver_type==0){
            $query = "select t.ticket_id,t.ticket_subject,s.software_name,t.date_of_ticket_issue,t.timestamp_of_ticket FROM ticket t,software s, software_resolver sr, resolvers r WHERE t.software_id = s.software_id and t.ticket_taken = 0 and t.ticket_specification='non_critical' and t.software_id = sr.software_id and r.resolver_id = sr.resolver_id AND r.resolver_id = $resolver_id";
        }
    }
    else
        $query = "select t.ticket_id,t.ticket_subject,s.software_name,t.date_of_ticket_issue,t.timestamp_of_ticket FROM ticket t,software s WHERE t.software_id = s.software_id and t.ticket_taken = 0 and t.ticket_specification='non critical'";
}
else{
    if($resolver_type==1){
        $query = "select t.ticket_id,t.ticket_subject,s.software_name,t.date_of_ticket_issue,t.timestamp_of_ticket FROM ticket t,software s, software_resolver sr, resolvers r WHERE t.software_id = s.software_id and t.ticket_taken = 0 and t.ticket_specification='critical' and t.software_id = sr.software_id and r.resolver_id = sr.resolver_id AND r.resolver_id = $resolver_id";
        
        
    }
    else if($resolver_type==0){
        $query = "select t.ticket_id,t.ticket_subject,s.software_name,t.date_of_ticket_issue,t.timestamp_of_ticket FROM ticket t,software s, software_resolver sr, resolvers r WHERE t.software_id = s.software_id and t.ticket_taken = 0 and t.ticket_specification='non_critical' and t.software_id = sr.software_id and r.resolver_id = sr.resolver_id AND r.resolver_id = $resolver_id";
    }

}

//echo $query;

//$query = "select t.ticket_id,t.ticket_subject,s.software_name,t.date_of_ticket_issue,t.timestamp_of_ticket FROM ticket t,software s WHERE t.software_id = s.software_id and t.ticket_taken = 0 and t.ticket_specification='critical'";

//if(isset($_POST["search"]["value"])){
//    $query .= " AND (t.date_of_ticket_issue like '%".$_POST["search"]["value"]."%' OR t.timestamp_of_ticket like '%". $_POST['search']['value']."%')";
//}
//if(isset($_POST["order"])){
//    $query .= " ORDER BY ".$columns[$_POST['order']['0']['column']]." ".$_POST['order']['0']['dir'];
//}else{
//    $query .= " ORDER BY ".$columns[0]." ASC";
//}

//$query1 = "";
//
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
    $sub_array[] = $row["timestamp_of_ticket"];
    $sub_array[] = "<a><button class='edit fa fa-pencil btn blue btn-success' style='width:80px; height:35px; font-size:16px;'' id='".$row['ticket_id']."' data-toggle='modal' >Accept</button></a>";
//    $sub_array[] = "<button class='delete fa fa-trash btn red' id='".$row['category_id']."' data-toggle='modal' data-target='#deleteModal'></button>";
    // I MAY HAVE TO ADD SOME MORE COLUMNS!!!
    
    $data[] = $sub_array;
}

function get_all_data($connection,$query){
    $query1 = $query;
    return(mysqli_num_rows(mysqli_query($connection, $query1)));
}

$output = array(
    "draw" => intval($_POST['draw']),
    "recordsTotal" => get_all_data($connection,$query),
    "recordsFiltered" => $number_filtered_row,
    "data" => $data,
);

echo json_encode($output);

?>    
