<?php
/**
 * Created by PhpStorm.
 * User: ravikiranpathade
 * Date: 3/26/16
 * Time: 10:47 PM
 */

$db = new mysqli('127.0.0.1','root','root','pdo');

$username = $_GET['username'];
$username = "'".$username."'";

$pass = $_GET['password'];

$c= "Select password from pdo.table where email=".$username;
$q = $db->query($c);
$q = $q->fetch_assoc();
$p = $q['password'];

if($pass==$p){
    echo "<b>Congratulations. You Have Logged in ".$username;
    echo "</b>";
    $d=1;
}else{
    echo"Login Failed. Please Login again here <a href='admin.php'>Back to Login</a>";
    $d=0;
}


if ($d==1) {
    echo "<center>
            <a href='insert.php'> Insert New Category</a>
            <a href='moderate.php'> Moderate Pending Sellers</a>
            <center>";
}
