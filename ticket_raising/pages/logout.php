<?php
require_once("includes/db.php");
session_start();

//    if(isset($_POST["logout"])){
        if(isset($_SESSION["user_id"])){
            unset($_SESSION["user_id"]);
        }
        if(isset($_SESSION["resolver_id"])){
//            $datetime = $_SESSION["session_time"];
//            echo $datetime;
//            echo "heyhey";
            date_default_timezone_set('Asia/Kolkata');
            $date = date("Y-m-d");
            $time = date("H:i:s");
            
            $query = "UPDATE resolver_working_period SET logout_timestamp ='$time' WHERE day = '$datetime' AND resolver_id = $resolver_id";
            $result = mysqli_query($connection,$query);
            
            unset($_SESSION["session_time"]);
            unset($_SESSION["resolver_id"]);
        }
        if(isset($_SESSION["fetch_id"])){
            unset($_SESSION["fetch_id"]);
        }
        if(isset($_SESSION["ticket_id"])){
            unset($_SESSION["ticket_id"]);
        }
        header("Location: http://localhost/ticket_raising/pages/login.php");
        exit();
//    }
?>