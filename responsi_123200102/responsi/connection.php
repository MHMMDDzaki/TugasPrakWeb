<?php 
$hostname = "localhost";
$username = "root";
$password = "";
$database = "responsi";

$connect = mysqli_connect($hostname, $username, $password, $database);

if(mysqli_connect_errno()){
    die("Database Error : ".mysqli_connect_error());
}
?>