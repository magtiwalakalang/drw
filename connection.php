<?php

function connection(){
    $host = "localhost";
    $username = "root";
    $password = "DRWSA08011983";
    $database = "drwsa";
    
    $con = new mysqli($host, $username, $password, $database);
    
    if($con->connect_error){
            echo $con->connect_error;
    } else{
    return $con;
    }
}