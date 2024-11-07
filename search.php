<?php
if(!isset($_SESSION)){
    session_start();
} 

if(isset($_SESSION['UserLogin'])){
    echo "Welcome Magtiwala Ka".$_SESSION['UserLogin'];
} else{
    echo "Welcome Bisita";
}

include_once("connections/connection.php");

$con = connection();
$search = $_GET['search'];
 $sql = "SELECT * FROM `d2024` where NAME LIKE '%$search%' ORDER BY TID DESC";
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
    <h1>DRWSA Management System</h1>
    <br/>
    <br/>
    <form action="search.php" method="get">
    <input type="text" name="search" id="search">
    <button type="submit" name="query">SEARCH</button>
    </form>

    <?php if(isset($_SESSION['UserLogin'])){?>
    <a href="logout.php">Logout</a>
    <?php } else{ ?>
        <a href="login.php">Login</a>
    <?php } ?>

    <a href="add.php">ADD NEW</a>

    <table>
    <thread>
    <th>
        <tr>
        <th></th> 
         <th>TID</th>
         <th>NAME</th>
         <th>AREA</th>
         <th>BLK</th>
         <th>GENDER</th>

        </tr>
        </thread>
        <tbody>
        <?php do{ ?>
        <tr>
            <td><a href="details.php?ID=<?php echo $row['ID'];?>">VIEW</a></td>
            <td><?php echo $row['TID']; ?></td>
            <td><?php echo $row['NAME']; ?><t/td>
            <td><?php echo $row['AREA']; ?></td>
            <td><?php echo $row['BLK']; ?><t/td></t>
            <td><?php echo $row['GENDER']; ?><t/td></t>
        </tr>   
        <?php }while($row = $consumers->fetch_assoc()) ?>
        </tbody>
    </table>

</body>
</html>
