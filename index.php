<?php
$success=false;

if(isset($_POST['name'])){
$server="localhost";
$username="root";
$password="";

$con = mysqli_connect($server,$username,$password);

if(!$con){
    die("connection to this database failed due to".mysqli_connect_error());
}
// else{
//     echo "Success connecting to the db";
// }

$name=$_POST['name'];
$gender=$_POST['gender'];
$age=$_POST['age'];
$email=$_POST['email'];
$phone=$_POST['Phone'];
$dec=$_POST['dec'];
$sql = "INSERT INTO `maldivestrip`.`trip` (`Name`, `Age`, `Gender`, `Email`, `Phone`, `Other`, `date`) VALUES ( '$name', '$age', '$gender', '$email', '$phone', '$dec', current_timestamp());";

//echo $sql;

if($con->query($sql) == True){
     $success = true;//echo "Successfully Inserted";
}
else {
    echo "ERROR: $sql <br> $con->error";
}
$con->close();
}
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to Travel Information Site</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <img class="img" src="maimg.jpeg" alt="/" >
    <div class="container">
        <h1>Welcome to Maldives Trip form</h1>
        <p>Enter your details and submit this form to confirm your trip.</p>
        <?php
        if($success==true){
            echo "<p class='confirmmsg'>Trip Confirmed: See you in Madives!!!</p>";
        }
        ?>
            <form action="index.php" method="post">
                <input type="text" name="name" id="name" placeholder="Enter your Name">
                <input type="text" name="age" id="age" placeholder="Enter your Age">
                <input type="text" name="gender" id="gender" placeholder="Enter your Gender">
                <input type="email" name="email" id="email" placeholder="Enter your Email">
                <input type="phone" name="Phone" id="Phone" placeholder="Enter your Phone Number">
                <textarea name="dec" id="dec" cols="30" rows="10" placeholder="Enter any other information which you want to provide"></textarea>
                <button class="btn" type="submit">Submit</button>
                <button class="btn" type="reset">Reset</button>
  
            </form>
    </div>
    <script src="index.js"></script>
</body>
</html>