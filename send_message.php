<?php 

	include('includes/db.php');

	$name = mysqli_real_escape_string($con, $_REQUEST['name']);
	$email = mysqli_real_escape_string($con, $_REQUEST['email']);
	$message = mysqli_real_escape_string($con, $_REQUEST['message']);
	$product_id = mysqli_real_escape_string($con, $_REQUEST['product_id']);
	
	$query = 'SELECT seller FROM products WHERE product_id = ' . $product_id;
	
	if($result=mysqli_query($con, $query))
		{
			while($row=mysqli_fetch_row($result)){
				$seller_email = $row[0];
				break;
			}	
		}
	
	$query = 'SELECT id FROM seller WHERE email = "' . $seller_email . '"';
	
	if($result=mysqli_query($con, $query))
		{
			while($row=mysqli_fetch_row($result)){
				$seller_id = $row[0];
				break;
			}	
		}
	
	$URL = $_SERVER['HTTP_HOST'];
	
	if($name && $message && $email && $seller_id){
	
		$query = "INSERT INTO messages (name, message, email, seller_id) VALUES('" . $name . "', '" . $message . "', '" . $email . "', " . $seller_id . ")";
		$update = mysqli_query($con, $query);

		header('Location: http://176.32.230.51/eschoppes.com/details.php?pro_id='.$product_id.'?sent=y');
	
	}else{
	
		header('Location: http://176.32.230.51/eschoppes.com/details.php?pro_id='.$product_id.'?sent=n');
	
	}