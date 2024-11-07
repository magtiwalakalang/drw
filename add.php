<?php

include_once("connections/connection.php");

$con = connection();

if(isset($_POST['submit'])){

    $TID =$_POST['TID'];
    $NAME =$_POST['NAME'];
    $AREA =$_POST['AREA'];
    $BLK =$_POST['BLK'];
    $GENDER =$_POST['gender'];

    $sql = "INSERT INTO `d2024` (`TID`, `NAME`, `AREA`, `BLK`,`GENDER`) 
    VALUES ('$TID','$NAME','$AREA','$BLK','$GENDER')";   

    $con->query($sql) or die ($con->error);
    echo header("Location: index.php");
}


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-cpmpatible"content="ie=edge">
    <title>DRWSA Management System</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
       <form action="" method="post">

        <label>TID</label>
             <input type="text" name="TID" id="TID">

        <label>NAME</label>
        <input type="text" name="NAME" id="NAME">

        <label>AREA</label>
        <input type="text" name="AREA" id="AREA">

        <label>BLOCK/LOT</label>
        <input type="text" name="BLK" id="BLK">

        <label>GENDER</label>
        <select name="gender" id="gender">

        <option value="Male">Male</option>
        <option value="Female">Female</option>

        </select>
       
        <input type="submit" name="submit" value="Submit Form">

       </form>


</body>
</html>
