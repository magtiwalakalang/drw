<?php
if(!isset($_SESSION)){
    session_start();
} 

include_once("connection.php");
$con = connection();

if(isset($_POST['login'])){

    $username =$_POST['username'];
    $password =$_POST['password'];
    // $access =$_POST['access'];
    
    $sql = "SELECT * FROM logi WHERE username = '$username' AND password = '$password'";
    $user = $con->query($sql) or die ($con->error);
    $row = $user->fetch_assoc();
    $total = $user->num_rows;

    if($total > 0){
        $_SESSION['UserLogin'] = $row['username'];
        $_SESSION['Access'] = $row['access'];
        echo header("Location: index.php");
       
    }else{
        echo "<div class='Message Warning'>No User found!!!</div>";
    }
        
}
// $consumers = $con->query($sql) or die ($con->error);
// $row = $consumers->fetch_assoc();


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-cpmpatible"content="ie=edge">
    <title>DRWSA Management System</title>
    <link rel="stylesheet" href="style.css">

</head>
<body id="formlogin">
<img src="img/drwsa.jpg" alt="">
<h1>DARASA RURAL WATERWORKS AND SANITATION ASSOCIATION, INC.</h1>
    <div class="login-container">
    
    <h2>LOGIN PAGE</h2>
    <br/>
    <div class="form-logo">
        <img src="img/drwsa2.png" alt="">
    </div>
    <form action="" method="post">

    <div class="form-element">
        <label>Username</label>

    <input type="text" name="username" id="username" autocomplete="off" placeholder="Enter Username" required>
    </div>

    <div class="form-element">
        <label>Password</label>
        <input type="password" name="password" id="password" placeholder="Enter Password" required>
 
    <button type="submit" name="login">Login</button>
    </div>
    
    </form>
    </div>
</body>
</html>
