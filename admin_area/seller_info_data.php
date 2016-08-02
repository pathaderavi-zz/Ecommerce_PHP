<?php
// Only process the form if $_POST isn't empty
if ( ! empty( $_POST ) ) {
	  if ( isset($_FILES['image']['tmp_name']) ) {
  
  // Connect to MySQL
  $mysqli = new mysqli("localhost","cl60-eschoppe","root","cl60-eschoppe");
  
  // Check our connection
  if ( $mysqli->connect_error ) {
    die( 'Connect Error: ' . $mysqli->connect_errno . ': ' . $mysqli->connect_error );
  }
  extract($_POST);

 //store textarea values in <pre> tag
$msg="<pre>$address</pre>";
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
  $sql = "INSERT INTO seller ( name, number, email, sellerimage,address, mime,imgname ) VALUES ( '{$mysqli->real_escape_string($_POST['name'])}','{$mysqli->real_escape_string($_POST['number'])}','{$mysqli->real_escape_string($_POST['email'])}','{$mysqli->real_escape_string($binary)} ','{$mysqli->real_escape_string($_POST['address'])}','{$mysqli->real_escape_string($mime)}','{$mysqli->real_escape_string($_FILES['image']['name'])}')";
  $insert = $mysqli->query($sql);
  
  
  

    // open mysqli db connection
  

    

  //  $query = "INSERT INTO `images` (`data`,`mime`,`name`) VALUES('".$mysqli->real_escape_string($binary)."','".$mysqli->real_escape_string($mime)."','".$mysqli->real_escape_string($_FILES['image']['name'])."')";
  //  $mysqli->query($query);


  
  
  
  
  // Print response from MySQL
  if ( $insert ) {
    echo "<script>
			alert('User Created');
window.open('http://176.32.230.51/eschoppes.com/index.php','_self');
</script>";
	
  } else {
   echo "<script>
			alert('The email is already in the system.');
window.open('http://176.32.230.51/eschoppes.com/admin_area/seller_registration.php','_self');
</script>";
  }
  
  
$mysqli->close();
}
}
?>  