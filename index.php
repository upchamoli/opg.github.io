<?PHP session_start(); extract($_SESSION) ?>
<!DOCTYPE html>
<html>

<head>
    <title>JSR</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <link rel="stylesheet" href="css/style.css">
    
    <!---------additional bootstrap and javascript files------>
    <?php include 'additionallinks.php';
    ?>
    <!----------------***************------------->
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/magnific-popup.min.css" />
    
</head>

<body>
    
    <!----------Navigation------------->
    <?php
    include 'navbar.php'
        ?>
    
    <!----------- Landing Page Section --------------->
    <div class="landing">
        <div class="home-wrap">
            <div class="home-inner"> </div>
        </div>
    </div>
    
    <!---------- Landing Page Caption Section ----------->
    <div class="caption center-block text-center">
        <h3>Indiainmylens</h3>
    </div>
    
    <!--------------Page Info Section----------------->
    <div class=" jumbotron infoDiv  text-center">
        <h4> <span class=" heading ">All Type of Photos</span></h4>
        <p class="info">Find the best photos in one place; we are constantly adding to our collection of breath-taking photos of landscapes,portraits,wildlife etc. These pictures include serene pictures of trees, lakes, plants, flowers, outdoor animals, seascapes and more. </p>
    </div>
    
    <!--------------Photo Library Heading----------->
    <div class="container">
        <div>
            <h3 class="text-center display-4">PHOTO LIBRARY</h3>
            <hr class="text-center w-35 border">
        </div>
    </div>
    
    <!-------------Photo Library Section---------------->
    <div class="container mt-4">
        <div class="row">
            <div class="col-md-4 col-12  imagesdiv">
                <a href="nature.php"><img src="images/DSC_1273.jpg" class="">
                    <h4 class="display-5 imagesheading text-center">Nature</h4>
                    <p class="imagestext">Breathtaking Nature Photos..</p>
                </a>
            </div>
            <div class="col-md-4 col-12 imagesdiv">
                <a href="landscape.php"><img src="images/landscape-2.jpg" class="">
                    <h4 class="display-5 imagesheading text-center">Landscapes</h4>
                    <p class="imagestext">Click for Landscapes Photos..</p>
                </a>
            </div>
            <div class="col-md-4 col-12 imagesdiv">
                <a href="portrait.php"><img src="images/portrait1.jpg" class="">
                    <h4 class="display-5 imagesheading text-center">Portrait</h4>
                    <p class="imagestext">Click for Portrait Photos..</p>
                </a>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4 col-12 imagesdiv">
                <a href="street.php"><img src="images/street-2.jpg" class="">
                    <h4 class="display-5 imagesheading text-center">Street</h4>
                    <p class="imagestext text-center">Click for Street Photos..</p>
                </a>
            </div>
            <div class="col-md-4 col-12 imagesdiv">
                <a href="architecture.php"><img src="images/portfolio04.jpg" class="">
                    <h4 class="display-5 imagesheading text-center">Architecture</h4>
                    <p class="imagestext">Click for Architecture Photos..</p>
                </a>
            </div>
            <div class="col-md-4 col-12 imagesdiv">
                <a href="fashion.php"><img src="images/fashion1.jpg" class="">
                    <h4 class="display-5 imagesheading text-center">Fashion</h4>
                    <p class="imagestext">Click for Fashion Photos..</p>
                </a>
            </div>
            <div class="col-md-4 col-12 imagesdiv">
                <a href="product.php"><img src="images/galleryproduct-2.jpg" class="">
                    <h4 class="display-5 imagesheading text-center">Product</h4>
                    <p class="imagestext">Click for Product Photos..</p>
                </a>
            </div>
            <div class="col-md-4 col-12 imagesdiv">
                <a href="aerial.php"><img src="images/galleryaerial-2.jpg" class="">
                    <h4 class="display-5 imagesheading text-center">Aerial</h4>
                    <p class="imagestext">Click for Aerial Shots..</p>
                </a>
            </div>
            <div class="col-md-4 col-12 imagesdiv">
                <a href="sports.php"><img src="images/sports.jpg" class="">
                    <h4 class="display-5 imagesheading text-center">Sports</h4>
                    <p class="imagestext">Click for Sports Photos..</p>
                </a>
            </div>
        </div>
    </div>
    <div class=" owngallery container-fluid mt-3 text-center">
        <div class="jumbotron bg-light">
            <h1 class=" text-center">Create Your Own Gallery Now...</h1>
            <?php
            if(isset($_SESSION['uname'])){
                ?> <a class="btn btn-success mt-4 px-5 py-2" href="profile.php?uname1=<?PHP echo $_SESSION['uname'] ?> ">Get Started</a>
            <?php
            }
            else{
                ?> <a class="btn btn-success mt-4 px-5 py-2" href="registration.php">Get Started</a>
        </div>
        <?php }
        ?>
    </div>
    
    
    <!---------------- Footer Section ------------->
    <?php
    
    include 'footer.php';
    ?>
    
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <!--Magnific popup for image gallery-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/jquery.magnific-popup.min.js"></script>
    <script>
        $(document).ready(function() {
            $('.gallerys').magnificPopup({
                type: 'image',
                delegate: 'a',
                gallery: {
                    enabled: true
                }
            });
        });
    </script>
</body>

</html>