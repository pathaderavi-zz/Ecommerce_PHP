<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="style.css" />
<style>
input,textarea{width:250px}
textarea{height:200px}
input[type=submit]{width:150px}
</style>
</head>
<body>
<div class="container">
 <div class="main">
 
<form method="post" enctype="multipart/form-data" action="seller_info_data.php">
<h2> Seller Registration </h2> <br>
<table width="200" border="0">
  
  <tr>
    <td>Name</td>
    <td><input type="Text" name="name" /></td>
  </tr>
  <tr>
    <td>Phone Number</td>
    <td><input type="number" name="number" maxlength="10" /></td>
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
    <td>Select Image:</td>
    <td><input type="file" name="image" /></td>
  </tr>

  </table>
<input  type="submit" value="Save" name="save"/>



</form>
</div>
</div>
</body>
</html>

