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
if(isset($_SESSION["user_id"])){
    $user_id = $_SESSION["user_id"];
    $type = "user";
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
    
    <link rel="stylesheet" href="vendors/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="vendors/select2/css/select2.min.css">
    <link rel="stylesheet" href="vendors/datatables/datatables.min.css">
    <link rel="stylesheet" href="vendors/datatables/plugins/bootstrap/datatables.bootstrap.css">
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
              <div class="col-sm-6 col-lg-4">
                <div class="card text-white bg-primary color-blue" style="cursor:pointer;">
                  <div><h3 style="text-align:center; padding-top:20px;">Submit a ticket</h3></div>
                  <div class="chart-wrapper mt-3 mx-3" style="height:0px;">
                    <canvas class="chart" id="card-chart1" height="50"></canvas>
                  </div>
                </div>
              </div>
              
              <!-- /.col-->
              <div class="col-sm-6 col-lg-4">
                <div class="card text-white bg-warning color-yellow" style="cursor:pointer;">
                  <div><h3 style="text-align:center; padding-top:20px;">View tickets</h3></div>
                  <div class="chart-wrapper mt-3" style="height:0px;">
                    <canvas class="chart" id="card-chart3" height="70"></canvas>
                  </div>
                </div>
              </div>
              <!-- /.col-->
              <div class="col-sm-6 col-lg-4">
                <div class="card text-white bg-danger color-red" style="cursor:pointer;">
                  <div><h3 style="text-align:center; padding-top:20px;">Respond to issues</h3></div>
                  <div class="chart-wrapper mt-3 mx-3" style="height:0px;">
                    <canvas class="chart" id="card-chart4" height="70"></canvas>
                  </div>
                </div>
              </div>
              <!-- /.col-->
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
                    <hr>
                    
                    
                    <div class="tabs-on-user-page">
                        <div class="container-fluid">
                           <div class="white-box-on-user-page" style="width:100%; background-color:#fff; height:100%;">
                               <div class="submit-ticket" style="display:none;">
<!--                                   <p>submit a ticket</p>-->
                                   <div class="container-fluid">
                                       <div class="row">
                                           <div class="col-md-12">
                                              
                                              <div class="common-bug-link">
                                                  <p>Before submitting a issue, have a look at the common bugs and solutions given of all softwares <a  id="find-out-common-bug">Find out</a></p>
                                                  <div class="common-bug-software-name" id="common-bug-software-name"></div>
                                              </div>
                                              
                                               <form action="scripts/user/add-ticket.php" method="POST" enctype="multipart/form-data">
                                                   <div class="form-body">
                                                      
                                                       <div class="form-group">
                                                           <label class="control-label col-md-4" style="font-size:20px; margin-bottom:20px; margin-top:20px;">Ticket Subject
                                                            <span class="required"> * </span>
                                                            </label>
                                                            <div class="col-md-5">
                                                            <input type="text" name="ticket_subject" class="form-control" placeholder="Enter a Subject" style="height:50px; font-size:20px; margin-bottom:20px; margin-top:20px;"/> </div>
                                                       </div>
                                                       
                                                        <div class="form-group">
                                                           <label class="control-label col-md-4" style="font-size:20px; margin-bottom:20px;">Issue
                                                            <span class="required"> * </span>
                                                            </label>
                                                            <div class="col-md-5">
                                                                <textarea type="text" name="ticket_message" class="form-control" placeholder="Enter the issue" style="height:50px; font-size:20px; margin-bottom:20px;" rows="15" cols="10"></textarea> </div>
                                                       </div>
                                                       
                                                       <div class="form-group">
                                                           <label class="control-label col-md-4" style="font-size:20px; margin-bottom:20px;">Photos of issues
                                                            <span class="required"> * </span>
                                                            </label>
                                                            <div class="col-md-5">
                                                            <input type="file" multiple accept="image/*" name="files[]" class="form-control"  style="height:50px; font-size:20px; margin-bottom:20px;"/> </div>
                                                       </div>
                                                       
                                                       <div class="form-group">
                                                           <label class="control-label col-md-4" style="font-size:20px; margin-bottom:20px;">Specification
                                                            <span class="required"> * </span>
                                                            </label>
                                                            <div class="col-md-5">
<!--                                                            <input type="text" name="user_name" class="form-control" placeholder="Name" style="height:50px; font-size:20px; margin-bottom:20px;"/> </div>-->
                                                      <select name="ticket_specification" id="ticket_specification" class="form-control" style="height:50px; font-size:20px; margin-bottom:20px;">
                                                          <option value="non_critical">Non critical</option>
                                                          <option value="critical">critical</option>
                                                      </select>
                                                       </div>
                                                       </div>
                                                       
                                                       <div class="form-group">
                                                           <label class="control-label col-md-4" style="font-size:20px; margin-bottom:20px;">Software Name
                                                            <span class="required"> * </span>
                                                            </label>
                                                            <div class="col-md-5">
<!--                                                            <input type="text" name="user_name" class="form-control" placeholder="Name" style="height:50px; font-size:20px; margin-bottom:20px;"/> </div>-->
                                                      <select name="software_name" id="software_name" class="form-control" style="height:50px; font-size:20px; margin-bottom:20px;">
                                                          <option value="erp">erp</option>
                                                          <option value="ticket_raising">ticket <raising></raising></option>
                                                      </select>
                                                       </div>
                                                           </div>
                                                       
                                                                                                           
                                                       <div class="col-md-offset-3 col-md-9">
                                                <button type="submit" class="btn btn-success" style="width:100px; height:40px; font-size:18px; margin-top:40px; margin-bottom:50px; margin-left: 150px;" name="add_ticket">Save</button>
                                            </div>
                                                   </div>
                                               </form>
                                           </div>
                                       </div>
                                   </div>
                               </div>
                               
                               <div class="view-ticket" style="display:none;">
                                  <div style="height:30px; width:100%;">
                                      
                                  </div> 
                                   <div class="row container-fluid">
                                       <div class="col-md-12">
                                               <div class="portlet light portlet-fit bordered">
                                <div class="portlet-title">
                                    <div class="caption">
                                        <i class="icon-settings font-red"></i>
                                        <span class="caption-subject font-red sbold uppercase"></span>
                                    </div>
                                </div>
                                <div class="portlet-body">
                        
                                       
<!--
                                    <div class="table-toolbar">
                                        <div class="row">
                                            <div class="col-md-6 pull-right">
                                                <div class="btn-group pull-right">
                                                    <button class="btn green btn-outline dropdown-toggle" data-toggle="dropdown">Tools
                                                        <i class="fa fa-angle-down"></i>
                                                    </button>
                                                    <ul class="dropdown-menu pull-right">
                                                        <li>
                                                            <a href="javascript:;"> Print </a>
                                                        </li>
                                                        <li>
                                                            <a href="javascript:;"> Save as PDF </a>
                                                        </li>
                                                        <li>
                                                            <a href="javascript:;"> Export to Excel </a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
-->
                                   
                                    <table class="table table-striped table-hover table-bordered" style="width:100%;" id="view_ticket_at_user">
                                        <thead>
                                            <tr>
                                                <th> Ticket id </th>
                                                <th> Ticket Subject</th>
                                                <th> Software</th>
                                                <th> Priority</th>
                                                <th> Date of issue </th>
                                                <th> Status </th>
                                                
                                            </tr>
                                        </thead>

                                    </table>
                                </div>
                            </div>
                                       </div>
                                   </div>
                               </div>
                               
                               <div class="respond-to-issues" style="display:none;">
<!--                                   <p>respond to ticket</p>-->
                                   <?php
                                   
                                   ?>
                                   
                               
                               </div>
                               
<!--
                               <br>
                               <br>
                               <br>
                               <br>
                               <br>
                               <br>
-->
                               
                               
                               
                           </div>
                        </div>
                    </div>
                    
                    
                    
                  </div>
                  
<!--                </div>-->
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
     <script src="vendors/bootstrap/js/bootstrap.min.js"></script>
    <script src="vendors/select2/js/select2.full.min.js"></script>
    <script src="vendors/datatables/datatables.min.js"></script>
    <script src="vendors/datatables/plugins/bootstrap/datatables.bootstrap.js"></script>
    
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
    <script src="../assets/pages/scripts/manage-ticket-at-user.js"></script>

  </body>
</html>
