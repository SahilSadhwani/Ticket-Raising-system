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
        
<!--              </div>-->
              <!-- /.col-->
<!--            </div>-->
            <!-- /.row-->
<!--          </div>-->
<!--        </div>-->
     
     
         <div class="container-fluid">
             
             <div class="view-ticket" style="display:block;">
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
                                   
                                    <table class="table table-striped table-hover table-bordered" style="width:100%;" id="respond_ticket_at_user">
                                        <thead>
                                            <tr>
                                                <th> Ticket id </th>
                                                <th> Ticket Subject</th>
                                                <th> Software</th>
                                                <th> Date of issue </th>
                                                <th> Status </th>
                                                <th> Date of solved</th>
                                                <th> </th>
                                            </tr>
                                        </thead>

                                    </table>
                                </div>
                            </div>
                                      
                                      
                                      
                                      
                                      
                                      <!--EDIT BUTTON MODAL-->
                            <div class="modal fade" tabindex="-1" role="dialog" id="editModal">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                            <h4 class="modal-title">Edit Product!</h4>
                                        </div>

                                        <div class="modal-body">

                                            <div class="row">
                                                <form action="http://localhost/ticket_raising/pages/scripts/user/edit-respond.php" method="POST" class="edit-save-form">
                                                    <div class="form-body">
                                                      
                                                      <div class="alert alert-danger display-hide">
                                                        <button class="close" data-close="alert"></button>
                                                            <span>Enter proper product name,eoq, rate of sale,additional specification,supplier name, category name</span>
                                                        </div>
                                                      
<!--                                                       <div class="form-group clearfix">-->

<!--
                                                            <div class="col-md-9">
                                                                <input type="hidden" id="edit_product_id" name="product_id" class="form-control" placeholder="Product ID" /> </div>
-->
<!--                                                        </div>-->
                                                        <div class="form-group clearfix">
                                                            <label class="control-label col-md-3">Ticket ID
                                                                <span class="required"> * </span>
                                                                </label>
                                                            <div class="col-md-9">
                                                                <input type="text" id="ticket_id" name="ticket_id" class="form-control" placeholder="Ticket ID" /> </div>
                                                        </div>
                                                        <div class="form-group clearfix">
                                                            <label class="control-label col-md-3">Ticket Subject
                                                                <span class="required"> * </span>
                                                                </label>
                                                            <div class="col-md-9">
                                                                <input type="text" id="ticket_subject" name="ticket_subject" class="form-control" placeholder="Ticket Subject" /> </div>
                                                        </div>

                                                        <div class="form-group clearfix">
                                                            <label class="control-label col-md-3">Ticket Message
                                                                <span class="required"> * </span>
                                                                </label>
                                                            <div class="col-md-9">
<!--                                                                <input type="text" id="rate_of_sale" name="rate_of_sale" class="form-control" placeholder="Sale Rate" /> -->
                                                                <textarea name="ticket_message" id="ticket_message" cols="10" rows="15" placeholder="Ticket Message"></textarea>
                                                                </div>
                                                        </div>
                                                        
                                                        <div class="form-group clearfix">
                                                            <label class="control-label col-md-3">Software
                                                                <span class="required"> * </span>
                                                                </label>
                                                            <div class="col-md-9">
                                                                <input type="text" id="software_name" name="software_name" class="form-control" placeholder="Software" /> </div>
                                                        </div>
                                                        
                                                        <div class="form-group clearfix">
                                                            <label class="control-label col-md-3">Date of issue
                                                                <span class="required"> * </span>
                                                                </label>
                                                            <div class="col-md-9">
                                                                <input type="text" id="date_of_ticket_issue" name="date_of_ticket_issue" class="form-control"/> </div>
                                                        </div>
                                                        
                                                        <div class="form-group clearfix">
                                                            <label class="control-label col-md-3">Issue Status
                                                                <span class="required"> * </span>
                                                                </label>
                                                            <div class="col-md-9">
                                                                <input type="text" id="issue_status" name="issue_status" class="form-control" /> </div>
                                                        </div>
                                                        
                                                        <div class="form-group clearfix">
                                                            <label class="control-label col-md-3">Date of solved
                                                                <span class="required"> * </span>
                                                                </label>
                                                            <div class="col-md-9">
                                                                <input type="text" id="date_of_solved" name="date_of_solved" class="form-control" /> </div>
                                                        </div>
                                                        
                                                        
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                                                            <button type="submit "id="edit_save" type="button" class="btn btn-primary" name="edit_product">Mark as satisfied</button>
                                                        </div>
<!---->
                                                    </div>
                                                </form>
                                            </div>


                                        </div>

                                    </div>

                                    <!-- /.modal-content -->
                                </div>
                                <!-- /.modal-dialog -->
                            </div>
                            <!--END OF EDIT BUTTON MODAL-->

                                      
                                      
                                      
                                      
                                      
                                      
                                      
                                      
                                      
                                      
                                       </div>
                                   </div>
                               </div>
             
         </div>
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
    <script src="../assets/global/plugins/datatables/datatables.min.js"></script>
    <script src="../assets/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.js"></script>
    
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
    <script src="../assets/pages/scripts/manage-ticket-respond-at-user.js"></script>

  </body>
</html>
