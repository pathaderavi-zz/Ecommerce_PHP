<?php 
	
	session_start();
	

	
	//$query = "INSERT INTO notifications ('customer_id', 'product_id') VALUES  ('" . $_REQUEST['customer_id'] . "', '" . $_REQUEST['product_id'] . "')";
 
	//echo $query;
	
	include('functions/functions.php');
	
	include('includes/db.php');
	
	//Ajax response script
	
	if(isset($_REQUEST['rating']) && isset($_REQUEST['popularity']) && isset($_REQUEST['price']))
	{
		
		$input = array();
		
		if($_REQUEST['rating'] != 'D'){
			$input['rating'] = $_REQUEST['rating'];
		}
		
		if($_REQUEST['popularity'] != 'D'){
			$input['popularity'] = $_REQUEST['popularity'];
		}
		
		if($_REQUEST['price'] != 'D'){
			$input['price'] = $_REQUEST['price'];
		}
		
		if(isset($_REQUEST['category'])){
			$category = $_REQUEST['category'];
		}
	
		$products = sortMAU($input, $category);
		
		foreach($products as $product){
		
			echo "<div id='single_product'>";
				
			echo "<h3>" . $product['product_title'] . "</h3>";
			
			echo "<img src='admin_area/product_images/" . $product['product_image'] . "' width='180px' height='180px'/>";
			
			echo "<p class='price_prod'><b>&#36;" . $product['products_price'] . "</b></p>";
			
			echo "<p><b>Score: " . $product['score'] . "&#37;</b></p>";
			
			echo "<div class='prodbuttons'>";
			
			echo "<a href='details.php?pro_id=" . $product['product_id'] . "'>View Product</a>";
			
			echo "<a href='index.php?add_cart=".$product['product_id']."'>Add To Cart</a></div>";
			
			echo "<p style='text-align:center;clear:both;display:block;margin-top:10px;'>Rating: ";
			
			$x=1;
			
			while($x <= $product['product_rating']) {
				
				echo '<i class="fa fa-star" aria-hidden="true"></i>';
				$x++;
		
			} 
			
			$y = 5 - $product['product_rating'];
			
			while($y > 0){
						
				echo '<i class="fa fa-star-o" aria-hidden="true"></i>';
				
				$y = $y-1;
					
			}
			
			echo "<p>";
			
			echo "</div>";
		
		}
	
	}
	
	if(isset($_GET['getn'])) { 
		$pid = $_GET['getn'];
		$user =  getCustomerID($_SESSION['customer_email']); 
		$query = "INSERT INTO notifications (`product_id`, `customer_id`) VALUES ('".$pid."','".$user."')";
        $update = mysqli_query($con, $query);
        //echo $query;
		header('Location: http://176.32.230.51/eschoppes.com/details.php?pro_id='.$pid);
		//echo "<script>window.open('http://176.32.230.51/eschoppes.com/details.php?pro_id=".$pid."')</script>";
	
	}
	die();