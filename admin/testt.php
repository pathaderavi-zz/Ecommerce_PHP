<?php
// Connection to the database
$host="localhost"; // Host name 
$username="root"; // Mysql username 
$password="root"; // Mysql password 
$db_name="eschoppee"; // Database name 
$tbl_name="seller"; // Table name 
// Create connection
$conn = new mysqli( 'localhost', 'root', 'root', 'eschoppe' );
// Check connection
if ($conn->connect_error) {
     die("Connection failed: " . $conn->connect_error);
} 


// Connect to server and select databse.
//sql_connect("$host", "$username", "$password")or die("cannot connect"); 
//sql_select_db("$db_name")or die("cannot select DB");

if(isset($_POST['checkbox'])){$checkbox = $_POST['checkbox'];
if(isset($_POST['activate'])?$activate = $_POST["activate"]:$deactivate = $_POST["deactivate"])
$id = "('" . implode( "','", $checkbox ) . "');" ;
$sql="UPDATE seller SET address = '".(isset($activate)?'Y':'N')."' WHERE id IN $id" ;
$result = $conn->query($sql) or die(mysql_error());
}
 
$sql="SELECT * FROM seller";
//esult=mysql_query($sql);
$result = $conn->query($sql);

//$count=mysql_num_rows($result);
$count = $result->num_rows;
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>

<meta http-equiv="Content-Type" content="text/html; charset="utf-8"" />
<title>Update multiple rows in mysql with checkbox</title>

<script type="text/javascript">
<!--
function un_check(){
for (var i = 0; i < document.frmactive.elements.length; i++) {
var e = document.frmactive.elements[i];
if ((e.name != 'allbox') && (e.type == 'checkbox')) {
e.checked = document.frmactive.allbox.checked;
}}}
//-->
</script>

</head>
<body>

<table width="400" border="0" cellspacing="1" cellpadding="0">
<tr>
<td><form name="frmactive" method="post" action="">
<table width="400" border="0" cellpadding="3" cellspacing="1">
<tr>
<td colspan="5"><input name="activate" type="submit" id="activate" value="Activate" />
<input name="deactivate" type="submit" id="deactivate" value="Deactivate" /></td>
</tr>
<tr>
<td>&nbsp;</td>
<td colspan="4"><strong>Update multiple rows in mysql with checkbox</strong> </td>
</tr><tr>
<td align="center"><input type="checkbox" name="allbox" title="Select or Deselct ALL" style="background-color:#ccc;"/></td>
<td align="center"><strong>Id</strong></td>
<td align="center"><strong>Firstname</strong></td>
<td align="center"><strong>Lastname</strong></td>
<td align="center"><strong>Status</strong></td>
</tr>
</table>
<?php
if ($result->num_rows > 0) {
while($row= $result->fetch_assoc()){
echo"<input type='checkbox' name='name'"; 
		 echo " checked =''"; 
		//echo "value='".$row['id']."'/>".$row['name'];
		//echo "value='".$row['id']."'/>".$row['name'];
		//echo"<br>";
		//echo "email : " .$row['email'];
		//echo"<br>";
		echo "value='".$row['id']."'/>"."<strong>"."Name:  "."</strong>".$row['name'];
		echo"<br>";echo "\t";
		echo "<strong>"."Email: "."</strong>".$row['email'];
		echo"<br>";echo "\t";
		echo "<strong>"."Contact Number:  "."</strong>" .$row['number'];
		echo "<br>";
		echo "<br>";
	

}}
?>
<tr>
<td colspan="5" align="center">&nbsp;</td>
</tr>

</form>
</td>
</tr>
</table>
</body>
</html>