<?php

include_once("connections/connection.php");

$con = connection();
$id = $_GET['ID'];
 
 $sql = "SELECT * FROM `d2024` where ID = '$id'";
 $consumers = $con->query($sql) or die ($con->error);
 $row = $consumers->fetch_assoc();

if(isset($_POST['submit'])){

    $TID =$_POST['TID'];
    $NAME =$_POST['NAME'];
    $AREA =$_POST['AREA'];
    $BLK =$_POST['BLK'];
    $GENDER =$_POST['gender'];

    $sql = "UPDATE `d2024` SET TID = '$TID', NAME = '$NAME', AREA = '$AREA', BLK = '$BLK', gender ='$GENDER' WHERE ID = '$id'";
    $con->query($sql) or die ($con->error);
    echo header("Location: index.php?ID=".$id);
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
             <input type="text" name="TID" id="TID" value="<?php echo $row['TID'];?>">

        <label>NAME</label>
        <input type="text" name="NAME" id="NAME" value="<?php echo $row['NAME'];?>">

        <label>AREA</label>
        <input type="text" name="AREA" id="AREA" value="<?php echo $row['AREA'];?>">

        <label>BLOCK/LOT</label>
        <input type="text" name="BLK" id="BLK" value="<?php echo $row['BLK'];?>">

        <label>GENDER</label>
        <select name="gender" id="gender">

        <option value="Male"<?php echo ($row['GENDER'] == "Male")?'selected' : '';?>>Male</option>
        <option value="Female" <?php echo ($row['GENDER'] == "Female")?'selected' : '';?>>Female</option>

        </select>
       
        <input type="submit" name="submit" value="UPDATE">

       </form>


</body>
</html>
