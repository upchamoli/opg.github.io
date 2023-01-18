<?php 
if(isset($_POST['submit']))
{
    //for checking we are come to this page from clicking the signup button on the signup page..
    
    require 'db/dbhandler.php'; 
    
    // now we have access to the con which is inside the database handller file
    
    extract($_POST); //it extracts the variable so we dont have to make local variables..
    
    // to check the availability of username
    $result = mysqli_query($conn, "SELECT username FROM users WHERE username = '$uname'");
    $rows = mysqli_num_rows($result);
    
    if($rows){
        echo '<script>alert("username not available!")</script>';
    }else{
        
        // to check the availability of username
        $result = mysqli_query($conn, "SELECT useremail FROM users WHERE useremail = '$email'");
        $rows = mysqli_num_rows($result);
        
        if($rows){
            echo '<script>alert("This email is already registered!")</script>';
        }else{
            
                
                $tmpname = $_FILES['userpic']['tmp_name'];
                if(!empty($tmpname)){
                    $pic = addslashes(file_get_contents($tmpname));
                }else{
                    $pic = addslashes(file_get_contents("C:/xampp/htdocs/JSR/images/photographer.jpg"));
                }
                
                        
            $sql = " INSERT INTO users VALUES (null, '$fname $lname', '$uname', '$email', '$pwd', '$pic' )";
        
            if(!mysqli_query($conn,$sql)){
                echo '<script>alert("'.mysqli_error($conn).'")</script>';
            }else{
                mysqli_query($conn, " CREATE TABLE `loginsystem`.`$uname` (`sn` int(255) NOT NULL AUTO_INCREMENT, `caption` varchar(100) NULL, `type` varchar(20) NOT NULL, `photo` LONGBLOB NOT NULL, `timestamp` DATETIME NOT NULL, PRIMARY KEY(sn)) ");
                echo '<script>alert("Registration Sucessfull...")</script>';
    
                //creating a new tabel for every new user who is registered, for storing his photos 
    
            }   
        }
    }   
}


?>


<!DOCTYPE html>

<html>

<head>
    <title>Registration</title>
    <meta charset="utf-8">

    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <link rel="stylesheet" href="css/style.css">


    <!---------additional bootstrap and javascript files------>
    <?php include 'additionallinks.php';
    ?>
    <!----------------***************------------->

</head>

<body class="registrationbody">

    <!----------Navigation------------->
    <?php
    include 'navbar.php'
        ?>




    <div class="center-block text-center  registrationtextdiv mx-6 py-4">
        <h5 class="display-4">Register Yourself</h5>

    </div>
    <div class="registrationdialog text-centefr">
        <div class="col-sm-8 registrationmain">
            <div class="registrationcontent">

                <form action="registration.php" method="POST" onsubmit="return validation()" class="col-12" enctype="multipart/form-data">
                    <div class="row">

                        <div class="form-group col-md-6">
                            <label>First Name:</label>
                            <input type="text" name="fname" id="firstname" class="form-control" required>
                            <span id="firstnameerror" class=" errorclass"></span>
                        </div>

                        <div class="form-group col-md-6">
                            <label>Last Name:</label>
                            <input type="text" name="lname" id="lastname" class="form-control" required>
                            <span id="lastnameerror" class=" errorclass"></span>
                        </div>
                    </div>


                    <div class="form-group">
                        <label>Username:</label>
                        <input type="text" name="uname" id="username" class="form-control">
                        <span id="usererror" class=" errorclass"></span>
                    </div>

                    <div class="form-group">
                        <label>Password:</label>
                        <input type="password" name="pwd" id="password" class="form-control">
                        <span id="passerror" class=" errorclass"></span>
                    </div>

                    <div class="form-group">
                        <label>Confirm password:</label>
                        <input type="password" name="" id="cpassword" class="form-control">
                        <span id="cpasserror" class=" errorclass"></span>
                    </div>

                    <div class="form-group">
                        <label>Email :</label>
                        <input type="text" name="email" id="email" class="form-control">
                        <span id="emailerror" class=" errorclass"></span>
                    </div>

                    <div class="form-group">
                        <label>Profile Pic :</label>
                        <input type="file" name="userpic" id="userpic" class="form-control">
                    </div>

                    <input type="submit" name="submit" class="btn btn-success"> <br><br>


                    <p class="text-center logininregister">already have an account?<a href=login.php> Login</a></p>



                </form>
            </div>
        </div>
    </div>

    <!---------------- Footer Section ------------->
    <?PHP include 'footer.php' ?>




    <script src="javascript/validation.js"></script>
</body>

</html>