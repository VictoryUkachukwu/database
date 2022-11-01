<?php 

$myServer = "localhost";
$myUserName = "root";
$myPassword = "";

$checker = mysqli_connect($myServer, $myUserName, $myPassword);

if($checker) {
          echo "Connection successful";
}else{
          die("Connection not successful: " . mysqli_connect_error());
}

echo "<br><br>";
//create database

$myDB = "CREATE DATABASE xyz_db";
$handler = mysqli_query($checker, $myDB);

if($handler) {
          echo "Database successfully created";
}//else{
//           die("Database not successfully created: " . mysqli_error());
 //}





?>