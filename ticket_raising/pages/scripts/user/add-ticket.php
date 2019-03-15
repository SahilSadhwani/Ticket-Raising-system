<?php
include_once("../../includes/db.php");
require_once("../../../assets/global/plugins/fpdf/fpdf.php");

session_start();
if(isset($_SESSION["user_id"])){
    $user_id = $_SESSION["user_id"];
}

if(isset($_POST["add_ticket"])){
    
    $ticket_subject = $_POST["ticket_subject"];
    $ticket_message = $_POST["ticket_message"];
    $ticket_specification = $_POST["ticket_specification"];
    $software_name = $_POST["software_name"];
//    $_FILES[][] = $_POST["files"];
    
    
    
    
    $files = [];
    foreach($_FILES['files']['name'] as $i => $name) {

    $name = $_FILES['files']['name'][$i];
    $size = $_FILES['files']['size'][$i];
    $type = $_FILES['files']['type'][$i];
    $tmp = $_FILES['files']['tmp_name'][$i];

    $explode = explode('.', $name);


    $ext = end($explode);

    $updatdName = $explode[0] . time() .'.'. $ext;
    $path = 'uploads/';
    $path = $path . basename( $updatdName );

    if(empty($_FILES['files']['tmp_name'][$i])) {
        $errors[] = 'Please choose at least 1 file to be uploaded.';
    }else {

        $allowed = array('jpg','jpeg','gif','bmp','png');

        $max_size = 2000000; // 2MB

        if(in_array($ext, $allowed) === false) {
            $errors[] = 'The file <b>'.$name.'</b> extension is not allowed.';
        }

        if($size > $max_size) {
            $errors[] = 'The file <b>'.$name.'</b> size is too hight.';
        }

    }

    if(empty($errors)) {

        // if there is no error then set values
        $files['file_name'][] = $updatdName;
        $files['size'][] = $size;
        $files['type'][] = $type;
        $errors = array();
        if(!file_exists('uploads')) {
            mkdir('uploads', 0777);
        }

        if(move_uploaded_file($tmp, $path)) {
            echo '<p>The file <b>'.$name.'</b> successful upload</p>';
        }else {
            echo 'Something went wrong while uploading 
     <b>'.$name.'</b>';
        }

    }else {
        foreach($errors as $error) {
            echo '<p>'.$error.'<p>';
        }
    }

}

if(!empty($files)) {

    $files['file_name'][] = $updatdName;
    $files['size'][] = $size;
    $files['type'][] = $type;
    $names = implode(',', $files['file_name']);
    $sizes = implode(',', $files['size']);
    $types = implode(',', $files['type']);
    

}

    
    
    
    
    
    
    
    
    
    
    
    
    
    
//    
//    
//    
    $query = "SELECT * FROM software WHERE software_name = '$software_name'";
    $result = mysqli_query($connection, $query);
    $row = mysqli_fetch_assoc($result);
    $software_id = $row["software_id"];
    
    
    
    

    date_default_timezone_set('Asia/Kolkata');
    $date = date("Y-m-d");
    $time = date("H:i:s");


    
    
    $query = "INSERT INTO ticket(user_id,software_id,ticket_subject,ticket_message,ticket_photos,ticket_specification,date_of_ticket_issue,timestamp_of_ticket) VALUES($user_id,$software_id,'$ticket_subject','$ticket_message','$names','$ticket_specification','$date','$time')";
    $result = mysqli_query($connection, $query);
    echo $query;
    if($result){
        echo "success";
    }
    else{
        echo "fail";
    }
    
    $query = "SELECT ticket_id FROM ticket WHERE user_id = $user_id AND software_id = $software_id AND ticket_subject = '$ticket_subject' AND ticket_message = '$ticket_message' AND date_of_ticket_issue = '$date' AND timestamp_of_ticket = '$time'";
    $result = mysqli_query($connection,$query);
    $row = mysqli_fetch_assoc($result);
    $ticket_id = $row['ticket_id'];
    
    
    $query = "INSERT INTO ticket_unsolved(ticket_id) VALUES($ticket_id)";
    $result = mysqli_query($connection,$query);
    
    header("Location: ../../index.php");
    
    
    
    
    
    
}

?>
