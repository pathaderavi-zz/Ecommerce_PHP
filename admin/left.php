<!DOCTYPE html>
<html>
<head>
<style>
body {
    margin: 10px;
}


ul {
    list-style-type: none;
    margin: 0;
    padding: 0;
    width: 100%;
    background-color: #f1f1f1;
    position: fixed;
    height: 100%;
    overflow: auto;
}

li a {
    display: block;
    color: #000;
    padding: 8px 0 8px 18px;
    text-decoration: none;
	font-size: 30px
}

li a.active {
    background-color: #4CAF50;
    color: white;
}

li a:hover:not(.active) {
    background-color: #555;
    color: white;
}
</style>
</head>
<body>


<ul>
  <li><a class="active" href="#dashboard">Dashboard</a></li>
  <li><a href="user_registration.php" target="main_page">Add Admin</a></li>
  <li><a href="seller_display.php" target="main_page">Verify Seller</a></li>
  <li><a href="add_category.php" target = "main_page">Add Category</a></li>
  <li><a href="delete_category.php" target = "main_page">Delete Category</a></li>
  <li><a href="view_category.php" target = "main_page">View Category</a></li>
  <li><a href="logout.php" target = "_top">Logout</a></li>
  
  
  
</ul>


</div>


</body>
</html>