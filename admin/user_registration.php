<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="style.css" />
<style>
input,textarea{width:255px}
textarea{height:205px}
input[type=submit]{width:155px}
</style>
</head>
<body>
 <script type="text/javascript" src="password.js"></script>
<div class="container">
 <div class="main">
 
<form method="post" enctype="multipart/form-data" action="add_user.php">
<h2> Add User Details </h2> <br>
<table width="300" border="0">
  
  <tr>
    <td>Full Name</td>
    <td><input type="Text" name="name" /></td>
  </tr>
  <tr>
    <td>Phone Number</td>
    <td><input type="number" name="number" /></td>
  </tr>
 <tr>
    <td>Email</td>
    <td><input type="email" name="email" /></td>
  </tr>
  
  <tr>
    <td>Address</td>
    <td><input type="text" name="address"/></td>
  </tr>

<tr>
    <td>Username</td>
    <td><input type="text" name="username"/></td>
  </tr>
  <tr>
    <td>Password</td>
    <td><input type="password" name="password" id ="password"/></td>
  </tr>
  <tr>
    <td>Re-type password</td>
    <td><input type="password" name="repassword" id="repassword"/><span id='message'></span></td>
	
	
  </tr>


  </table>
<input  type="submit" value="Save" name="save"/>



</form>
</div>
</div>
</body>
</html>

