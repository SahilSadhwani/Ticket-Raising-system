<!DOCTYPE html>
<!--
* CoreUI - Free Bootstrap Admin Template
* @version v2.1.10
* @link https://coreui.io
* Copyright (c) 2018 creativeLabs Łukasz Holeczek
* Licensed under MIT (https://coreui.io/license)
-->
<?php
ob_start();
require_once("../../includes/db.php");
session_start();
if(isset($_SESSION["user_id"])){
    $user_id = $_SESSION["user_id"];
    $type = "user";
}
if(isset($_SESSION["fetch_id_respond"])){
    $ticket_id = $_SESSION["fetch_id_respond"];
//    echo $ticket_id;
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
    
    <link rel="stylesheet" href="../../../assets/global/plugins/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="vendors/select2/css/select2.min.css">
    <link rel="stylesheet" href="../assets/global/plugins/datatables/datatables.min.css">
    <link rel="stylesheet" href="../assets/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.css">
    <!-- Main styles for this application-->
    <link href="../../css/style.css" rel="stylesheet">
    <link href="../../vendors/pace-progress/css/pace.min.css" rel="stylesheet">
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
    include_once("../../includes/header.php");  
    ?>
    
    
    <div class="app-body">
      <div class="sidebar">
        
        <?php
          include_once("../../includes/sidebar.php");
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
                           
                           
                           <div class="row">
                                           <div class="col-md-12">
                                              
                                              <form method="POST">
                                              
                                              
                                                       
<!--
                                                       <div>
                                                       <div class="form-group">
                                                          
                                                           <label class="control-label col-md-12" style="font-size:20px;" for="ques1">How satisfied are you with product/service?</label>
                                                        
                                                           <div class="col-md-12">
                                                              <br>
                                                           
                                                               <input type="radio" name="ques1" id="ques1" class="ques1" value="very_satisfied" checked><label style="font-weight:500; margin-left:5px;"> Very Satisfied</label><br>
                                                               <input type="radio" name="ques1" id="ques1" class="ques1" value="satisfied"> Satisfied<br>
                                                               <input type="radio" name="ques1" id="ques1" class="ques1" value="neutral"><label style="font-weight:500; margin-left:5px;"> Neutral</label><br>
                                                               <input type="radio" name="ques1" id="ques1" class="ques1" value="unsatisfied"><label style="font-weight:500; margin-left:5px;"> Unatisfied</label><br>
                                                               <input type="radio" name="ques1"  id="ques1" class="ques1" value="Very Unsatisfied"><label style="font-weight:500; margin-left:5px;"> Very Unsatisfied</label><br>
                                                               <br>
                                                               <br>
                                                           </div>
                                                       </div>
                                                       
                                                       
                                                       
                                                       <div class="form-group">
                                                           <label class="control-label col-md-12" style="font-size:20px;">Compared to similar products offered by other companies, how do you consider our product?</label>
                                                        
                                                           <div class="col-md-12">
                                                              <br>
                                                           
                                                               <input type="radio" name="ques2" value="very_satisfied"><label style="font-weight:500; margin-left:5px;"> Very Satisfied</label><br>
                                                               <input type="radio" name="ques2" value="satisfied"><label style="font-weight:500; margin-left:5px;"> Satisfied</label><br>
                                                               <input type="radio" name="ques2" value="neutral"><label style="font-weight:500; margin-left:5px;"> Neutral</label><br>
                                                               <input type="radio" name="ques2" value="unsatisfied"><label style="font-weight:500; margin-left:5px;"> Unatisfied</label><br>
                                                               <input type="radio" name="ques2" value="Very Unsatisfied"><label style="font-weight:500; margin-left:5px;"> Very Unsatisfied</label><br>
                                                               <br>
                                                           </div>
                                                           
                                                       </div>
                                                       
                                                       
                                                       <div class="form-group">
                                                          
                                                           <label class="control-label col-md-12" style="font-size:20px;">Would you use our product / service in the future?</label>
                                                        
                                                           <div class="col-md-12">
                                                              <br>
                                                           
                                                               <input type="radio" name="ques3" value="very_satisfied"><label style="font-weight:500; margin-left:5px;"> Very Satisfied</label><br>
                                                               <input type="radio" name="ques3" value="satisfied"><label style="font-weight:500; margin-left:5px;"> Satisfied</label><br>
                                                               <input type="radio" name="ques3" value="neutral"><label style="font-weight:500; margin-left:5px;"> Neutral</label><br>
                                                               <input type="radio" name="ques3" value="unsatisfied"><label style="font-weight:500; margin-left:5px;"> Unatisfied</label><br>
                                                               <input type="radio" name="ques3" value="Very Unsatisfied"><label style="font-weight:500; margin-left:5px;"> Very Unsatisfied</label><br>
                                                           </div>
                                                       </div>
                                                  </div>
-->
                                                       
                                                       
                                                       <div class="ratings-form" style="display:block;">
                                                        
                                                        
                                                        <label class="control-label col-md-12" style="font-size:22px;" for="">We would like to have your Feedback</label>
                                                        <br>
                                                        <div class="col-md-12">
                                                           <br>
                                                            1 - Very Satisfied
                                                            <br>
                                                            2 - Satisfied
                                                            <br>
                                                            3 - Neutral
                                                            <br>
                                                            4 - Unsatisfied
                                                            <br>
                                                            5 - Very Unsatisfied
                                                            <br><br>
                                                        </div>
                                                         
                                                         <div class="form-group">
                                                            <label class="control-label col-md-12" style="font-size:20px;" for="ques1">How satisfied are you with product/service?</label>
                                                            <div class="col-md-12">
                                                                <input type="number" min="1" max="5" name="ques1">
                                                            </div>
                                                         </div>
                                                              
                                                        <div class="form-group">
                                                            <label class="control-label col-md-12" style="font-size:20px;" for="ques1">Compared to similar products offered by other companies, how do you consider our product?</label>
                                                            <div class="col-md-12">
                                                                <input type="number" min="1" max="5" name="ques2">
                                                            </div>
                                                         </div>
                                                              
                                                        <div class="form-group">
                                                            <label class="control-label col-md-12" style="font-size:20px;" for="ques1">Would you use our product / service in the future?</label>
                                                            <div class="col-md-12">
                                                                <input type="number" min="1" max="5" name="ques3"><br>
                                                              <br>  <br>
                                                              <br>  
                                                            </div>
                                                         </div>
                                                                        
                                                               
                                                       </div>
                                                       
                                                       <div class="form-group">
                                                           <label class="control-label col-md-3" style="font-size:20px;">Any reply or message
                                                            </label>
                                                            <div class="control-label col-md-8">
                                                                <textarea name="reply_by_user" id="reply_by_user" cols="60" rows="5" placeholder="Enter here..." style="padding:2px;"></textarea>
                                                            </div>
                                                            <br>
                                                       </div>
                                                       
                                                       <div class="form-group">
                                                          
                                                           <label class="control-label col-md-3" style="font-size:20px;">Is your issue solved?
                                                            
                                                            </label>
                                                            <div class="<col-md-8></col-md-8>">
                                                            <button type="submit" class="btn btn-success" style="width:200px; height:40px; font-size:18px; margin-top:40px; margin-bottom:50px; margin-left: 100px;" name="issue_solved" >Yes</button>
                                                            <button type="submit" class="btn btn-danger" style="width:200px; height:40px; font-size:18px; margin-top:40px; margin-bottom:50px; margin-left: 100px;" name="issue_unsolved">No</button>
                                                            <br>
                                                            </div>
                                                            
                                                        
                                                       </div>
                                                       
                                                       
                                                    </form>
                                                    
                                           </div>
                                       </div>
                                       
                                       <?php
                            if(isset($_POST["issue_solved"])){
                                
//                                echo "yes";
                               
                                
                                if(isset($_POST["ques1"])){
                                    $ques1 = $_POST["ques1"];
                                    
                                }
                                if(isset($_POST["ques2"])){
                                    $ques2 = $_POST["ques2"];
                                    
                                }
                                if(isset($_POST["ques3"])){
                                    $ques3 = $_POST["ques3"];
                                    
                                }
                                
                                if(isset($_POST["reply_by_user"])){
                                    $reply_by_user = $_POST["reply_by_user"];
                                }
                                
                                $query = "UPDATE ticket_assigned SET issue_status_by_user = 1 WHERE ticket_id = $ticket_id AND issue_status = 1";
                                $result = mysqli_query($connection,$query);
                                
//                                $query = "UPDATE ticket_assigned SET ques1 = $ques1 WHERE ticket_id = $ticket_id AND issue_status = 1 WHERE resolver_id = $resolver_id";
//                                $result = mysqli_query($connection,$result);
//                                
//                                $query = "UPDATE ticket_assigned SET ques2 = $ques2 WHERE ticket_id = $ticket_id AND issue_status = 1 WHERE resolver_id = $resolver_id";
//                                $result = mysqli_query($connection,$result);
//                                
//                                $query = "UPDATE ticket_assigned SET ques3 = $ques3 WHERE ticket_id = $ticket_id AND issue_status = 1 WHERE resolver_id = $resolver_id";
//                                $result = mysqli_query($connection,$result);
                                
                                $query = "UPDATE ticket SET reply_by_user = '$reply_by_user' WHERE ticket_id = $ticket_id";
                                $result = mysqli_query($connection,$query);
                                
                                date_default_timezone_set('Asia/Kolkata');
                                $date = date("Y-m-d");
                                $time = date("H:i:s");
                                
//                                $query = "UPDATE issues_solved SET time_to_solve = '$time' WHERE resolver_id = $resolver_id AND ticket_id = $ticket_id";
//                                $result = mysqli_query($connection,$query);
//                                
//                                $query = "UPDATE issues_solved SET date_of_solving = '$date' WHERE resolver_id = $resolver_id AND ticket_id = $ticket_id";
//                                $result = mysqli_query($connection,$query);
                                
                                
                                header("Location: http://localhost/ticket_raising/pages/index-resolver.php");
                                

                            }
                            else if(isset($_POST["issue_unsolved"])){
                                $query = "SELECT resolver_id FROM ticket_assigned WHERE issue_status = 1 AND ticket_id = $ticket_id AND issue_status_by_user = 2";
//                                echo $query;
                                $result = mysqli_query($connection,$query);
                                $row = mysqli_fetch_assoc($result);
                                $resolver_id = $row["resolver_id"];
//                                echo $resolver_id;
                                
                                $query = "UPDATE ticket_assigned SET issue_status = 2 WHERE ticket_id = $ticket_id AND issue_status_by_user = 2";
                                $result = mysqli_query($connection,$query);
                                
                                $query = "UPDATE ticket_assigned SET issue_status_by_user = 0 WHERE ticket_id = $ticket_id AND issue_status = 2";
                                $result = mysqli_query($connection,$query);
                                
                                $query = "UPDATE issues_solved SET time_to_solve = '00:00:00' WHERE ticket_id = $ticket_id AND resolver_id = $resolver_id";
                                $result = mysqli_query($connection,$query);
                                
                                $query = "UPDATE issues_solved SET date_of_solving = '0000-00-00' WHERE ticket_id = $ticket_id AND resolver_id = $resolver_id";
                                $result = mysqli_query($connection,$query);
                                
                                
                                header("Location: http://localhost/ticket_raising/pages/index-resolver.php");
                                
                                
                            }
                            echo "<a href=\"http://localhost/ticket_raising/pages/index-respond-at-user.php\" style=\"width:200px; height:40px; font-size:18px; color:#fff; background:#e73d4a; padding:5px; text-decoration:none; \">Back</a>";
                            ?>
                           
                           
                           
                        </div>
                        
                        <script>
                            
                        </script>
                        
                        
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
    <script src="../../../assets/global/plugins/jquery.min.js"></script>
    <script src="../../../assets/global/plugins/bootstrap/js/bootstrap.min.js"></script> 
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
    <script src="../../../assets/pages/scripts/script.js"></script>
<!--    <script src="../assets/pages/scripts/accept-ticket.js"></script>-->
<!--    <script src="../assets/pages/scripts/edit-accept-ticket.js"></script>-->

  </body>
</html>
