<?php
if(!isset($_SESSION)){
    session_start();
} 

if(isset($_SESSION['Access'])&& $_SESSION['Access'] == "admin"){
    echo "Welcome Magtiwala ".$_SESSION['UserLogin']."<br/>"."<br/>";
    
} else{
    echo header("Location: index.php");
}

include_once("connection.php");

$con = connection();

 $id = $_GET['ID'];
 
 $sql = "SELECT * FROM `d2024` where ID = '$id'";
 $consumers = $con->query($sql) or die ($con->error);
 $row = $consumers->fetch_assoc();

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
     
     
   <form action="delete.php" method = "post">
   <a href="index.php"><--Back</a>
   <a href="edit.php?ID=<?php echo $row['ID'];?>">EDIT</a>

    <?php if($_SESSION['Access'] == "admin"){?>
    <?php } ?>

    <button type ="submit" name="delete">DELETE</button>
    <input type="hidden" name="TID" value="<?php echo $row['TID'];?>">
   </form>
   
   <br/>
    

    <h3><?php echo $row['TID'];?> <?php echo $row['NAME'];?> <?php echo $row['AREA'];?> <?php echo $row['BLK'];?> <?php echo $row['GENDER'];?> </h3>
    <p> is a <?php echo $row['GENDER'];?> </p>
</body>
</html>
