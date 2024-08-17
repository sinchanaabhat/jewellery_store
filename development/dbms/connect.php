<?php

$servername = "localhost";
$username = "root";
$password = "";
$database = "jewellery";

$conn = mysqli_connect($servername,$username,$password,$database);

if(!$conn){
    die("failed to connect".mysqli_connect_error());
}




 ?>

