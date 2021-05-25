<?php

$user="root";
$pass="";
$server="localhost";
$db="ved";

$conn=mysqli_connect($server,$user,$pass);
mysqli_select_db($conn,"ved");
?>