<?php

 $connect = new mysqli("localhost","cl60-eschoppe","root","cl60-eschoppe");
  


    $qu = "select cat_title from categories";
    


// for method 1
 
$result = mysqli_query($connect, $qu);

// for method 2

//$result2 = mysqli_query($connect, $query);

$options = "";



?>

<!DOCTYPE html>

<!--html>

    <head>

        

    </head>

    <body>

        

        <select>

            <!--?php 

            while($row = mysqli_fetch_array($result)) {
    echo '<option value="'.$row['cat_title'].'">'.$row['cat_title']."</option>";
                }

            ?>

        </select>
        
        

    </body>

</html-->



<!doctype html>
<html>
<head>
<link rel="stylesheet" href="style.css" />

 <title></title>
 
 
<meta charset="utf-8">
<title>Select Drop-Down List with just CSS</title>
<style>
.demo select {
	border: 0 ;  
	-webkit-appearance: none;  
	-moz-appearance: none; 
	background: #4CAF50 url(img/demo/select-arrow.png) no-repeat 90% center;
	width: 200px; 
	text-indent: 10px; 
	text-overflow: ""; 
	

	color: #FFF;
	border-radius: 0px;
	padding: 5px;
	box-shadow: inset 0 0 5px rgba(000,000,000, 0.5);
}
.demo select.black {
	background-color: #000;
}
.demo select.option3 {
	border-radius: 10px 0;
}
b{
	border: 5px solid black;
}
</style>
</head>

<body>

<div class= "container">
 
 <div class= "main">

<form class="demo" action="delete_cat.php" method="post" border="5px">
 <h2>Select Category to be Deleted</h2>
 
 <select style="font-size: 1.5em" name ="select">
			<option selected="true" style="display:none;">Select Category</option>
            <?php 

            while($row = mysqli_fetch_array($result)) {
    echo '<option value="'.$row['cat_title'].'">'.$row['cat_title']."</option>";
                }

            ?>
			
 </select><br><br>
<input  type="submit" name="submit" value = "Delete"/>

</form>




</div>
</div>
</body>
</html>

