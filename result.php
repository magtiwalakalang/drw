<?php


if(!isset($_SESSION)){
    session_start();
}

if(isset($_SESSION['Userlogin'])){
    echo "Welcome ".$_SESSION['Userlogin'];
}else{
    echo "Welcome Halata";
}

include_once("connections/connections.php");

$con = connection();
$search = $_GET['search'];
$sql="SELECT * FROM plants WHERE First_Name LIKE '%$search%' || Last_Name LIKE '%$search%' ORDER BY id DESC";
$mgaBaliw = $con->query($sql) or die ($con->error);
$row = $mgaBaliw->fetch_assoc();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-cpmpatible"content="ie=edge">
    <title>Student Management System</title>
    <link rel="stylesheet" href="CSS/style.css">

</head>
<thead>
    <body>
    <h1>Student Management System</h1>
    <br/>
    <br/>

    <a href="index.php"> <-Back</a>
        <form action="result.php" method="get">
        <input type="text" name="search" id="search">
        <button type="submit">Finding Groot</button>
        </form>

        <?php if(isset($_SESSION['Userlogin'])){?>
    <a href="logout.php">Logout</a>
         <?php } else{ ?>
            
    <a href="login.php">Login ka bading</a>
    <?php } ?>
    <br/>
    <a href="add.php">Add New</a>
    <table>  
    <thead>
        <tr>

             <th></th>
             <B><th>First Name</th></B>
            <B><th>Last Name</th></B> 
        </tr>
    </thead>
    <tbody>
        <?php do{ ?>    
<tr>
            <td><a href="details.php?ID=<?php echo $row['ID'];?>">view</a></td>
            <td><?php echo $row['First_Name']; ?></td>
            <td><?php echo $row['Last_Name']; ?><t/td>
</tr>  
        <?php }while($row = $mgaBaliw->fetch_assoc()) ?>
        
    </tbody>
    </table>

</body>
</html>
