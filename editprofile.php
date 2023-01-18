<?PHP
    session_start();
extract($_SESSION);
    if(!isset($_SESSION['uname'])){
    header('location: index.php');   //if you are logged in and username is                                       //entered than visit page                                               //otherwise go to the index page..
    }


    if(isset($_POST['update']))
    {                             //if in update form update button is                                     //pressed
        include 'db/dbhandler.php';
        extract($_POST);
        extract($_SESSION);

        if($oldpwd == "" ){ // password is not changing
            
            $result = mysqli_query($conn, "SELECT * FROM users WHERE userid = '$uid' ");
            $rows = mysqli_fetch_array($result);
            
            if($username != $uname){ // when username is changing..$uname is                          session variable.
                
                mysqli_query($conn, "RENAME TABLE `loginsystem`.`$rows[2]` TO `loginsystem`.`$username`");
                mysqli_query($conn, "UPDATE photos SET username='$username' WHERE userid='$uid'");
                $_SESSION['uname'] = $username;
            }
            
            // updatation 
            mysqli_query($conn, "UPDATE users SET name='$fname', username='$username', useremail='$email' WHERE userid='$uid'");
            echo '<script>
            alert("Data Updated Successfully...")
            </script>';
        }else{
            
            $sql = "SELECT * FROM users WHERE userid = '$uid' and userpwd='$oldpwd' ";
            $result = mysqli_query($conn, $sql);
            $rows = mysqli_num_rows($result);

            if($rows){ // password is matched

                if($username != $uname){ // when username is changing
                    
                    mysqli_query($conn, "RENAME TABLE `loginsystem`.`$uname` TO `loginsystem`.`$username`");
                    
                    mysqli_query($conn, "UPDATE photos SET username='$username' WHERE userid='$uid'");
                    
                    $_SESSION['uname'] = $username;
                }
                
                
                // updation
                $sql = "UPDATE users SET name='$fname', username='$username', useremail='$email',userpwd='$newpwd' WHERE userid='$uid'";
                
                mysqli_query($conn, $sql);
                
                echo '<script>
                alert("Data Updated Successfully...")
                </script>';
            }else{
                echo '<script>
                alert("Old Password is Wrong")
                </script>';
            }
        }
    }
?>
<!DOCTYPE html>
<html>

<head>
    <title>Edit Profile</title>
    <meta charset="utf-8">

    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <link rel="stylesheet" href="css/style.css">

 <?php include 'additionallinks.php';
    ?>

</head>

<body class="registrationbody">

    <!----------Navigation------------->
    <?php
    include 'navbar.php'
        ?>




    <div class="center-block text-center  registrationtextdiv mx-6 py-4">
        <h5 class="display-4">Update Your info</h5>

    </div>
    <div class="registrationdialog text-centefr">
        <div class="col-sm-8 registrationmain">
            <div class="registrationcontent">
                <?PHP
                    extract($_SESSION);
                    include 'db/dbhandler.php';
    $result = mysqli_query($conn, "SELECT * FROM users WHERE userid = '$uid' ");
    $row = mysqli_fetch_array($result);
                ?>
                <form action="editprofile.php" method="POST" onsubmit="return validation()" class="col-12">


                    <div class="form-group">
                        <label>Name:</label>
                        <input type="text" name="fname" id="firstname" class="form-control" required value="<?PHP echo $row[1]; ?>">

                    </div>



                    <div class="form-group">
                        <label>Username:</label>
                        <input type="text" name="username" id="username" class="form-control" required value="<?PHP echo $row[2]; ?>">
                        <span id="usererror" class=" errorclass"></span>
                    </div>

                    <div class="form-group">
                        <label>Old Password:</label>
                        <input type="password" name="oldpwd" id="oldpassword" class="form-control">
                    </div>


                    <div class="form-group">
                        <label>New password:</label>
                        <input type="password" name="newpwd" id="newpassword" class="form-control">
                        <span id="newpasserror" class=" errorclass"></span>
                    </div>

                    <div class="form-group">
                        <label>Reenter New password:</label>
                        <input type="password" name="" id="cpassword" class="form-control">
                        <span id="cpasserror" class=" errorclass"></span>
                    </div>

                    <div class="form-group">
                        <label>Email :</label>
                        <input type="text" name="email" id="email" class="form-control" required value="<?PHP echo $row[3] ?>">
                        <span id="emailerror" class=" errorclass"></span>
                    </div>

                    <button type="submit" name="update" class="btn btn-success">Update</button> <br><br>


                    <p class="text-center logininregister">Nothing to update..?<a href=profile.php> Back to profile</a></p>



                </form>
            </div>
        </div>
    </div>
    <!---------------- Footer Section ------------->
    <?PHP include 'footer.php' ?>




    <script src="javascript/updatevalidation.js"></script>
</body>

</html>