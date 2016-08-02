<?php
// Only process the form if $_POST isn't empty
if ( ! empty( $_POST ) ) {
  
  // Connect to MySQL
  $mysqli = new mysqli( 'localhost', 'root', 'root', 'eschoppe' );
  
  // Check our connection
  if ( $mysqli->connect_error ) {
    die( 'Connect Error: ' . $mysqli->connect_errno . ': ' . $mysqli->connect_error );
  }

$sql = "select type from category_db";
$result = mysql_query($sql);

echo "<html>";

    echo"<head>";
	echo"</head>";
	echo"<body>";

echo "<select name='type'>";
while ($row = mysql_fetch_array($result)) {
    echo "<option value='" . $row['type'] . "'>" . $row['type'] . "</option>";
}
echo "</select>";
echo"</body>";
echo"</html>";

$mysqli->close();
}
?>