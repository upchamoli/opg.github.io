<?PHP
    session_start();
extract($_SESSION);
    include 'db/dbhandler.php';
    if(!isset($_SESSION['uname'])){
        header('location: index.php');
    }
    if(isset($_POST['submit'])){
        extract($_POST);
        
        $tmpname = $_FILES['img']['tmp_name'];
        
        for($i=0; $i < count($tmpname); $i++){
            $image = addslashes(file_get_contents($tmpname[$i]));
            mysqli_query($conn, "INSERT INTO `$uname` VALUES (null, '$caption', '$type', '$image', now())" );
            
            if(!mysqli_query($conn, "INSERT INTO photos VALUES (null, '$uname', '$caption', '$type', '$image', now() )")){
                echo 'error '.mysqli_error($conn);
            }
            //else{
              //  echo '<script>alert("Image Uploaded Sucessfully...");</script>';
            //}
        }
    }
?>


<!DOCTYPE html>

<html>

<head>
    <title>Upload Photo</title>
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

    <div class=" center-block text-center gallerytextdiv py-5">
        <h3 class="bannertext">Upload Images</h3>

    </div>




    <div class="card text-center">
        <div class="card-header">Upload your photos
        </div>
        <div class="card-body">
            <h5 class="card-title"></h5>
            

            <form action="upload.php" method="POST" enctype="multipart/form-data">
                <center>
                
                
                <label>Select Photos</label>
                <div class="col form-group">
                    <input type="file" class="form-control col-5" name="img[]" multiple="multiple" required>
                </div>
                    
                <div class=" col form-group">
                    <label for="exampleFormControlSelect1">Type of Photo</label>
                    <select class="form-control col-5" id="exampleFormControlSelect1" name="type" required>
                        <option></option>
                        <option>Nature</option>
                        <option>Landscape</option>
                        <option>Portrait</option>
                        <option>Street</option>
                        <option>Architecture</option>
                        <option>Fashion</option>
                        <option>Product</option>
                        <option>Aerial</option>
                        <option>Sports</option>

                    </select>
                </div>
                    <div class="col form-group ">
                    <input type="text" class="form-control col-5 text-center " name="caption" placeholder="Title">
                </div>





                <button type="submit" class="btn btn-secondary" name="submit">Upload</button>
                 </center>   
            </form>

        </div>




    </div>


    <!---------------- Footer Section ------------->
    <?php include 'footer.php'
            ?>
    <!----------------***************------------->



</body>

</html>