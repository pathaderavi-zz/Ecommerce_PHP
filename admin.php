
<!doctype html>
<html>
    <center>
        <form action="admindash.php" method="get">

            <b>Username: <input type="text" name="username"><br><br>
            Password: <input type="password" name="password">
        <input type="submit" value="Submit"></b>
    </center>
    </form>


</html>








<?php
/**
 * Created by PhpStorm.
 * User: ravikiranpathade
 * Date: 3/26/16
 * Time: 10:37 PM
 */



$username = $_GET['username'];

$pass = $_GET['password'];

echo $username;
echo "<br>";
echo $pass;
