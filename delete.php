<?php
require("connection.php");
if(isset($_GET['id'])){
    $id = $_GET['id'];
    $delete = "DELETE FROM `pro` WHERE `ID` = $id";
    mysqli_query($connect,$delete);
    header('location: read.php');
    exit();
}
?>