<!DOCTYPE HTML>
<html>
 <head>
 <title>PHP Multi Page Form</title>
 <link rel="stylesheet" href="style.css" />
 </head>
 <body>
 <div class="container">
 <div class="main">
 <h2>PHP Multi Page Form</h2>
 <?php
 session_start();
 if (isset($_POST['state'])) {
 if (!empty($_SESSION['post'])){
 if (empty($_POST['address1'])
 || empty($_POST['city'])
 || empty($_POST['pin'])
 || empty($_POST['state'])){ 
 // Setting error for page 3.
 $_SESSION['error_page3'] = "Mandatory field(s) are missing, Please fill it again";
 header("location: page3_form.php"); // Redirecting to third page.
 } else {
 foreach ($_POST as $key => $value) {
 $_SESSION['post'][$key] = $value;
 } 
 extract($_SESSION['post']); // Function to extract array.
 $mysqli = new mysqli( 'localhost', 'root', 'root', 'eschoppe' );
// $connection = mysql_connect("localhost", "root", "");
 $db = mysqli_select_db("phpmultipage", $mysqli); // Storing values in database.
 $sql = "insert into detail (name,email,contact,password,religion,nationality,gender,qualification,experience,address1,address2,city) values('{$mysqli->real_escape_string($_POST['name'])}','{$mysqli->real_escape_string($_POST['email'])}','{$mysqli->real_escape_string($_POST['contact'])}','{$mysqli->real_escape_string($_POST['password'])}','{$mysqli->real_escape_string($_POST['religion'])}','{$mysqli->real_escape_string($_POST['nationality'])}','{$mysqli->real_escape_string($_POST['gender'])}','{$mysqli->real_escape_string($_POST['qualification'])}','{$mysqli->real_escape_string($_POST['experience'])}','{$mysqli->real_escape_string($_POST['address1'])}','{$mysqli->real_escape_string($_POST['address2'])}','{$mysqli->real_escape_string($_POST['city'])}')";
 //$insert = $mysqli->query($sql);
 $query = $mysqli->query($sql);
 if ($query) {
 echo '<p><span id="success">Form Submitted successfully..!!</span></p>';
 } else {
 echo '<p><span>Form Submission Failed..!!</span></p>';
 } 
 unset($_SESSION['post']); // Destroying session.
 }
 } else {
 header("location: page1_form.php"); // Redirecting to first page.
 }
 } else {
 header("location: page1_form.php"); // Redirecting to first page.
 }
 ?>
 </div>
 </div>
 </body>
</html>