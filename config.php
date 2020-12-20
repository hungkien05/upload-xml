<?php

//connect mysql database
$host = "localhost";
$user = "root";
$pass = "1";
$db = "demo";
$con = mysqli_connect($host, $user, $pass, $db) or die("Error " . mysqli_error($con));
?>