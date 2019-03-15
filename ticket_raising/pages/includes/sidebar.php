<?php
if($type=="user"){
if(isset($_SESSION["user_id"])){
    $user_id = $_SESSION["user_id"];
//    echo $user_id;
    $query = "SELECT * FROM user WHERE user_id = $user_id";
//        echo $query;
        $result = mysqli_query($connection,$query);
        $row = mysqli_fetch_assoc($result);
        $user_name = $row["user_name"];
        $user_email = $row["user_email"];
        $user_contact = $row["user_contact"];
}
}
if($type == "resolver"){
if(isset($_SESSION["resolver_id"])){
    $resolver_id = $_SESSION["resolver_id"];
//    echo $resolver_id;
     $query = "SELECT u.user_id,u.user_name, u.user_email, u.user_contact,r.resolver_id FROM user u, resolvers r WHERE r.resolver_id = $resolver_id and u.user_id = r.user_id";
//        echo $query;
        $result = mysqli_query($connection,$query);
        $row = mysqli_fetch_assoc($result);
        $user_name = $row["user_name"];
        $user_email = $row["user_email"];
        $user_contact = $row["user_contact"];
}
}


        
        

?>
  
   <nav class="sidebar-nav">
    <div class="details-retrieve" style="display:block;">
          <ul class="nav">
           
           <li class="divider"></li>
           <br>
           <li class="divider"></li>
            <li class="nav-title">Name :  <?php echo $user_name ?></li>
            
            <li class="divider"></li>
            <li class="nav-title">email : <?php echo $user_email ?></li>
            
            <li class="divider"></li>
           <li class="nav-title">Contact :  <?php echo $user_contact ?></li>
            
            <li class="divider"></li>
           
            
            <a class="edit-details" style="cursor:pointer; margin-left:10px; background:#fff; color:#222; width:50px; margin-top:15px;">Edit</a>
          </ul>
    </div>
        
        
        
        <form method="POST">
        <div class="details-save" style="display:none;">
          <ul class="nav">
           
           <li class="divider"></li>
           <br>
           <li class="divider"></li>
            <li class="nav-title">
                Name : <input type="text" name="user_name" value="<?php echo $user_name ?>" style="color:#222;">
            </li>
            
            <li class="nav-title">
                email : <input type="email" name="user_email" value="<?php echo $user_email ?>" style="color:#222;">
            </li>
            
            <li class="nav-title">
                Contact : <input type="text" name="user_contact" value="<?php echo $user_contact ?>" style="color:#222;">
            </li>
            
            <li class="divider"></li>
           
            
            <a class="save-details" style="cursor:pointer; margin-left:10px; background:#fff; color:#222; width:50px; margin-top:15px;"><button type="submit" name="save-details">Save</button></a>
          </ul>
    </div> 
         </form> 
          
          <?php
            
            if(isset($_POST["save-details"])){
                $user_name = $_POST["user_name"];
                $user_email = $_POST["user_email"];
                $user_contact = $_POST["user_contact"];
                
                $query = "UPDATE user SET user_name = '$user_name' WHERE user_id = $user_id";
                $result = mysqli_query($connection,$query);
                
                
                $query = "UPDATE user SET user_email = '$user_email' WHERE user_id = $user_id";
                $result = mysqli_query($connection,$query);
                
                $query = "UPDATE user SET user_contact = '$user_contact' WHERE user_id = $user_id";
                $result = mysqli_query($connection,$query);
                
            }
//                echo $user_id;
    
          ?>
        
          
        </nav>
        <button class="sidebar-minimizer brand-minimizer" type="button"></button>