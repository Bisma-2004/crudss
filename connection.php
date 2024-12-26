<?php 
$connect = mysqli_connect("localhost","root","","crud");
if(!$connect){
    die("connection fail".mysqli_connect_error());
}
?>