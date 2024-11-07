<?php


include_once("connection.php");
$con = connection();

// echo $_POST['TID'];
// print_r($_POST);

if(isset($_POST['delete'])){

    $id = $_POST['TID'];
    $sql = "DELETE FROM `d2024` WHERE TID = '$id'";
    $con->query($sql) or die ($con->error);
    echo header ("Location: index.php");
}
