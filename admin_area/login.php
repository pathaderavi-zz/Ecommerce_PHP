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

<div class="wrapper">
    <div class="container">


        <form method="post" action="login.php" class="form">
            <h2 style="color:white; text-align:center;"><?php echo @$_GET['not_admin']; ?></h2>

            <h2 style="color:white; text-align:center;"><?php echo @$_GET['logged_out']; ?></h2>

            <h1>Welcome Seller</h1>
            <input type="text" name="email" placeholder="Email" required="required" />
            <input type="password" name="password" placeholder="Password" required="required" />
            <button type="submit" class="btn btn-primary btn-block btn-large" name="login">Login</button>
            <button type="submit" class="btn btn-primary btn-block btn-large" name="register" onClick="document.location.href='seller_registration.php'">Register</button>
			<br><br><button type="button" class="btn btn-primary btn-block btn-large" onClick="document.location.href='http://176.32.230.51/eschoppes.com/index.php'">Back to Website</button>

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
        
    </ul>
</div>
<script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>

<script src="js/index.js"></script>
<?php
echo $email.$password;
?>



</body>
</html>

<?php

include ("includes/db.php");
if(isset($_POST['login'])){
    $email = $_POST['email'];
    $password = $_POST['password'];

    $sel_user = "select * from seller where email='$email' AND password='$password'";
    #echo "<script>alert('$email')</script>";
    $run_user = mysqli_query($con, $sel_user);

    $check_user = mysqli_num_rows($run_user);
    $check_status = mysqli_fetch_array($run_user);
    $status = $check_status['status'];
    $verified = $check_status['verified'];

    if($check_user==1 && $verified==1){
        session_start();
        $_SESSION['email']= $email;

        echo "<script>window.open('index.php','_self')</script>";
        #echo "<script>alert('$email')</script>";
    }
    elseif ($check_user==1 && $verified==0){
        echo "<script>alert('You are not approved yet, please wait till the Website admin Approves your Account.!')</script>";

    }
    else{

        echo "<script>alert('Password or Email is wrong, try again!')</script>";

    }

}
if(isset($_POST['register'])){
    echo "<script>window.open('seller_registration.php''_self')</script>";
    header("Location: seller_registration.php");
}
?>

