<?PHP

session_start();
$uname = "";
$pword = "";
$errorMessage = "";
extract($_POST);
if ($_SERVER['REQUEST_METHOD'] == 'POST'){
	$uname = $_POST['username'];
	$pword = $_POST['password'];
//extract($_POST);


$mysqli = new mysqli("localhost","cl60-eschoppe","root","cl60-eschoppe");
  
  // Check our connection
  if ( $mysqli->connect_error ) {
    die( 'Connect Error: ' . $mysqli->connect_errno . ': ' . $mysqli->connect_error );
  }
  
  
	
		$SQL = "SELECT * FROM login WHERE username = '". $mysqli->real_escape_string($_POST['username']) ."' AND password =  '". $mysqli->real_escape_string($_POST['password']) ."'";
		
		
		$result = $mysqli->query($SQL);
		//echo "$result";
		
		$num_row1 = mysqli_num_rows($result);

	//====================================================
	//	CHECK TO SEE IF THE $result VARIABLE IS TRUE
	//====================================================

		if ( $num_row1>0) {
		$_SESSION['admin']= $_POST['username']	;
    echo "<script>
			window.location.href='index.php';
</script>";
	
  } else {
    echo "<script>
			alert('Wrong username or password! Try again');
window.location.href='adminlogin.php';
</script>";

	
	
	//die("Error: {$mysqli->errno} : {$mysqli->error}");
  }
		
	$mysqli->close();
}
	




?>


<html>
<head>
<title>Admin Login</title>
<link rel="stylesheet" href="style.css" />
<style>
input,textarea{width:255px}
textarea{height:205px}
input[type=submit]{width:155px}
</style>
</head>
<body>

<div class="container">
 <div class="main">
<FORM NAME ="form1" METHOD ="POST" ACTION ="adminlogin.php">
<h2> Enter login details </h2> <br>
<table width="200" border="0">

<tr>
    <td>Username</td>
    <td><INPUT TYPE = "TEXT" Name ="username" placeholder=" " value="<?PHP print $uname;?>" maxlength="40"></td>
  </tr>
  <tr>
    <td>Password</td>
    <td><INPUT TYPE = 'PASSWORD' Name ='password' Placeholder=" " value="<?PHP print $pword;?>" maxlength="16"></td>
  </tr>

 </table>

<P align = center>
<INPUT TYPE = "Submit" Name = "Submit1"  VALUE = "Login">
</P>


</form>
</div>

</div>
<frame src="logout.php" name="login_page" frameborder="0">

<?PHP print $errorMessage;?>




</body>
</html>