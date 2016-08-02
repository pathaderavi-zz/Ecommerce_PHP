<?php

	include ("functions/functions.php");

	$product_id = $_REQUEST['product_id'];
	$customer_id = $_REQUEST['customer_id'];
	$rating = $_REQUEST['rating'];
	
	if(!hasRated($customer_id, $product_id)){
		
		$query = 'INSERT INTO ratings (customer_id, product_id, value) VALUES ('.$customer_id.', '.$product_id.', '.$rating.')';
		$update = mysqli_query($con, $query);
		
	}
	
	$query = 'SELECT * FROM ratings WHERE product_id = ' . $product_id;
	$i = 0;
	$ratings=array();
	
	if($result=mysqli_query($con, $query))
	{
		while($row=mysqli_fetch_row($result)){
			$ratings[] = $row;
			$i++;
		}	
	}
	
	$rating_value = 0;
	
	
	
	foreach($ratings as $rating){
	
		$rating_value = $rating_value + $rating[3];
	
	}

	$rating_value = $rating_value / $i;
	
	$query = 'UPDATE products SET product_rating = ' . $rating_value . ' WHERE product_id = ' . $product_id;
	$update = mysqli_query($con, $query);
	$URL = $_SERVER['HTTP_HOST'];
	header('Location: http://176.32.230.51/eschoppes.com/details.php?pro_id='.$product_id.'?rating=y');