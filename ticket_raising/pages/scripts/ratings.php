<?php
//echo "hi";
include_once("../includes/db.php");
session_start();
if(isset($_SESSION["resolver_id"])){
    $resolver_id = $_SESSION["resolver_id"];
    $type = "resolver";
}
if(isset($_SESSION["session_time"])){
    $datetime = $_SESSION["session_time"];
}

$_SESSION["month_flag"] = 0;

    $query = "UPDATE resolvers SET resolver_type = 0 WHERE resolver_type = 1";
    $result = mysqli_query($connection,$query);


date_default_timezone_set('Asia/Kolkata');
$month = date("m");
$time = date("H:i:s");
$year = date("Y");
//echo $year;
$day = date("d");

$prevMonth = $month-1;

if($month != 1){
    $query = "SELECT issue_solved_id FROM issues_solved WHERE resolver_id = $resolver_id AND date_of_solving BETWEEN '$year-$prevMonth-$day' AND '$year-$month-$day'";
    $query1 = "SELECT * FROM ticket_assigned WHERE resolver_id = $resolver_id AND ticket_allocated_day BETWEEN '$year-$prevMonth-$day' AND '$year-$month-$day'";
    
}else{
    $query = "SELECT issue_solved_id FROM issues_solved WHERE resolver_id = $resolver_id AND date_of_solving BETWEEN '$year-$month-1' AND '$year-$month-$day'";
    $query1 = "SELECT * FROM ticket_assigned WHERE resolver_id = $resolver_id AND ticket_allocated_day BETWEEN '$year-$month-1' AND '$year-$month-$day'";
}

    $result = mysqli_query($connection,$query);
    echo $query;

    $result1 = mysqli_query($connection,$query1);
    echo $query1;

    $solved_count = mysqli_num_rows($result);
    $taken_count = mysqli_num_rows($result1);
    echo $solved_count;
    echo $taken_count;

    $ratings = 0;
    $count = $taken_count - $solved_count;
    if($taken_count>13){
        if($count<5){
            echo "good";
            $ratings++;
            echo $ratings;
            if($count==0){
                $ratings++;
            }
        }else{
            echo "not good";
        }
    }else{
        echo "you took so less issues";
    }

    $query2 = "SELECT ta.ticket_id,ta.resolver_id,ta.ticket_allocated_day,iso.date_of_solving FROM ticket_assigned ta, issues_solved iso WHERE ta.resolver_id = $resolver_id AND ta.issue_status = 1 AND ta.issue_status_by_user = 1 AND ta.ticket_id = iso.ticket_id AND ta.resolver_id = iso.resolver_id";
    $result = mysqli_query($connection,$query2);
    echo $query2;
    
    $d1 = "2019-01-20";
    $d2 = "2019-01-05";
//    date_diff($d1,$d2);

    $tp_count = 0;
    $store_count = 0;
    while($row = mysqli_fetch_assoc($result)){
        $ticket_allocated_day = $row["ticket_allocated_day"];
        $date_of_solving = $row["date_of_solving"];
//        echo $ticket_allocated_day;
//        echo $date_of_solving;
        
        $date1 = date_create($ticket_allocated_day);
        $date2 = date_create($date_of_solving);
        
        $date3 = date_diff($date1,$date2);
        
        if(($date3->format('%R%a days'))<2){
            $ratings++;
//            echo "s";
        }
        
        $store = $date3->format('%a');
        $store_count+= $store;
//        echo $store;
        echo $store_count;
        
        if($solved_count>10){
            if($store_count<30){
                $ratings++;
            }
        }
        
    }

//echo $ratings;

//4//3

    $query = "UPDATE resolvers SET ratings = $ratings WHERE resolver_id = $resolver_id";
    $result = mysqli_query($connection,$query);
    
    if($ratings>3){
        $query = "UPDATE resolvers SET resolver_type = 1 WHERE resolver_id = $resolver_id";
        $result = mysqli_query($connection,$query);
    }
    
    
    
    
    

    header("Location: http://localhost/ticket_raising/pages/index-resolver.php");
    
    


?>
