<?php
/**
 * Created by PhpStorm.
 * User: ravikiranpathade
 * Date: 4/23/16
 * Time: 8:37 PM
 */?>
<!DOCTYPE html>
<html >
<head>
    <meta charset="UTF-8">
    <title>Seller Login</title>




    <link rel="stylesheet" href="css/style.css">




</head>

<body>

<div class="wrapper1">
    <div class="container">


        <form method="post" action="register.php" class="form">
            <h2 style="color:white; text-align:center;"><?php echo @$_GET['not_admin']; ?></h2>

            <h2 style="color:white; text-align:center;"><?php echo @$_GET['logged_out']; ?></h2>

            <h1>Enter Your Details</h1>

            Full Name : <input type="text" name="fname" required>


            E-Mail Address: <input type="text" name="email" required>

            Company Name: <input type="text" name="cname" required>

            Phone/Telephone Number:<input type="tel" name="number" required>

           
            Password:<input type="password" name="pass" required>
            Confirm Password:<input type="password" name="confirm" required>


            <button type="submit" class="btn btn-primary btn-block btn-large" name="register">Register Now</button>



        </form>
    </div>

    <ul class="bg-bubbles">
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
    </ul>
</div>
<script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>

<script src="js/index.js"></script>
<?php

?>



</body>
</html>

<?php

include ("includes/db.php");
if(isset($_POST['register'])) {
    $name = $_POST['fname'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $comapny = $_POST['cname'];
    $num = $_POST['number'];
    $pass = $_POST['pass'];
    $confirm = $_POST['confirm'];
    
    if ($pass == $confirm) {
        $sel_user = "select * from seller where email='$email'";
        #echo "<script>alert('$email')</script>";
        $run_user = mysqli_query($con, $sel_user);

        $check_user = mysqli_num_rows($run_user);

        if ($check_user == 1) {


            echo "<script>alert('You are already registered with us.')</script>";
            #echo "<script>alert('$email')</script>";
        } else {

            $insert_user = "INSERT INTO seller (fname, email, password, number, cname) VALUES ('$name', '$email', '$pass', '$num', '$comapny')";
            $run_insert = mysqli_query($con,$insert_user);
            if($run_insert){

                echo "<script>alert('User Registration has been processed.Please give us some time to process your account.')</script>";
                echo "<script>window.open('../index.php','_self')</script>";
            }

        }

    }else{
        echo "<script>Both Passwords do not match.</script>";


    }


}
?>

