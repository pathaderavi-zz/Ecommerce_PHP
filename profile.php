<?php
/**
 * Created by PhpStorm.
 * User: ravikiranpathade
 * Date: 3/27/16
 * Time: 3:18 AM
 */
$db = new mysqli('127.0.0.1','root','root','pdo');
$r = $_GET['link'];
$c= "Select * from pdo.seller where id=".$r;

//echo $c;

$q = $db->query($c);
$q = $q->fetch_assoc();
$name = $q['fname']." ".$q['lname'];
//echo $name;
$email= $q['email'];
$user = $q['username'];
$num = $q['number'];
$cname = $q['cname'];
$status = $q['status'];


echo " <center><b>Seller Name : ".$name."</b></center>";
echo " <center><b>E-Mail Address : ".$email."</b></center>";
echo " <center><b>Username : ".$user."</b></center>";
echo " <center><b>Mobile Number : ".$num."</b></center>";
echo " <center><b>Company : ".$cname."</b></center>";
if($status==1){
    echo " <center><b> ".$name." is approved</b></center>";
}else{
    echo " <center><b> ".$name." is yet to be approved.</b></center>";
}