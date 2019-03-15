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
        <div class="col-md-6">
          <div class="card mx-4">
        <form action="" method="POST">
            <div class="card-body p-4">
              <h1>Register</h1>
              <p class="text-muted">Create your account</p>
              <div class="input-group mb-3">
                <div class="input-group-prepend">
                  <span class="input-group-text">
                    <i class="icon-user"></i>
                  </span>
                </div>
                <input class="form-control" type="text" name="user_name" placeholder="Username">
              </div>
              <div class="input-group mb-3">
                <div class="input-group-prepend">
                  <span class="input-group-text">@</span>
                </div>
                <input class="form-control" type="text" name="user_email" placeholder="Email">
              </div>
              <div class="input-group mb-3">
                <div class="input-group-prepend">
                  <span class="input-group-text">
                    <i class="icon-lock"></i>
                  </span>
                </div>
                <input class="form-control" type="password" name="user_password" placeholder="Password">
              </div>
              <div class="input-group mb-4">
                <div class="input-group-prepend">
                  <span class="input-group-text">
                    <i class="icon-lock"></i>
                  </span>
                </div>
                <input class="form-control" type="text" name="user_contact" placeholder="Mobile no">
              </div>
              <div class="input-group mb-4">
                <div class="input-group-prepend">
                  <span class="input-group-text">
                    <i class="icon-lock"></i>
                  </span>
                </div>
             <select name="user_type" id="op" class="form-control">
                 <option>select user type</option>
                 <option value="user">User</option>
                 <option value="resolver">Resolver</option>
                 <option value="manager">Manager</option>
             </select>
              </div>
              
              <div class="input-group mb-4 languages" style="display:none;">
                <div class="input-group-prepend">
                  <span class="input-group-text">
                    <i class="icon-lock"></i>
                  </span>
                </div>
             <select name="languages_seleted[]" id="languages_seleted" multiple class="form-control" style="width:100%;">
                 <option value="1">erp</option>
                 <option value="2">ticket raising</option>
                
             </select>
              </div>
              
               <div class="input-group mb-4 company" style="display:none;">
                <div class="input-group-prepend">
                  <span class="input-group-text">
                    <i class="icon-lock"></i>
                  </span>
                </div>
             <select name="company_name" id="company_name" class="form-control" style="width:100%;">
                 <option value="google">google</option>
                 <option value="amazon">amazon</option>
                 <option value="jpmc">jpmc</option>
                 <option value="ivp">ivp</option>
             </select>
              </div>
              
              
              <button class="btn btn-block btn-success" name="create_account" type="submit">Create Account</button>
            </div>
        </form>
            <div class="card-footer p-4">
              <div class="row">
                <div class="col-6">
                  <button class="btn btn-block btn-facebook" type="button">
                    <span>facebook</span>
                  </button>
                </div>
                <div class="col-6">
                  <button class="btn btn-block btn-twitter" type="button">
                    <span>twitter</span>
                  </button>
                </div>
              </div>
            </div>
          </div>
        </div>
        
        <?php
          
          if(isset($_POST["create_account"])){
              
              $user_name = $_POST["user_name"];
              $user_email = $_POST["user_email"];
              $user_password = $_POST["user_password"];
              $user_contact = $_POST["user_contact"];
              $user_type = $_POST["user_type"];
              
              
              
              if(isset($_POST["company_name"])){
                $company_name = $_POST["company_name"];    
              }
//              echo $company_name;
              
              
//              echo $languages;
              
              $cleaned_username = mysqli_real_escape_string($connection, htmlentities($user_name));
              $hashed_password = password_hash($user_password, PASSWORD_DEFAULT);
              
              $query = "INSERT INTO user(user_name,user_email,user_password,user_contact,user_type) VALUES('$cleaned_username','$user_email','$hashed_password','$user_contact','$user_type')";
              $result = mysqli_query($connection,$query);
              
              if($user_type=="user"){
                  $query = "SELECT * FROM user WHERE user_email = '$user_email'";
                  $result = mysqli_query($connection,$query);
                  $row = mysqli_fetch_assoc($result);
                  $user_id = $row["user_id"];
                  $query = "UPDATE user SET company_name = '$company_name' WHERE user_id = $user_id";
                  $result = mysqli_query($connection,$query);
              }
              
              if($user_type == "resolver"){
                  $query = "SELECT * FROM user WHERE user_email = '$user_email'";
                  $result = mysqli_query($connection,$query);
                  $row = mysqli_fetch_assoc($result);
                  $user_id = $row["user_id"];
                  
                  $query = "INSERT INTO resolvers(user_id) VALUES($user_id)";
                  $result = mysqli_query($connection,$query);
                  
                  $query = "SELECT resolver_id FROM resolvers WHERE user_id = $user_id";
                  $result = mysqli_query($connection,$query);
                  $row = mysqli_fetch_assoc($connection,$query);
                  $resolver_id = $row["resolver_id"];
                  
                  if(isset($_POST["languages_seleted"])){
                    $languages_seleted = $_POST["languages_seleted"];   
                  
//                  $languages = "";
                    foreach($languages_seleted as $l_s)
                    {
                  
                        $query = "INSERT INTO software_resolver(software_id,resolver_id) VALUES($l_s,$resolver_id)";
                        $result = mysqli_query($connection,$query);
//                      $languages  = $languages.$l_s.",";
                    }  
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
    
    <script src="../assets/pages/scripts/script.js"></script>
  </body>
</html>
