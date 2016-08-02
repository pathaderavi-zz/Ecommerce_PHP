
<!DOCTYPE html>
<html>
<head>
 <title></title>
 <link rel="stylesheet" href="style.css" />
 </head>
 <body>
 <div class="container">
 <div class="main">
<form method="post" action="submitverify.php">
<h2> Registered Sellers </h2> <br>
<?php
session_start();
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "eshoppe";

// Create connection
$conn = new mysqli("localhost","cl60-eschoppe","root","cl60-eschoppe");
// Check connection
if ($conn->connect_error) {
     die("Connection failed: " . $conn->connect_error);
} 

$sql = "SELECT id, name, email, number, sellerimage FROM seller where checked =0 LIMIT 1";
$result = $conn->query($sql);
//$stmt->num_rows;
 $test='';
$id='';
if ($result->num_rows > 0) {
     // output data of each row
     while($row = $result->fetch_assoc()) {
	
	//echo"<input type='' name='name'"; 
		 //echo " checked =''"; 
		//echo "value='".$row['id']."'/>".$row['name'];
		//echo "value='".$row['id']."'/>".$row['name'];
		//echo"<br>";
		//echo "email : " .$row['email'];
		//echo"<br>";
		// $link= 'source.php?id='$row['id'];
		echo "<strong>"."Name:  "."</strong>".$row['name'];
		echo"<br>";echo "\t";
		echo "<strong>"."Email: "."</strong>".$row['email'];
		echo"<br>";echo "\t";
		echo "<strong>"."Contact Number:  "."</strong>" .$row['number'];
		$id = $row['id'];
		echo"<br>";echo "\t";
		echo "<strong>"."Verification Image:  "."</strong>" ;
		echo "<br>";
		echo "<br>";
		//echo "<img src="http://placehold.it/100x100" class="downloadable/>"
		

		//echo "<a href='".$link."'>Link</a>";
		echo '<img src="source.php?' .'"border ="0" height="250" width="250" />';
		echo "<br>";
		echo "<br>";
		echo "<br>";
		$test= $row['email'];
		
		
		
		
		         //echo "<input type= ". $row["id"]. " - Name: ". $row["firstname"]. " " . $row["lastname"] . "<br>";
     }
} else {
     echo "No more sellers to be verified";
echo "<br>";
echo "<br>";

	 }
	 

$_SESSION['test12'] = $test;
$_SESSION['id'] = $id;


$conn->close();
?>  
<input type="submit" value="Verify" name="Verify"/>
<input type="submit" value="Reject" name="Reject"/>
</form>
</div>
</div>
</body>
</html>