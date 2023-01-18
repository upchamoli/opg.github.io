<?php
session_start();
extract($_SESSION);
?>
<!DOCTYPE html>
<html>

<head>
    <title>About Us</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <link rel="stylesheet" href="css/style.css">
    <?php include 'additionallinks.php';
    ?>
</head>

<body class="bg-light">
    <!----------Navigation------------->
    <?php
        include 'navbar.php'
         ?>
    <!----------------********------------->
    <div class="center-block text-center  abouttextdiv py-5">
        <h3 class="abouttext">About</h3>
    </div>
   
    <div class="row">
    <div class="col-12"> <img src=images/jsrabout.jpg class="aboutimg1 img-fluid" alt="profile">
                <br> </div>
        </div>
       
    <div class="jumbotron text-center">
        <div>
        <h1 class="title ">indiainmylens</h1>
        </div>
    <div class=" ">
        <p class="aboutbio">Indiainmylens is a online photo gallery platform, it is designed for photographers who wants to share their work online, it has particular section for every type of photography so anyone can catogrized their photos by choosing type of their photo and the viewer can easily see which type of photo he/she wanted to see..</p>
    </div>
    </div>
        
        
    
    <div class="col-12 text-center jumbotron bg-light developer ">
        <h3 class="display-5">Designed and Developed by:</h3> <span class="display-4">Uday Prakash Chamoli</span>
        <br>
        <h5 class="mt-2">Student of Mca in Gbpiet Ghurdauri, Pauri Garhwal <br> Uttarakhand</h5>
        <div class="row mt-4 justify-content-center">
            <div class="col-md-6 text-center">
                <h5>Social Media:</h5>
                <p> You can connect with me in social media platforms also my social media official handle is indiainmylens. you can visit to my facebook and instagram profile by clicking the links in the footer section, happy to see your smiling faces <span><i class="fa fa-smile"></i></span> there..!</p>
            </div>
        </div>
    </div>
    
    <!-------------Gallery------------------>
    <!---------------- Footer Section ------------->
    <?php include 'footer.php'
            ?>
    <!----------------***************------------->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
</body>

</html>