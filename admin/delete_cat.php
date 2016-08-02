<?php 
//check if form is submitted
if ( isset( $_POST['submit'] ) ) {
    //is submitted
    $variable = $_POST['select'];
    //DO STUFF WITH DAT
	//echo $variable;
   //echo	"Deleted";

  
  // Connect to MySQL
  $mysqli = new mysqli("localhost","cl60-eschoppe","root","cl60-eschoppe");
  
  // Check our connection
  if ( $mysqli->connect_error ) {
    die( 'Connect Error: ' . $mysqli->connect_errno . ': ' . $mysqli->connect_error );
  }
 // extract($_POST);


//store textarea values in <pre> tag
//$msg="<pre>$description</pre>";
  
  // Insert our data
 // $sql = "delete from category_db WHERE type= $mysqli->real_escape_string ( $variable ) ";
    if ($mysqli->query (sprintf ( "DELETE FROM categories WHERE cat_title='%s'", $mysqli->real_escape_string( $variable ) ) )) {
       // printf ( "  Deleted.\n", $mysqli->affected_rows );
		
		echo "<script>
			alert('Category deleted');
window.location.href='delete_category.php';
</script>";
	
    }
  //$insert = $mysqli->query($sql);
  
  // Print response from MySQL
  //if ( $insert ) {
  //  echo "Success! Row ID: {$mysqli->insert_id}";
 // } else {
  //  die("Error: {$mysqli->errno} : {$mysqli->error}");
 // }
  
  
$mysqli->close();
//header('Location: '); 
}
?>  
	


