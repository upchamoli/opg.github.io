<?PHP
session_start();
extract($_SESSION);
?>
<!DOCTYPE html>
<html>

<head>
    <title>Street</title>
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
        include 'navbar.php'
    ?>
    <!----------------***************------------->


    <!--------------Landscape Heading----------------->
    <div class=" center-block text-center gallerytextdiv py-5">
        <h3 class="bannertext">Street</h3>
    </div>
    <!----------------***************------------->


    <!-------------Gallery------------------>
    <div class="container">
        <div class="grid-padding mt-5 px-3">
            
                <?PHP
                include 'db/dbhandler.php';
    
                $result = mysqli_query($conn, "SELECT username,photo FROM photos WHERE type='Street' ");
                
                $i=0;
                while($row = mysqli_fetch_array($result)){
                if($i % 3 == 0){
                    $i=0;
                    echo '<div class="row no-gutters ">';
                }
                echo '<div class="col-12 col-md-4" gallerycol><img src="data:image/jpeg;base64,'.base64_encode($row[1]).'" class="img-thumbnail" style="width: 100%;height:350px; object-fit: scale-down;"><div class=text-center><span><i class="fa fa-camera" aria-hidden="true"></i> By: </span><a class="photoby" href="profile.php?uname1='.$row[0].'">'.$row[0].'</a></div><br></div><br>';
                
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
    <?php include 'footer.php'
            ?>
    <!----------------***************------------->



</body>

</html>