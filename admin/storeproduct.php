<?php
// Only process the form if $_POST isn't empty
if ( ! empty( $_POST ) ) {
	  if ( isset($_FILES['image']['tmp_name']) ) {
  
  // Connect to MySQL
  $mysqli = new mysqli( 'localhost', 'root', 'root', 'eschoppe' );
  
  // Check our connection
  if ( $mysqli->connect_error ) {
    die( 'Connect Error: ' . $mysqli->connect_errno . ': ' . $mysqli->connect_error );
  }
  extract($_POST);

 //store textarea values in <pre> tag
$msg="<pre>$description</pre>";
  // get image data
   $binary = file_get_contents($_FILES['image']['tmp_name']);
$tmpName  = $_FILES['image']['tmp_name'];  

// Read the file 
$fp     = fopen($tmpName, 'r');
$data = fread($fp, filesize($tmpName));
$data = addslashes($data);
fclose($fp);
    // get mime type
    $finfo = new finfo(FILEINFO_MIME);
    $type = $finfo->file($_FILES['image']['tmp_name']);
    $mime = substr($type, 0, strpos($type, ';'));
  // Insert our data
  $sql = "INSERT INTO product ( productname, quantity, price, productimage,description, mime,imgname ) VALUES ( '{$mysqli->real_escape_string($_POST['productname'])}','{$mysqli->real_escape_string($_POST['quantity'])}','{$mysqli->real_escape_string($_POST['price'])}','{$mysqli->real_escape_string($binary)} ','{$mysqli->real_escape_string($_POST['description'])}','{$mysqli->real_escape_string($mime)}','{$mysqli->real_escape_string($_FILES['image']['name'])}')";
  $insert = $mysqli->query($sql);
  
  
  

    // open mysqli db connection
  

    

  //  $query = "INSERT INTO `images` (`data`,`mime`,`name`) VALUES('".$mysqli->real_escape_string($binary)."','".$mysqli->real_escape_string($mime)."','".$mysqli->real_escape_string($_FILES['image']['name'])."')";
  //  $mysqli->query($query);


  
  
  
  
  // Print response from MySQL
  if ( $insert ) {
    echo "Success! Row ID: {$mysqli->insert_id}";
  } else {
    die("Error: {$mysqli->errno} : {$mysqli->error}");
  }
  
  
$mysqli->close();
}
}
?>  