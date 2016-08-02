<?php
    session_start();
include ("includes/db.php");
$seller = $_SESSION['email'];


	$query = 'SELECT id FROM seller WHERE email = "' . $seller . '"';
	
	if($result=mysqli_query($con, $query))
	{
		while($row=mysqli_fetch_row($result)){
			$seller_id = $row[0];
			break;
		}	
	}

	
	$messages = array();
	
	$query = 'SELECT * FROM messages WHERE seller_id = ' . $seller_id;
	
	if($result=mysqli_query($con, $query))
		{
			while($row=mysqli_fetch_row($result)){
				$messages[] = $row;
			}	
		}
		
		
?><!doctype html>
<html>
    <head>
        
        <title>Insert Product</title>
    </head>
    <body bgcolor="#f0f8ff">
    
		<div style="padding: 20px;">
			
			<?php 
			
					echo '<div style="padding: 10px 20px;border-bottom:1px solid #ddd;margin:10px 0;">';
					
					echo '<p style="display: inline-block;width:100px;"><b>From</b></p><p style="display: inline-block;width:200px;"><b>Email</b></p><p style="display: inline-block;width:400px;"><b>Message</b></p>';
					
					echo '</div>';
			
				foreach ($messages as $message){
				
					echo '<div style="padding: 10px 20px;border-bottom:1px solid #ddd;margin:10px 0;">';
					
					echo '<p style="display: inline-block;width:100px;">' . $message[3] . '</p><p style="display: inline-block;width:200px;">' . $message[2] . '</p><p style="display: inline-block;width:400px;">' . $message[1] . '</p>';
					
					echo '</div>';
					echo '<form action="messages.php" method="post"><input type="hidden" name ="to"  value="'.$message[2].'"><input type="hidden" name ="qu"  value="'.$message[1].'"><textarea rows="4" cols="50" name="ms"></textarea><input type="submit" value="Send Reply"></input></form>';
					
				
				}if (isset($_POST['ms'])){
    								$to = $_POST['to'];
									$subject = "Reply to your Question";
									$txt = $_POST['ms'];
									$txt1 = "<b>Your Question was<br><br>".$_POST['qu']."</b><br><br>Answer given by Seller:<br>".$txt;
									$headers = "From: ESCHOPPE ";

									mail($to,$subject,$txt,$headers);
									$query1 = "DELETE FROM messages WHERE message= '".$_POST['qu']."' AND email='".$to."'";
									$result_m=mysqli_query($con, $query1);
									
									echo "<script>window.open('index.php?messages','_self')</script>";
									}
						
						#$query = "SELECT * FROM messages WHERE seller_id = " . $seller_id;
						/*
						$query1 = "DELETE * FROM messages WHERE message= '".$_POST['qu']."' AND email='".$to."'";
	
						$result_m=mysqli_query($con, $query1));
						echo "<script>window.open('index.php?messages','_self')</script>";*/
				
			
			?>
			
		
		</div>
		
    </body>
</html>


<?php
/**cart 
 * Created by PhpStorm.
 * User: ravikiranpathade
 * Date: 3/28/16
 * Time: 1:53 AM
 */




if(isset($_POST['insert_post'])){
    $product_title = $_POST['product_title'];
    $product_cat = $_POST['product_cat'];
    $product_brand = $_POST['product_brand'];
    $product_price = $_POST['product_price'];
    $product_desc = $_POST['product_desc'];
    $product_keywords = $_POST['product_keywords'];
        //to get an image
    $img = $_POST['product_image'];
    $product_image = $_FILES['product_image']['name'];
    $product_image_tmp = $_FILES['product_image']['tmp_name'];

    move_uploaded_file($product_image_tmp,"product_images/$product_image");
    //echo $img."hello";
   $insert_product = "INSERT INTO products (product_cat, product_brand, product_title, products_price, product_desc,product_image,seller) VALUES ('$product_cat', '$product_brand', '$product_title', '$product_price', '$product_desc','$img','$seller')";
    //echo "<br><br><br><br><br><br>".$insert_product;

    $insert_pro = mysqli_query($con,$insert_product);
    if($insert_pro){
        echo "<script>alert('Product has been inserted')</script>";
        echo "<script>window.open('insert_product.php','_self')</script>";
    }else{

    }

}

