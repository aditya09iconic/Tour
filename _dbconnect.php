<?php

$server = "localhost";
$username = "root";
$password ="";
$database = "tour";

$conn = mysqli_connect($server,$username,$password,$database);

if(!$conn){
    echo "connection failed";
}


?>