<?php
// Only process the form if $_POST isn't empty
if ( ! empty( $_POST ) ) {
  
  // Connect to MySQL
  $mysqli = new mysqli("localhost","cl60-eschoppe","root","cl60-eschoppe");
  
  // Check our connection
  if ( $mysqli->connect_error ) {
    die( 'Connect Error: ' . $mysqli->connect_errno . ': ' . $mysqli->connect_error );
  }
  extract($_POST);


//store textarea values in <pre> tag
$msg="<pre>$description</pre>";
  
  // Insert our data
  $sql = "INSERT INTO categories( cat_title, description ) VALUES ( '{$mysqli->real_escape_string($_POST['type'])}', '{$mysqli->real_escape_string($_POST['description'])}' )";
  $insert = $mysqli->query($sql);
  
  // Print response from MySQL
  if ( $insert ) {
    echo "<script>
			alert('Category Added');
window.location.href='add_category.php';
</script>";
	
  } else {
    die("Error: {$mysqli->errno} : {$mysqli->error}");
  }
  
  
$mysqli->close();
}
?>  
	
	
	
	

 




