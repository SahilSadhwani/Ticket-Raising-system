<!DOCTYPE html>
<!--
* CoreUI - Free Bootstrap Admin Template
* @version v2.1.10
* @link https://coreui.io
* Copyright (c) 2018 creativeLabs Łukasz Holeczek
* Licensed under MIT (https://coreui.io/license)
-->
<?php
require_once("includes/db.php");
session_start();
if(isset($_SESSION["resolver_id"])){
    $resolver_id = $_SESSION["resolver_id"];
    $type = "resolver";
}
if(isset($_SESSION["session_time"])){
    $datetime = $_SESSION["session_time"];
}
?>
<html lang="en">
  <head>
    <base href="./">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <meta name="description" content="CoreUI - Open Source Bootstrap Admin Template">
    <meta name="author" content="Łukasz Holeczek">
    <meta name="keyword" content="Bootstrap,Admin,Template,Open,Source,jQuery,CSS,HTML,RWD,Dashboard">
    <title>CoreUI Free Bootstrap Admin Template</title>
    <!-- Icons-->
    <link href="node_modules/@coreui/icons/css/coreui-icons.min.css" rel="stylesheet">
    <link href="node_modules/flag-icon-css/css/flag-icon.min.css" rel="stylesheet">
    <link href="node_modules/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <link href="node_modules/simple-line-icons/css/simple-line-icons.css" rel="stylesheet">
    
    <link rel="stylesheet" href="../assets/global/plugins/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="vendors/select2/css/select2.min.css">
    <link rel="stylesheet" href="../assets/global/plugins/datatables/datatables.min.css">
    <link rel="stylesheet" href="../assets/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.css">
    <!-- Main styles for this application-->
    <link href="css/style.css" rel="stylesheet">
    <link href="vendors/pace-progress/css/pace.min.css" rel="stylesheet">
    <!-- Global site tag (gtag.js) - Google Analytics-->
    <script async="" src="https://www.googletagmanager.com/gtag/js?id=UA-118965717-3"></script>
    <script>
      window.dataLayer = window.dataLayer || [];

      function gtag() {
        dataLayer.push(arguments);
      }
      gtag('js', new Date());
      // Shared ID
      gtag('config', 'UA-118965717-3');
      // Bootstrap ID
      gtag('config', 'UA-118965717-5');
    </script>
  </head>
  <body class="app header-fixed sidebar-fixed aside-menu-fixed sidebar-lg-show" style="font-size:16px;">
    
    <?php
    include_once("includes/header.php");  
    ?>
    
    
    <div class="app-body">
      <div class="sidebar">
        
        <?php
          include_once("includes/sidebar.php");
          ?>
        
        </div>
      <main class="main">
        <!-- Breadcrumb-->
        <ol class="breadcrumb">
          <li class="breadcrumb-item">Home</li>
          <li class="breadcrumb-item">
            <a href="#">Admin</a>
          </li>
          <li class="breadcrumb-item active">Dashboard</li>
          <!-- Breadcrumb Menu-->
          <li class="breadcrumb-menu d-md-down-none">
            <div class="btn-group" role="group" aria-label="Button group">
              <a class="btn" href="#">
                <i class="icon-speech"></i>
              </a>
              <a class="btn" href="./">
                <i class="icon-graph"></i>  Dashboard</a>
              <a class="btn" href="#">
                <i class="icon-settings"></i>  Settings</a>
            </div>
          </li>
        </ol>
        <div class="container-fluid">
          <div class="animated fadeIn">
            <div class="row">
              
              
            </div>
            <!-- /.row-->
            
            <!-- /.card-->
            <div class="row">
              
            </div>
            <!-- /.row-->
            <div class="row">
                    </div>
                    <!-- /.row-->
                        
                      <!-- /.col-->
                      
                      <!-- /.col-->
                    </div>
                    <!-- /.row-->
                    <br>
<!--                    <hr>-->
                    
                    
                    <div class="tabs-on-user-page">
                        <div class="container-fluid">
                           
                           <div id="tp123" style="width:20px; height:50px; color:#222;">
                               <?php
                               $ticket_id = $_SESSION["fetch_id"];
                               $query = "select t.ticket_id,t.ticket_subject,t.ticket_message,t.ticket_specification,s.software_name,t.date_of_ticket_issue,t.timestamp_of_ticket FROM ticket t,software s WHERE t.software_id = s.software_id HAVING t.ticket_id=$ticket_id";
                               $result = mysqli_query($connection, $query);
                               $row = mysqli_fetch_assoc($result);
                               
                               $ticket_id = $row["ticket_id"];
                               $ticket_subject = $row["ticket_subject"];
                               $ticket_message = $row["ticket_message"];
                               $ticket_specification = $row["ticket_specification"];
                               $software_name = $row["software_name"];
                               $date_of_ticket_issue = $row["date_of_ticket_issue"];
                               $timestamp_of_ticket = $row["timestamp_of_ticket"];
                               
                               
                               ?>
                           </div>

                           
                           <div class="row">
                                           <div class="col-md-12">
                                              
                                               <form action="" method="POST">
                                                   <div class="form-body">
                                                      
                                                      
                                                       <div class="form-group">
                                                           <label class="control-label col-md-4" style="font-size:20px; margin-bottom:20px; margin-top:20px;">Ticket ID
                                                            
                                                            </label>
                                                            <div class="col-md-5">
                                                            <input type="text" name="ticket_id" class="form-control" readonly placeholder="Ticket ID" value="<?php echo $ticket_id ?>" style="height:50px; font-size:20px; margin-bottom:20px; margin-top:20px;"/> </div>
                                                       </div>
                                                      
                                                       <div class="form-group">
                                                           <label class="control-label col-md-4" style="font-size:20px; margin-bottom:20px; margin-top:20px;">Ticket Subject
                                                           
                                                            </label>
                                                            <div class="col-md-5">
                                                            <input type="text" name="user_name" readonly class="form-control" placeholder="Enter a Subject" value="<?php echo $ticket_subject ?>"style="height:50px; font-size:20px; margin-bottom:20px; margin-top:20px;"/> </div>
                                                       </div>
                                                       
                                                       
                                                       
                                                        <div class="form-group">
                                                           <label class="control-label col-md-4" style="font-size:20px; margin-bottom:20px;">Issue
                                                           
                                                            </label>
                                                            <div class="col-md-8">
                                                                <textarea type="text" name="ticket_message" readonly class="form-control" placeholder="Enter the issue" style="height:50px; font-size:20px; margin-bottom:20px;" rows="15" cols="10"><?php echo $ticket_message ?></textarea> </div>
                                                       </div>
                                                       
                                                       <div class="form-group">
                                                           <label class="control-label col-md-6" style="font-size:20px; margin-bottom:20px;">Photos of issues
                                                            
                                                            </label>
<!--                                                            <div class="col-md-5">-->
<!--                                                            <input type="file" multiple="" accept="image/*" name="user_name" class="form-control" placeholder="Photos" style="height:50px; font-size:20px; margin-bottom:20px;"/>-->
                                                            
                                                            <?php
 $query ="SELECT ticket_photos FROM ticket WHERE ticket_id=$ticket_id";
$result = mysqli_query($connection, $query);
$row = mysqli_fetch_assoc($result);
$ticket_photos = $row["ticket_photos"];
// echo $row["ticket_photos"];
 $array = explode(",",$ticket_photos);
                                                                
//echo $array[0];                                                                
foreach($array as $photo){
//    echo "s<br>";
    echo "<div class=\"col-md-12\">";
//    echo "s";
    echo "<img src=\"scripts/user/uploads/$photo\" style=\"width:600px; height:350px;\"><br>";
    echo "</div>";
    

}
?>
    
    
<!--                                                             </div>-->
                                                       </div>
                                                       
                                                       <div class="form-group">
                                                           <label class="control-label col-md-4" style="font-size:20px; margin-bottom:20px;">Specification
                                                            
                                                            </label>
                                                            <div class="col-md-5">
                                                            <input type="text" name="ticket_specification" readonly class="form-control" placeholder="Name" value="<?php echo $ticket_specification ?>"style="height:50px; font-size:20px; margin-bottom:20px;"/> </div>
                                                      
                                                       </div>
                                                       
                                                       
                                                       <div class="form-group">
                                                           <label class="control-label col-md-4" style="font-size:20px; margin-bottom:20px;">Software Name
                                                            
                                                            </label>
                                                            <div class="col-md-5">
                                                            <input type="text" name="software_name" readonly class="form-control" placeholder="Name" value="<?php echo $software_name ?>"style="height:50px; font-size:20px; margin-bottom:20px;"/> </div>
                                                      
                                                       </div>
                                                          
                                                        <div class="form-group">
                                                           <label class="control-label col-md-4" style="font-size:20px; margin-bottom:20px;">Date of issue
                                                            
                                                            </label>
                                                            <div class="col-md-5">
                                                            <input type="text" name="date_of_ticket_issue" readonly class="form-control" placeholder="Date of issue" value="<?php echo $date_of_ticket_issue ."  ". $timestamp_of_ticket ?>" style="height:50px; font-size:20px; margin-bottom:20px;"/> </div>
                                                      
                                                       </div>
                                                           
                                                       
                                                                                                           
                                                       <div class="col-md-offset-3 col-md-9">
                                                <button type="submit" class="btn btn-success" style="width:100px; height:40px; font-size:18px; margin-top:40px; margin-bottom:50px; margin-left: 150px;" name="accept_ticket">Accept</button>
                                                <a href="http://localhost/ticket_raising/pages/index-resolver.php"><button type="button" class="btn btn-danger" style="width:100px; height:40px; font-size:18px; margin-top:40px; margin-bottom:50px; margin-left: 300px;">Cancel</button></a>
                                            </div>
                                                   </div>
                                               </form>
                                           </div>
                                       </div>
                           
                        </div>
                        
                        <?php
                            
                        if(isset($_POST["accept_ticket"])){
                            $ticket_id = $_POST["ticket_id"];
                            $resolver_id = $_SESSION["resolver_id"];
//                            $user_id = $_SESSION["user_id"];
                            
                            
                            date_default_timezone_set('Asia/Kolkata');
                            $date = date("Y-m-d");
                            $time = date("H:i:s");
                            
                            
                            if($time >= '20:00:00' || $time <= '10:00:00'){
                                ?>
                                <script>
                                    alert("you can accept ticket only between 10am - 6pm");
                        </script>
                           <?php
                            }
                            else{
                                
                                $query = "SELECT * FROM resolvers WHERE resolver_id = $resolver_id";
                                $result = mysqli_query($connection,$query);
                                $row = mysqli_fetch_assoc($result);
                                $current_no_of_issues = $row["current_no_of_issues"];
                                if($current_no_of_issues==4){
                                ?>
                                <script>
                                    alert("cannot accept ticket, exceeds limit");
                                </script>
                               <?php
                                }
                                else{
                                    $query = "UPDATE ticket SET ticket_taken = 1 WHERE ticket_id = $ticket_id";
                                    $result = mysqli_query($connection,$query);
                            
                                    date_default_timezone_set('Asia/Kolkata');
                                    $date = date("Y-m-d");
                                    $time = date("H:i:s");
                            
                                    $query = "INSERT into ticket_assigned(ticket_id,resolver_id,issue_status,ticket_allocated_day,time_of_ticket_allocated) VALUES($ticket_id,$resolver_id,2,'$date','$time')";
                                    $result = mysqli_query($connection,$query);
//                                    echo $query;
                            
                                    $query = "SELECT * FROM resolvers WHERE resolver_id = $resolver_id";
                                    $result = mysqli_query($connection,$query);
                                    $row = mysqli_fetch_assoc($result);
                                    $current_no_of_issues = $row["current_no_of_issues"];
                                    $current_no_of_issues = $current_no_of_issues + 1;
                                    $query = "UPDATE resolvers SET current_no_of_issues = $current_no_of_issues WHERE resolver_id = $resolver_id";
                                    $result = mysqli_query($connection,$query);
                            }
                                
                                
                            }
                            
                            
                            
                        echo "<script>
                                window.location.href=\"http://localhost/ticket_raising/pages/index-resolver.php\";
                            </script>";
                            
                            
                            
                        }
                        
                        ?>
                        
                        
                    </div>
                    
                    
                    
                  </div>
                  
<!--                </div>
<!--              </div>-->
              <!-- /.col-->
<!--            </div>-->
            <!-- /.row-->
<!--          </div>-->
<!--        </div>-->
      </main>
      
    </div>
    <footer class="app-footer">
      <div>
        <a href="https://coreui.io">CoreUI</a>
        <span>&copy; 2018 creativeLabs.</span>
      </div>
      <div class="ml-auto">
        <span>Powered by</span>
        <a href="https://coreui.io">CoreUI</a>
      </div>
    </footer>
    <!-- CoreUI and necessary plugins-->
    <script src="vendors/jQuery/jquery-3.3.1.min.js"></script>
    <script src="../assets/global/plugins/bootstrap/js/bootstrap.min.js"></script> 
    <script src="vendors/select2/js/select2.full.min.js"></script>
    <script src="../assets/global/scripts/datatable.js"></script>
    <script src="../assets/global/plugins/datatables/datatables.min.js"></script>
    <script src="../assets/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.js"></script>
    
    <script src="../assets/global/plugins/jquery-validation/js/jquery.validate.min.js"></script>
    <script src="../assets/global/plugins/jquery-validation/js/additional-methods.min.js"></script>
    
    
    <script src="node_modules/jquery/dist/jquery.min.js"></script>
    
   
    
    <script src="node_modules/popper.js/dist/umd/popper.min.js"></script>
    <script src="node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="node_modules/pace-progress/pace.min.js"></script>
    <script src="node_modules/perfect-scrollbar/dist/perfect-scrollbar.min.js"></script>
    <script src="node_modules/@coreui/coreui/dist/js/coreui.min.js"></script>
    <!-- Plugins and scripts required by this view-->
    <script src="node_modules/chart.js/dist/Chart.min.js"></script>
    <script src="node_modules/@coreui/coreui-plugin-chartjs-custom-tooltips/dist/js/custom-tooltips.min.js"></script>
    <script src="js/main.js"></script>
    <script src="../assets/pages/scripts/script.js"></script>
<!--    <script src="../assets/pages/scripts/accept-ticket.js"></script>-->
<!--    <script src="../assets/pages/scripts/edit-accept-ticket.js"></script>-->

  </body>
</html>
