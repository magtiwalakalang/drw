<?php
if(!isset($_SESSION)){
    session_start();
} 

if(isset($_SESSION['UserLogin'])){
    echo "<div class = 'message success'>Welcome Magtiwala Ka ".$_SESSION['UserLogin'].'</div>';
} else{
    echo "<div class='message info'> Welcome Bisita</div";
}

include_once("connection.php");

$con = connection();

 $sql = "SELECT * FROM `d2024` ORDER BY ID DESC";
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
    <div class="wrapper">

    <h1>DRWSA Management System</h1>
    <br/>
    <br/>

        <div class="search-container">
            <form action="search.php" method="get">
                <input type="text" name="search" id="search" class="search-input">
                <button type="submit" class="search-button">SEARCH</button>
            </form>
            
        </div>
    

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
            <td width="30"><a href="details.php?ID=<?php echo $row['ID'];?>">VIEW</a></td>
            <td><?php echo $row['TID']; ?></td>
            <td><?php echo $row['NAME']; ?><t/td>
            <td><?php echo $row['AREA']; ?></td>
            <td><?php echo $row['BLK']; ?><t/td></t>
            <td><?php echo $row['GENDER']; ?><t/td></t>
        </tr>   
        <?php }while($row = $consumers->fetch_assoc()) ?>
        </tbody>
    </table>
    </div>
</body>
</html>
