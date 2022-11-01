<!DOCTYPE html>
<html lang="en">
<head>
          <meta charset="UTF-8">
          <meta name="viewport" content="width=device-width, initial-scale=1.0">
          <link rel="stylesheet" href="stylesheet/fontawesome-free-5.15.4-web/css/all.css">
          <title>My DB Form</title>
          <style>
                    body {
                              font-family: sans-serif;
                    }

                    form {
                              color: white;
                              background: #003246;
                              margin: auto;
                              width: 40%;
                              padding: 40px;
                    }

                    h1 {
                              margin-left: 40px;
                    }

                    label {
                              margin-left: 50px;
                              color: white;
                    }

                    input, select {
                              margin-left: 50px;
                    }

                    select {
                              padding: 7px;
                              outline: none;
                              border: none;
                              background: whitesmoke;
                              font-size: 17px;
                    }

                    option.myOpt {
                              width: 200%;
                              font-size: 100%;
                    }

                    input:not([type="submit"], [type="radio"]) {
                              width: 75%;
                              padding: 7px;
                              outline: none;
                              border: none;
                              font-size: 17px;
                              background: whitesmoke;
                    }

                    input:not([type="submit"], [type="radio"]):hover {
                              background: lightgray;
                              border: none;
                    }

                    input[type="submit"] {
                              margin-top: 15px;
                              padding: 9px;
                              width: 78%;
                              background: #db9a3a;
                              color: #003246;
                              font-size: 16px;
                              font-weight: bold;
                              border: none;
                    }

                     span.error {
                              color: red;
                              margin-left: 9.5%;
                    } 

                   
          </style>
</head>
<body>
<?php 
include 'connect.php';
if (isset($_POST['submit'])) {
          $fName = $_POST['fName'];
          $lName = $_POST['lName'];
          $gender = $_POST['gender'];
          $phnNum = $_POST['phnNum'];
          $myEmail = $_POST['myEmail'];
          $resAdd = $_POST['resAdd'];
          $stOfO = $_POST['stOfO'];
          $lga = $_POST['lga'];
          $nation = $_POST['nation'];
          $birthday = $_POST['birthday'];
          $prog = $_POST['prog'];
          $yearOfPro = $_POST['yearOfPro'];
}

// $myInsert = "INSERT INTO Students Registration (fName, lName, gender, phnNum, myEmail, resAdd, stOfO, lga, nation, birthday, prog, yearOfPro)
// VALUES ('$fName', '$lName', '$gender', '$phnNum', '$myEmail', '$resAdd', '$stOfO', '$lga', '$nation', '$birthday', '$prog', '$yearOfPro')";

// $myCheck = mysqli_query($checker, $myInsert);

// if($myCheck) {
//           echo "Data inserted successfully";
// }else{
//           die("Data not successful: " . mysqli_error());
// }
?>

<?php

//FORM VALIDATION
$fNameErr = $lNameErr = $genderErr = $phnNumErr = $myEmailErr = $resAddErr = $stOfOErr = $lgaErr = $nationErr = $birthdayErr = $progErr = $yearOfProErr = "";
$fName = $lName = $gender = $phnNum = $myEmail = $resAdd = $stOfO = $lga = $nation = $birthday = $prog = $yearOfPro = "";

if ($_SERVER['REQUEST_METHOD'] == "POST") {
          $fName = checker( $_POST['fName']);
          if(empty($fName)) {
                    $fNameErr =  "Required!";
          }elseif(!preg_match("/^[a-zA-Z]*$/", $fName)) {
                    $fNameErr =  "Invalid!";
          }

          $lName = checker($_POST['lName']);
          if(empty($lName)) {
                    $lNameErr =  "Required!";
          }elseif(!preg_match("/^[a-zA-Z]*$/", $lName)) {
                    $lNameErr =  "Invalid!";
          }

          // $gender = checker($_POST['gender']);

          $phnNum = checker($_POST['phnNum']);
          if(empty($phnNum)) {
                    $phnNumErr =  "Required!";
          }elseif(!preg_match("/^[0-9]*$/", $phnNum)) {
                    $phnNumErr =  "Invalid!";
          }/*elseif($phnNum > 11) {
                     $phnNumErr =  "Incorrect phone number!";      //to checkmate phone number length
            }*/

          $myEmail = checkerB($_POST['myEmail']);
          if(empty($myEmail)) {
                    $myEmailErr =  "Required!";
          }elseif (!filter_var($myEmail, FILTER_VALIDATE_EMAIL)) {
                    $myEmailErr =  "Invalid Email!";
          }

          $resAdd = checker($_POST['resAdd']);
          if(empty($resAdd)) {
                    $resAddErr =  "Required!";
          }/*elseif(!preg_match("/^[a-zA-Z 0-9,.]*$/", $resAdd)) {
                    $resAddErr =  "Invalid!";                                                        //to checkmate residential address
          }*/

          $stOfO = checker($_POST['stOfO']);
          if(empty($stOfO)) {
                    $stOfOErr =  "Required!";
          }elseif(!preg_match("/^[a-zA-Z]*$/", $stOfO)) {
                    $stOfOErr =  "Invalid!";
          }

          $lga = checker($_POST['lga']);
          if(empty($lga)) {
                    $lgaErr =  "Required!";
          }elseif(!preg_match("/^[a-zA-Z]*$/", $lga)) {
                    $lgaErr =  "Invalid!";
          }

          $nation = checker($_POST['nation']);
          if(empty($nation)) {
                    $nationErr =  "Required!";
          }elseif(!preg_match("/^[a-zA-Z]*$/", $nation)) {
                    $nationErr =  "Invalid!";
          }

          $birthday = checker($_POST['birthday']);
          if(empty($birthday)) {
                    $birthdayErr =  "Required!";
          }

          $yearOfPro = checker($_POST['yearOfPro']);
          if(empty($yearOfPro)) {
                    $yearOfProErr =  "Required!";
          }elseif(!preg_match("/^[0-9]*$/", $prog)) {
                    $yearOfProErr =  "Invalid!";
          }
}

function checker($myInput) {
          $myInput = trim($myInput);
          $myInput = stripslashes($myInput);
          $myInput = htmlspecialchars($myInput);
          $myInput = ucfirst($myInput);
          return $myInput;
}

function checkerB($myInput) {
          $myInput = trim($myInput);
          $myInput = stripslashes($myInput);
          $myInput = htmlspecialchars($myInput);
          $myInput = strtolower($myInput);
          return $myInput;
}

?>

<form name="dbForm" action="index.php" method="POST" autocomplete="on">
          <h1>STUDENTS REGISTRATION</h1><br><br>
          <label>First Name</label><br>
          <input type="text" name="fName" id="fName" value="<?php echo $fName; ?>">
          <span class="error"><?php echo $fNameErr; ?></span><br><br>

          <label>Last Name</label><br>
          <input type="text" name="lName" id="lName" value="<?php echo $lName; ?>">
          <span class="error"><?php echo $lNameErr; ?></span><br><br>

          <label>Phone Number</label><br>
          <input type="tel" name="phnNum" id="phnNum" value="<?php echo $phnNum; ?>">
          <span class="error"><?php echo $phnNumErr; ?></span><br><br>


          <label>Email</label><br>
          <input type="text" name="myEmail" id="myEmail" value="<?php echo $myEmail; ?>">
          <span class="error"><?php echo $myEmailErr; ?></span><br><br>

          <label>Gender</label><br>
                    <select name="gender">
                              <option class="myOpt" value="male">Male</option>
                              <option class="myOpt" value="female">Female</option>
                    </select><br><br>

          <label>Residential Address</label><br>
          <input type="text" name="resAdd" id="resAdd" value="<?php echo $resAdd; ?>">
          <span class="error"><?php echo $resAddErr; ?></span><br><br>

          <label>State of Origin</label><br>
          <input type="text" name="stOfO" id="stOfO" value="<?php echo $stOfO; ?>">
          <span class="error"><?php echo $stOfOErr; ?></span><br><br>

          <label>L.G.A</label><br>
          <input type="text" name="lga" id="lga" value="<?php echo $lga; ?>">
          <span class="error"><?php echo $lgaErr; ?></span><br><br>

          <label>Nationality</label><br>
          <input type="text" name="nation" id="nation" value="<?php echo $nation; ?>">
          <span class="error"><?php echo $nationErr; ?></span><br><br>

          <label>Date of Birth</label><br>
          <input type="date" name="birthday" id="birthday" value="<?php echo $birthday; ?>">
          <span class="error"><?php echo $birthdayErr; ?></span><br><br>

          <label>ICT Program</label><br>
          <select name="prog">
                              <option class="myOpt" value="choose" style="color: #003246;">--Select an option--</option>
                              <option class="myOpt" value="web">Website Development</option>
                              <option class="myOpt" value="graphics">Graphics Design</option>
                              <option class="myOpt" value="hardware">Hardware</option>
                    </select><br><br>
          <!-- <span class="error"><//?php echo $progErr; ?></span><br><br> -->

          <label>Year of Program</label><br>
          <input type="text" name="yearOfPro" id="yearOfPro" value="<?php echo $yearOfPro; ?>">
          <span class="error"><?php echo $yearOfProErr; ?></span><br><br>

          <input type="submit" name="submit" value="Sign Up">


</form>


<!-- email input type is set to "text" -->

</body>
</html>