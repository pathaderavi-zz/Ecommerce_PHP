<?php
/**
 * Created by PhpStorm.
 * User: ravikiranpathade
 * Date: 3/27/16
 * Time: 2:53 AM
 */
$sta=$_GET['approve'];
$stb=$_GET['reject'];
//echo $sta;
//echo $stb;

$db = new mysqli('127.0.0.1','root','root','pdo');
$c= "UPDATE `pdo`.`seller` SET `status`='1' WHERE `id`=".$sta;
$prep = $db->prepare($c);

$sam =$prep->execute() or die("Cannot Insert ".$cat);


