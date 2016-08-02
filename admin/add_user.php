<?php
// Only process the form if $_POST isn't empty
if ( ! empty( $_POST ) ) {
	   {  
  // Connect to MySQL
  $mysqli = new mysqli("localhost","cl60-eschoppe","root","cl60-eschoppe");
  
  // Check our connection
  if ( $mysqli->connect_error ) {
    die( 'Connect Error: ' . $mysqli->connect_errno . ': ' . $mysqli->connect_error );
  }
  extract($_POST);

  if($_POST['password']!= $_POST['repassword'])
  {  
  echo "<script>
			alert('Passwords do not match.Please try again');
window.location.href='user_registration.php';
</script>";
  }
  // Insert our data
  $sql = "INSERT INTO login ( name, number, email, address, username, password ) VALUES ( '{$mysqli->real_escape_string($_POST['name'])}',
  '{$mysqli->real_escape_string($_POST['number'])}',
  '{$mysqli->real_escape_string($_POST['email'])}',
  '{$mysqli->real_escape_string($_POST['address'])}',
  '{$mysqli->real_escape_string($_POST['username'])}',
  '{$mysqli->real_escape_string($_POST['password'])}')";
  
  $insert = $mysqli->query($sql);
    // Print response from MySQL
  if ( $insert ) {
    echo "<script>
			alert('User Created');
window.location.href='user_registration.php';
</script>";
	
  } else {
    echo "<script>
			alert('User not Created');
window.location.href='user_registration.php';
</script>";

	
	
	//die("Error: {$mysqli->errno} : {$mysqli->error}");
  }
  
  
$mysqli->close();
}
}
?>  