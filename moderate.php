<?php
/**
 * Created by PhpStorm.
 * User: ravikiranpathade
 * Date: 3/27/16
 * Time: 2:30 AM
 */



$db = new mysqli('127.0.0.1','root','root','pdo');
$c= "Select * from pdo.seller where status=0";
$q = $db->query($c);
echo "<center><form action=\"out.php\" method=\"get\">";

while($q = $q->fetch_assoc()){
    $name = $q['fname']." ".$q['lname'];

    $a = "<a href='profile.php?link=".$q['id']."'>".$name."</a>";
    echo $a;
    $i =$q['id'];
    //echo $i;

    echo "
      <input type=\"radio\" name=\"approve\" value=\"$i\">Approve
      <input type=\"radio\" name=\"reject\" value=\"$i\">Reject
      <input type=\"submit\" value=\"Submit\">";
};

echo "</form></center>";




//$up= "Select * from pdo.seller where status=".$st;
//echo $up;//$u = $db->query($up);