<!doctype html>

<?php session_start();  ?>

<?php include ("functions/functions.php");?>

<?php update_popularity($_REQUEST['pro_id']); ?>

<html>

    <head>
        <title>ESCHOPPE</title>
		
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.1/css/font-awesome.min.css">
		
        <link rel="stylesheet" href="styles/style.css" media="all">
        <link rel="stylesheet" href="styles/jquery-ui.min.css" media="all">
		
		<script src="js/jquery.js"></script>
		<script src="js/jquery-ui.js"></script>
		
		<style>
		
			.message-modal{
			
				max-width: 500px;
				max-height: 350px;
				position: fixed;
				margin: auto;
				top: 0;
				right: 0;
				bottom: 0;
				left: 0;
				background: #eee;
				border-radius: 2px;
				box-sizing: border-box;
				padding: 20px;
			
			}
		
			.message-modal label{
				
				display: block;
				width: auto;
				padding: 5px 10px;
				margin-top: 18px;
			
			}
			
			.message-modal input, .message-modal textarea{
				
				display: block;
				width: 100%;
				padding: 5px 10px;
				margin: 0;
				box-sizing: border-box;
				resize: none;
			
			}
			
			.message-modal input[type="submit"]{
				
			
				margin-top:10px;
			
			}
			
			#message_seller, #notify{
				
				display: inline-block;
				clear: both;
				text-align: center;
				cursor: pointer;
				background: #ffffff;
				border: 1px solid #ddd;
				border-radius: 2px;
				margin: 4px 10px;
			
			}
		
			.close-modal{
				
				position: absolute;
				background: #fff;
				border: 1px solid red;
				border-radius: 2px;
				color: red;
				top: -10px;
				right: -10px;
				cursor: pointer;
				text-align: center;
				padding: 0 4px;
			
			}
		
		</style>
		
    </head>


	<body>
		
		<!--  Main -->
		<div class="main_wrapper">
			
			<!--Header -->
			<div class="header_wrapper">
				<img id="logo" src="images/logo.png">

			</div>
			<!-- Menu -->
			<div class="menubar">
				<ul id="menu">
					 <li><a href="index.php">Home</a></li>
                <li><a href="all_products.php">All Products</a></li>
                <li><a href="customer/my_account.php">My Account</a></li>
                <li><a href="#">Sign Up</a></li>
                <li><a href="cart.php">Shopping Cart</a></li>
                <li><a href="#">About Team 6</a></li>
				</ul>
				<div id="form">
					<form method="get" action="results.php" enctype="multipart/form-data">
						<input type="text" name="user_query" placeholder="Search a Product"/>
						<input type="submit" name="search" value="Search"/>
					</form>
				</div>
			</div>
			<div class="content_wrapper">

				<div id="sidebar">
					<div id="sidebar_title">Categories</div>
					<ul id="cats">
						<?php   getCats();    ?>
					</ul>
					<div id="sidebar_title">Brands</div>
					<ul id="cats">
						<?php getBrands();?>
					</ul>
				</div>
				<div id="content_area">
				
				
					<?php cart();?>
                <div id="shopping_cart">
                    <span style="float:right; font-family: Open Sans; padding: 5px; line-height:40px;">
                        <?php if(isset($_SESSION['customer_email'])){
                            echo "<b>Welcome:  </b>".$_SESSION['customer_email']."<b><Your/b>";
                        }
                        else{
                            echo "<b>Welcome Guest</b>";
                        }?>
                    <b style="color:yellow">Shopping Cart :</b>Total Items  :    <?php total_items();echo"          ";?>Total Price:       <?php total_price();?><a href="cart.php">Your Cart</a></span>
                    <?php
                    /*if(!isset($_SESSION['customer_email']))
                    {
                        echo "<a href='checkout.php'>Login</a>";
                    }
                    else{
                        echo "<a href='logout.php'>Logout</a>";
                        }
                    */?>
                <?php
                if(!isset($_SESSION['customer_email'])){


					echo "<div align='right'><a href='checkout.php' style='color: white'>Login</a></div>";


                }else{
                    echo "<div align='right'><a href='logout.php'>Logout</a></div>";
                }

                ?>


                </div>

	<?php
					if(isset($_GET['pro_id'])) {
						$product_id =$_GET['pro_id'];
						$get_pro = "select * from products WHERE product_id='$product_id'";
						$run_pro = mysqli_query($con, $get_pro);

						while ($row_pro = mysqli_fetch_array($run_pro)) {
							$pro_id = $row_pro['product_id'];
						   // $pro_cat = $row_pro['product_cat'];
							//$pro_brand = $row_pro['product_brand'];
							$pro_title = $row_pro['product_title'];
							$pro_price = $row_pro['products_price'];
							$pro_image = $row_pro['product_image'];
							$pro_desc = $row_pro['product_desc'];
							$pro_rating = $row_pro['product_rating'];


							echo "
						<div id='single_product' class='details'>
							<h3>$pro_title</h3>
							<img src='admin_area/product_images/$pro_image' width='400px' height='300px'/>
							<p><b>$ $pro_price</b></p>
							<div class='prodbuttons' style='text-align:center'>
							<a href='index.php'>View All Products</a>
							<a href='index.php?add_cart=".$pro_id."'>Add To Cart</a>
							<a id='message_seller'>Message the seller</a>
							</div>
							<h4 class='destitle'>Product Description:</h4>
							<p class='detaildes'>
							$pro_desc</p>
							
						";
						
						echo "<p style='text-align:center;clear:both;display:block;margin-top:10px;'>Rating: ";
						
						
						
						$x=1;
						while($x <= $pro_rating) {
							echo '<i class="fa fa-star" aria-hidden="true"></i>';
							$x++;
						} 
						
						$y = 5 - $pro_rating;
						while($y > 0){
							
							echo '<i class="fa fa-star-o" aria-hidden="true"></i>';
							$y = $y-1;
						
						}
						
						echo "<p>";
						
						}
					}
	?>
					

					
					
					<?php if(isset($_SESSION['customer_email'])){ ?>
					
						<?php if(notify_me($_SESSION['customer_email'], $_REQUEST['pro_id']) == false){ ?>
						<?php $pp = $_REQUEST['pro_id']; 

						echo "<a id='notify' href='ajax.php?getn=".$pp."'>Notify me if this product changes</a>";
						
						} ?>
					
					<?php } ?>
					
					<?php if(isset($_SESSION['customer_email']) && !hasRated(getCustomerID($_SESSION['customer_email']), $_REQUEST['pro_id'])){ ?>
						
						<div class="product-rater">
							
							<p>Rate This Product: </p>
							
							<form action="submit_rating.php" method="post">
							
								<select name="rating">
								
									<option value="1">1 Star</option>
									<option value="2">2 Star</option>
									<option value="3">3 Star</option>
									<option value="4">4 Star</option>
									<option value="5">5 Star</option>
								
								</select>
								
								<input type="hidden" name="product_id" value="<?php echo $_REQUEST['pro_id']; ?>" />
								
								<input type="hidden" name="customer_id" value="<?php echo getCustomerID($_SESSION['customer_email']); ?>" />
								
								<input type="submit" value="Rate Product" />
								
							</form>	
							
						</div>
					
					<?php } ?>
					
					</div>
					
				</div>
			 </div>
			 
			 
			 
			<div id="footer">
				<h2 style="text-align: center; padding-top: 30px; color: gold;font-family: Seravek">&copy; A Software Engineering Project by Team 6</h2>

			</div>

		</div>
		
		<div class="message-modal" style="display:none;">
		
			<a class="close-modal">X</a>
		
			<h3>Message this seller</h3>
			
			<form action="send_message.php" method="POST">
				
				<label>Your Name:</label>
				<input type="text" name="name" placeholder="Name..." />
				
				<label>Your Email Address:</label>
				<input type="text" name="email" placeholder="Email address..." />
				
				<label>Your Message</label>
				<textarea name="message"></textarea>
				
				<input type="hidden" name="product_id" value="<?php echo $_REQUEST['pro_id'] ?>" />
				
				<input type="submit" value="Send Message" />
			
			</form>
			
		</div>
		
		<script type="text/javascript">
			
			$(document).ready(function(){
				
				$('#message_seller').click(function(){
					
					$('.message-modal').fadeIn('fast');
				
				});
				
				$('.close-modal').click(function(){
					
					$('.message-modal').fadeOut('fast');
				
				});
			
			
				<?php if(isset($_SESSION['customer_email'])): ?>
			
				$('#notify').click(function(){
				
					$.ajax({
				
						method: "POST",
						url: "ajax.php",
						data: { customer_id: <?php echo getCustomerID($_SESSION['customer_email']); ?>, product_id: <?php echo $_REQUEST['pro_id']; ?> }
					
					}).done(function(response){
						
						$('#notify').remove();
					
					});
				
				});
				
				<?php endif; ?>
			
			});
		
		</script>

	</body>
	
<html>





<?php
/**
 * Created by PhpStorm.
 * User: ravikiranpathade
 * Date: 3/27/16
 * Time: 5:34 PM
 */