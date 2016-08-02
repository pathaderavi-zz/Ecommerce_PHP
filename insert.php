<!doctype html>
<form action="insert.php" method="get">
    <input type="text" name="cat">

    <input type="submit" name="Submit">
</form>

<?php
/**
 * Created by PhpStorm.
 * User: ravikiranpathade
 * Date: 3/26/16
 * Time: 11:09 PM
 */
    try
    {
        $db = new mysqli('127.0.0.1','root','root','pdo');
        $cat = $_GET['cat'];
        $cc = "'".$cat."'";
        $c= "INSERT INTO `pdo`.`category` (`name`) VALUES (".$cc.")";
        $prep = $db->prepare($c);

        $sam =$prep->execute() or die("Cannot Insert ".$cat);
        //echo "Succefully Inserted ".$cat;
    }catch (mysqli_sql_exception $e){
     echo "Cannot Insert";
    }
//$q = execute();
    //echo "<pre>".var_dump($prep)."</pre>";
//}



