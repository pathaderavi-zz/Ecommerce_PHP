<?php
session_start();
$db = new MySQLi("localhost","cl60-eschoppe","root","cl60-eschoppe");

if ($db->connect_errno) {
    echo 'Connection to database failed: '. $db->connect_error;
    exit();
}

 


 $id = $_SESSION['id'];
 //echo $id;
$query = "SELECT sellerimage FROM seller WHERE id ='$id'";

$result = $db->query($query);
//echo $result;
while($row = mysqli_fetch_array($result)) {
	//$row['sellerimage'];
    $imageData = $row['sellerimage'];

    header("Content-type:image/jpeg");
	echo $imageData;

}
   exit();

?>

