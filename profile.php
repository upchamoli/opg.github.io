<?PHP
    session_start();
    extract($_SESSION);
?>

<!DOCTYPE html>
<html>

<head>
    <title>Profile</title>
    <meta charset="utf-8">

    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <link rel="stylesheet" href="css/style.css">

   
    <!---------additional bootstrap and javascript files------>
    <?php include 'additionallinks.php';
    ?>
    <!----------------***************------------->


</head>

<body>
    <!----------Navigation------------->
    <?php
    include 'navbar.php';
    ?>

    <div class="jumbotron jumbotron-fluid">
        <div class="container ">
            <div class="row">
                <?PHP
                    include 'profilephotomodal.php';   //for changing                                            profilepic
                    include 'db/dbhandler.php';
                    $uname1 = $_REQUEST['uname1'];    //getting user details                                     from the session
                    $result = mysqli_query($conn, "SELECT profilephoto,useremail FROM users WHERE username='$uname1'");
                    $row = mysqli_fetch_array($result);  //getting details                                        from the table
                ?>
                <div class="profileimg col-md-4 text-center">
                    <?PHP
                        echo '<img src="data:image/jpeg;base64,'.base64_encode($row[0]).'" style="" class="rounded-circle"><br>';
                    
                    if(!isset($_SESSION['uname'])){
                
                    }else{
                        if($uname == $_REQUEST['uname1']){
                        echo '<div class="mt-1"><a href="#uploadpropic" class="photoby" data-toggle="modal" data-dismiss="modal"><i class="fa fa-camera" data-toggle="tooltip" title="Change Profile Picture" aria-hidden="true"></i></div></a>';
                        }
                    }
                    
                        
                        
                    ?>
                </div>
                <div class="profileinfo col-md-8">
                    <h1 class="text-center">
                        <?PHP echo $_REQUEST['uname1'] ?>
                    </h1>
                    <p class="lead text-center mt-0">For booking enquiries feel free to contact me..</p>
                    <p class="lead text-center">Email me at: <?PHP echo ($row[1]);
                        ?>
                    </p>
                    
                    
                    <?PHP
                    if(!isset($_SESSION['uname'])){
                
                    }else{
                        if($uname == $_REQUEST['uname1']){
                        ?>
                            <form action="upload.php">
                                <button type="submit" class="btn btn-secondary justify-content-center">Upload Photo</button>
                            </form>
                        <?PHP
                        }
                    }
                ?>
                </div>
            </div>
        </div>
    </div>
    <div class="col text-center portfoliotext ">
        <h2 class="text-center display-5">Portfolio</h2>
        <hr class="text-center w-25 border">
    </div>
    <div class="container">
        <div class="grid-padding  px-3">
        <?PHP
            include 'db/dbhandler.php';
            $uname1 = $_REQUEST['uname1'];
            $result = mysqli_query($conn, "SELECT photo FROM `$uname1`");
            $i=0;
            while($row = mysqli_fetch_array($result)){
                if($i % 3 == 0){
                    $i=0;
                    echo '<div class="row no-gutters ">';
                }
                echo '<div class="col-12 col-md-4" gallerycol><img src="data:image/jpeg;base64,'.base64_encode($row[0]).'" class="img-thumbnail" style="width: 100%;height:350px; object-fit: scale-down;"></div>';
                
                if($i == 2){
                    echo '</div>';
                }
                $i++;
                
            }
            if($i!=3){
                echo '</div>';
            }
        ?>
    </div>
    </div>
    
    <!---------------- Footer Section ------------->
    <?php
    include 'footer.php';
    ?>
</body>

</html>