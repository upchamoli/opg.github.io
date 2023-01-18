<!----------Navigation------------->
<nav class="navbar navbar-expand-md navbar-dark  sticky-top ">
    <div class="navlogo mt-0">
    <a class="navbar-brand" href="index.php"><img src="images/jsrlogo.png"></a>
        </div>
    
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive">
        <span class="navbar-toggler-icon"></span>
    </button>


    <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">
            <li class="nav-item">
                <a class="nav-link active " href="index.php">Home</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="aboutus.php">About</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#contactus">Contact us</a>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Account</a>
                <span class="caret"></span>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">

                    <?PHP 
                            if(isset($_SESSION['uname'])){
                                ?>
                    <a class="dropdown-item" href="profile.php?uname1=<?PHP echo $uname; ?>">Profile</a>
                    <a class="dropdown-item" href="editprofile.php">Edit</a>
                    <a class="dropdown-item" href="upload.php">Upload</a>
                    <a class="dropdown-item" href="signout.php">Sign Out</a>
                    <?PHP
                            }else{
                                ?>
                    <a class="dropdown-item" href="login.php">Login</a>
                    <a class="dropdown-item" href="registration.php">Register</a>
                    <?PHP
                            }
                            
                            ?>

                </div>
            </li>
        </ul>
    </div>
</nav>