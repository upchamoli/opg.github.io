<?php 
$dbServername = "localhost";
$dbUsername = "root";
$dbPassword = "";
$dbName = "loginsystem";

$conn = mysqli_connect($dbServername, $dbUsername, $dbPassword, $dbName);
//connection to the database..

if(!$conn){
    die("Connection failed" .mysqli_connect_error());
    //to check if connection is there if not then connection will be canceled with a error message..
}

?>