<!DOCTYPE html>
<!--
* CoreUI - Free Bootstrap Admin Template
* @version v2.1.10
* @link https://coreui.io
* Copyright (c) 2018 creativeLabs Łukasz Holeczek
* Licensed under MIT (https://coreui.io/license)
-->
<?php
include_once("includes/db.php");
session_start();
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
  <body class="app flex-row align-items-center">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-md-8">
          <div class="card-group">
            <div class="card p-4">
            
             <form action="" method="POST">
             
              <div class="card-body">
                <h1>Login</h1>
                <p class="text-muted">Sign In to your account</p>
                
                <div class="input-group mb-3">
                  <div class="input-group-prepend">
                    <span class="input-group-text">
                      <i class="icon-user"></i>
                    </span>
                  </div>
                  <input class="form-control" type="text" name="user_email" placeholder="Email ID">
                </div>
                <div class="input-group mb-4">
                  <div class="input-group-prepend">
                    <span class="input-group-text">
                      <i class="icon-lock"></i>
                    </span>
                  </div>
                  <input class="form-control" type="password" name="user_password" placeholder="Password">
                </div>
                <div class="row">
                  <div class="col-6">
                    <button class="btn btn-primary px-4" name="login_button" type="submit">Login</button>
                  </div>
                  <div class="col-6 text-right">
                    <button class="btn btn-link px-0" type="button">Forgot password?</button>
                  </div>
                </div>
              </div>
              </form>
            </div>
            <div class="card text-white bg-primary py-5 d-md-down-none" style="width:44%">
              <div class="card-body text-center">
                <div>
                  <h2>Sign up</h2>
                  <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                    <a href="register.php"><button class="btn btn-primary active mt-3" type="button" href="tp.php">Register Now!</button></a>
                </div>
              </div>
            </div>
          </div>
        </div>
        
        <?php
          
//          $a = 'How arees you?';

//if (\strpos($a, 'are') !== false) 
//    echo 'true';
//          if (preg_match('/\bare\b/',$a))
//    echo 'true';
//    
//    else
//        echo "false";
          
          if(isset($_POST["login_button"])){
              $user_email = $_POST["user_email"];
              $user_password = $_POST["user_password"];
              
              $query = "SELECT * FROM user WHERE user_email = '$user_email'";
              $result = mysqli_query($connection,$query);
              $row = mysqli_fetch_assoc($result);
              $num = mysqli_num_rows($result);
              if($num<=0){
                  ?>
                  <script src="../assets/global/plugins/jquery.min.js"></script>
                  <script>
                      $(function(){
                         alert("email or password does not exist"); 
                      });
                    </script>
                <?php
              }
              else if($num == 1){
                  $db_user_id = $row["user_id"];
                  $db_user_email = $row["user_email"];
                  $db_user_password = $row["user_password"];
                  
                  $test = password_verify($user_password, $db_user_password);
                  if($test){
                      $user_type = $row["user_type"];
                      if($user_type=="user"){
                          $_SESSION["user_id"] = $db_user_id;
                          header("Location: index.php");
                          
                      }else if($user_type == "resolver"){
                          $query = "SELECT resolver_id FROM resolvers WHERE user_id = $db_user_id";
                          $result = mysqli_query($connection,$query);
                          $row = mysqli_fetch_assoc($result);
                          $resolver_id = $row["resolver_id"];
                          $_SESSION["resolver_id"] = $resolver_id;
//                          $_SESSION["user_id"] = $db_user_id;
//                          echo $_SESSION["resolver_id"];
//                          echo $_SESSION["user_id"];
                          
                          date_default_timezone_set('Asia/Kolkata');
                          $date = date("Y-m-d");
                          $time = date("H:i:s");
                          
                          $datetime = $date." ".$time;
                          
                          if($time>"10:00:00" & $time<"18:00:00"){
                          $query = "INSERT INTO resolver_working_period(resolver_id,day,login_timestamp) VALUES($resolver_id,'$datetime','$time')";
                          $result = mysqli_query($connection,$query);
                          }
                          
                          $_SESSION["session_time"] = $datetime;
                          
                          $date = date("d");
//                          echo $date;
                          if($date == "04"){
                            $_SESSION["month_flag"] = 1;
                          }else{
                            $_SESSION["month_flag"] = 0;  
                          }
                          header("Location: index-resolver.php");
                      }
                  }
                  else{
                      ?>
                      <script src="../assets/global/plugins/jquery.min.js"></script>
                       <script>$(function(){
                            alert("invalid password");   
                           });
                    </script>
                        <?php
                  }
                  
              }
              
          }
          
          ?>
        
      </div>
    </div>
    <!-- CoreUI and necessary plugins-->
    <script src="../assets/global/plugins/jquery.min.js"></script>
    
    <script src="node_modules/jquery/dist/jquery.min.js"></script>
    <script src="node_modules/popper.js/dist/umd/popper.min.js"></script>
    <script src="node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="node_modules/pace-progress/pace.min.js"></script>
    <script src="node_modules/perfect-scrollbar/dist/perfect-scrollbar.min.js"></script>
    <script src="node_modules/@coreui/coreui/dist/js/coreui.min.js"></script>
  </body>
</html>
