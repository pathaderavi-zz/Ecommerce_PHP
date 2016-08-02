<?php
$host="localhost"; // Host name 
$username="root"; // Mysql username 
$password="rot"; // Mysql password 
$db_name="eschoppe"; // Database name 
$tbl_name="seller"; // Table name 

// Connect to server and select databse.
$conn = new mysqli( 'localhost', 'root', 'root', 'eschoppe' );
// Check connection
if ($conn->connect_error) {
     die("Connection failed: " . $conn->connect_error);
} 

$sql = "SELECT id, name, email, number FROM seller";
$result = $conn->query($sql);
$count = $result->num_rows;

//$count=mysql_num_rows($result);
?>

<table width="400" border="0" cellspacing="1" cellpadding="0">
<tr>
<td><form name="form1" method="post" action="">
<table width="400" border="0" cellpadding="3" cellspacing="1" bgcolor="#CCCCCC">
<tr>
<td bgcolor="#FFFFFF">&nbsp;</td>
<td colspan="4" bgcolor="#FFFFFF"><strong>Delete multiple rows in mysql</strong> </td>
</tr>
<tr>
<td align="center" bgcolor="#FFFFFF">#</td>
<td align="center" bgcolor="#FFFFFF"><strong>Id</strong></td>
<td align="center" bgcolor="#FFFFFF"><strong>Name</strong></td>
<td align="center" bgcolor="#FFFFFF"><strong>Lastname</strong></td>
<td align="center" bgcolor="#FFFFFF"><strong>Email</strong></td>
</tr>

<?php
 $row = mysqli_fetch_array(mysqli_query($conn, $sql));{
//while($rows=mysql_fetch_array($result)){
?>

<tr>
<td align="center" bgcolor="#FFFFFF"><input name="checkbox[]" type="checkbox" id="checkbox[]" value="<? echo $rows['id']; ?>"></td>
<td bgcolor="#FFFFFF"><? echo $rows['id']; ?></td>
<td bgcolor="#FFFFFF"><? echo $rows['name']; ?></td>
<td bgcolor="#FFFFFF"><? echo $rows['email']; ?></td>
<td bgcolor="#FFFFFF"><? echo $rows['number']; ?></td>
</tr>

<?php
}
?>

<tr>
<td colspan="5" align="center" bgcolor="#FFFFFF"><input name="delete" type="submit" id="delete" value="delete"></td>
</tr>

<?php

// Check if delete button active, start this 
if($delete){
for($i=0;$i<$count;$i++){
$del_id = $checkbox[$i];
$sql = "DELETE FROM seller WHERE id='$del_id'";
$result = $conn->query($sql);

//$result = mysql_query($sql);
}
// if successful redirect to delete_multiple.php 
if($result){
echo "<meta http-equiv=\"refresh\" content=\"0;URL=delete_multiple.php\">";
}
}
$conn->close();
//mysql_close();
?>

</table>
</form>
</td>
</tr>
</table>