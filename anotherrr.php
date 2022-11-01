<?php
if ($_SERVER['REQUEST_METHOD'] == "POST") {
          $fName = checker( $_POST['fName']);
          $lName = checker($_POST['lName']);
          $gender = checker($_POST['gender']);
          $phnNum = checker($_POST['phnNum']);
          $myEmail = checker($_POST['myEmail']);
          $resAdd = checker($_POST['resAdd']);
          $stOfO = checker($_POST['stOfO']);
          $lga = checker($_POST['lga']);
          $nation = checker($_POST['nation']);
          $birthday = checker($_POST['birthday']);
          $prog = checker($_POST['prog']);
          $yearOfPro = checker($_POST['yearOfPro']);
}

function checker($myInput) {
          $myInput = trim($myInput);
          $myInput = stripslashes($myInput);
          $myInput = htmlspecialchars($myInput);
          $myInput = ucfirst($myInput);
          $myInput = preg_match($myInput);
          return $myInput;
}




//           if (!empty($fName) {
//                     echo "First Name Okay";
//           }elseif (var_dump($fName) !== "string") {
//                     echo "Invalid";
//            }
//           //else {
//           //           echo "No information submitted";
//           // }



// // check form validation for php in w3schools...


// // !preg_match
// //isset
// //strtoupper
// //strtolower
// //trim
// //stripslashes
// //ucfirst
// //







$server = "localhost";
$username = "root";
$password = "";

$checker = mysqli_connect($server, $username, $password);


if(!$checker) {
          die("Database connection failed! :" . mysqli_connect_error());
}else{
          echo "Database connection successful!";
}

echo "<br><br>";

$creator = "CREATE DATABASE xyz_db";
$result = mysqli_query($checker, $creator);

if(!$result) {
          die("Error in creating database!" . mysqli_error());
}else{
          echo "Database created successfully!";
}



$sql = "CREATE TABLE MyGuests (
          id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
          firstname VARCHAR(30) NOT NULL,
          lastname VARCHAR(30) NOT NULL,
          email VARCHAR(50),
          reg_date TIMESTAMP
          )";
          '
          
          
          
          
          
          
          '
          if (mysqli_query($conn, $sql)) {
              echo "Table MyGuests created successfully";
          } else {
              echo "Error creating table: " . mysqli_error($conn);
          }
          
          mysqli_close($conn);
          ?>
          







?>