<?php 
session_start();
if(isset($_POST['login']))
{
    //for checking we are come to this page from clicking the signup button on the signup page..
    
    require 'db/dbhandler.php'; 
    
    // now we have access to the con which is inside the database handller file
    
    extract($_POST);
    

    $sql = "SELECT * FROM users WHERE username='$uname' and userpwd='$pwd'";
    $result = mysqli_query($conn,$sql);
    $rows = mysqli_num_rows($result);
    
    if($rows){
        
        $sql = "SELECT userid FROM users WHERE username='$uname' and userpwd='$pwd'";
        $result = mysqli_query($conn,$sql);
        $rows2 = mysqli_fetch_array($result);
        
        $_SESSION['uid'] = $rows2[0];
        $_SESSION['uname'] = $uname;
        header('location: profile.php?uname1='.$uname.' ');
    }else{
        echo '<script>alert("Invalid Credential")</script>';
    }
}


?>






<!DOCTYPE html>

<html>
<head>
 <title>Login</title>
    <meta charset="utf-8">

    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <link rel="stylesheet" href="css/style.css">

   
    <!---------additional bootstrap and javascript files------>
    <?php include 'additionallinks.php';
    ?>
    <!----------------***************------------->
     

</head>
<body class="loginbody">
    
    <!----------Navigation------------->
     <?php
    include 'navbar.php'
        ?>
    <!----------Navigation------------->
    
    
    
    <div class="modaldialog textf-center">
        <div class="col-sm-6 col-md-5 loginmain">
            <div class="modalcontent">
                <div class="col-12 userimg text-center">
                    <img src="images/user.png">
                </div>
                
                <form action="login.php" method="POST" onsubmit="return validation()" class="">
            <center>         
       <div class="form-group">
           
      <label class="px-2">Username:</label>
      <input type="text" name="uname" id="username" class="form-control col-8  " >
      <span id="usererror" class=" errorclass"></span>
               
     </div>
        
      <div class="form-group">
          
      <label class="px-2">Password:</label>
      <input type="password" name="pwd" id="password" class="form-control col-8 ">
      <span id="passworderror" class="errorclass"></span>
              
     </div>
                    <input type="submit" name="login" class="btn btn-success">
             
                    
                   </center>
        
        <!--  <button type="submit" class="btn btn-success loginbtn" name="login"><i class="fas fa-sign-in-alt "></i> Login</button> 
        -->        
                
                
                
                </form>
                
              <!-- <div class="forgot text-center">
                <a href="#">Forgot Password..?</a>
                
                </div>
                -->
                
                <div class="text-center mt-4"><p class="text-center logininregister">Don't have an account? <a href=registration.php> Sign Up</a></p>
                    </div>
            
            
            
            </div>
        
        
        </div>
    
    
    </div>
                        
    




   
      
    

   

    
              <!---------------- Footer Section ------------->
  <?php
        include 'footer.php';
    ?>
 



    <script src="javascript/loginvalidation.js"></script>
</body>
</html>