<!doctype html>


<html><center>
        <form action="registers.php" method="get">
            First Name : <input type="text" name="fname" required>
            Last Name: <input type="text" name="lname" required>
            <br><br>
            E-Mail Address: <input type="text" name="email" required>
            <br><br>
            Company Name: <input type="text" name="cname" required>
            <br><br>
            Phone/Telephone Number:<input type="tel" name="number" required>
            <br><br>
            Username:<input type="text" name="username" required>
            <br><br>Password:<input type="password" name="pass" required>
            <br><br>Confirm Password:<input type="password" required>
            <input type="submit" value="Submit">

        </form>
    </center>



</html>

<?php
/**
 * Created by PhpStorm.
 * User: ravikiranpathade
 * Date: 3/27/16
 * Time: 12:09 AM
 */

//echo "WELCOME";
try{
    $fname = "'".$_GET['fname']."',";
$lname = "'".$_GET['lname']."',";
$cname = "'".$_GET['cname']."',";
$email = "'".$_GET['email']."',";
$number = "'".$_GET['number']."',";
$user = "'".$_GET['username']."',";
$pass = "'".$_GET['pass']."'";

$db = new mysqli('127.0.0.1','root','root','pdo');
$ad = $fname.$lname.$cname.$email.$number.$user.$pass.")";//$cat = $_GET['cat'];
$c= "INSERT INTO `pdo`.`seller` (`fname`, `lname`, `cname`, `email`, `number`, `username`,`password`) VALUES (".$ad;
//echo $c;
    $prepare = $db->prepare($c);
    $ex = $prepare->execute();
    if($ex){
            echo "<center><b><br>Registration Successfull. Please give us some time to review your profile. After approval, you can <a href='seller.php'>Sign in</a> here.</center></b></br>";
    }
    else{
        die("<center><b><br>Registration Failed</center></b></br>");
    }
    //echo var_dump($prepare);
   // if(!ex){
     //   die("Registration Failed");
    //}//$bool = boolval(var_dump($prepare));
    //echo $bool;
    //if(boolval(var_dump($prepare))==true){
      //  echo "Registration Successfull";
    //}

}catch (mysqli_sql_exception $e){
 echo "Why";
}
?>