<!DOCTYPE html>
<html>
<head>
<style>
input,textarea{width:250px}
textarea{height:200px}
input[type=submit]{width:150px}
</style>
</head>
<body>
<form method="post" enctype="multipart/form-data" action="storeproduct.php">
<table width="200" border="0">
  
  <tr>
    <td>Product name</td>
    <td><input type="Text" name="productname" /></td>
  </tr>
  <tr>
    <td>Quantity</td>
    <td><input type="number" name="quantity" /></td>
  </tr>
 <tr>
    <td>Price</td>
    <td><input type="number" name="price" /></td>
  </tr>
  
  <tr>
    <td>Description</td>
    <td><textarea name="description"></textarea></td>
  </tr>

  <tr>
    <td>Select Image File:</td>
    <td><input type="file" name="image" /></td>
  </tr>
  

  <tr>
    
		<input type="submit" value="Save" name="save"/>
		
	
  </tr>
  
</table>
</form>
</body>
</html>

