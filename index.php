<!doctype html>
<?php
session_start();
include ("functions/functions.php");?>
<html>
    <head>
        <title>ESCHOPPE</title>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.1/css/font-awesome.min.css">
        <link rel="stylesheet" href="styles/style.css" media="all">
    </head>



    <!--  Main -->
    <div class="main_wrapper">
        <!--Header -->
		
		<?php if($_REQUEST['sent'] == 'y'): ?>
		
		<div style="position:absolute;padding:20px;top:0;left:0;right:0;">
		
			<p>Message Sent Successfully</p>
		
		</div>
		
		<?php endif; ?>
		
		<?php if($_REQUEST['sent'] == 'n'): ?>
		
		<div style="position:absolute;padding:20px;top:0;left:0;right:0;">
		
			<p>Message Could Not Be Sent</p>
		
		</div>
		
		<?php endif; ?>
		
		<?php if($_REQUEST['rating'] == 'y'): ?>
		
		<div style="position:absolute;padding:20px;top:0;left:0;right:0;">
		
			<p>Thanks for your rating!</p>
		
		</div>
		
		<?php endif; ?>
		
		
        <div class="header_wrapper">
            <a href="index.php"><img id="logo" src="images/logo.png"></a>

        </div>
        <!-- Menu -->
        <div class="menubar">
            <ul id="menu">
                 <li><a href="index.php">Home</a></li>
                <li><a href="all_products.php">All Products</a></li>
                 <?php if(isset($_SESSION['customer_email'])){ ?><li><a href="customer/my_account.php">My Account</a></li><? } ?>
               
                 <?php if(!isset($_SESSION['customer_email'])){ ?><li><a href="customer_register.php">Sign Up</a></li><? } ?>
                <li><a href="cart.php">Shopping Cart</a></li>
                <li><a href="admin_area/login.php">Seller Dashboard</a></li>

                
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
                

                </ul>
            </div>
            <div id="content_area">
                <?php  if(isset($_GET['add_cart'])){
            $ip = getIp();
            $pro_id = $_GET['add_cart'];
            $check_pro = "select * from cart where ip_add='$ip' AND p_id='$pro_id'";
            $run_check = mysqli_query($con,$check_pro);
        if(mysqli_num_rows($run_check)>0){
            echo "";
        }else{
            $insert_pro = "insert into cart(p_id,ip_add) values('$pro_id','$ip')";
            $run_pro = mysqli_query($con,$insert_pro);

        }
        }
        ?>
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

                <?php //echo $ip = getIp();?>
                <div id="products_box">

                <?php  
				
				
				if (isset($_GET['cat'])) {
$cat_id = $_GET['cat'];

global $con;
$get_cat_pro = "select * from products where product_cat ='$cat_id'";
$run_cat_pro = mysqli_query($con, $get_cat_pro);
$count_cats = mysqli_num_rows($run_cat_pro);
if($count_cats==0){
echo "<h2 style='padding: 20px'>There are no products in this Category.</h2>";
}
while ($row_cat_pro = mysqli_fetch_array($run_cat_pro)) {
$pro_id = $row_cat_pro['product_id'];
$pro_cat = $row_cat_pro['product_cat'];
$pro_brand = $row_cat_pro['product_brand'];
$pro_title = $row_cat_pro['product_title'];
$pro_price = $row_cat_pro['products_price'];
$pro_image = $row_cat_pro['product_image'];
//$pro_id = $row_pro['product_id'];
echo "
<div id='single_product'>
    <h3>$pro_title</h3>
    <img src='admin_area/product_images/$pro_image' width='180px' height='180px'/>
    <p><b>$ $pro_price</b></p>
    <a href='details.php?pro_id=$pro_id'>View Product</a>
    <a href='index.php'><button style='float:right'> Add to Cart</button></a>

</div>

";
}

}else{
				
				
				
				$get_pro = "select * from products";
                    $run_pro = mysqli_query($con, $get_pro);

                    while ($row_pro = mysqli_fetch_array($run_pro)) {
                        $pro_id = $row_pro['product_id'];
                        $pro_cat = $row_pro['product_cat'];
                        $pro_brand = $row_pro['product_brand'];
                        $pro_title = $row_pro['product_title'];
                        $pro_price = $row_pro['products_price'];
                        $pro_image = $row_pro['product_image'];
                        $pro_rating = $row_pro['product_rating'];
                        //$pro_id = $row_pro['product_id'];


                        echo "
        <div id='single_product'>
        <h3>$pro_title</h3>
        <img src='admin_area/product_images/$pro_image' width='180px' height='180px'/>
        <p class='price_prod'><b>$ $pro_price</b></p>
		<div class='prodbuttons'>
        <a href='details.php?pro_id=$pro_id'>View Product</a>
       <a href='index.php?add_cart=".$pro_id."'><?php cart();?>Add To Cart</a></div>
        ";echo "<p style='text-align:center;clear:both;display:block;margin-top:10px;'>Rating: ";
			
			
			
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
			
			echo "</div>";
                    }}?>
                </div>
               
                <?php getBrandPro();?>
                </div>

            
         </div>
        <div id="footer">
            <h2 style="text-align: center; padding-top: 30px; color: gold;font-family: Seravek">&copy; A Software Engineering Project</h2>

        </div>

    </div>
<html>





<?php



/**
 * Created by PhpStorm.
 * User: ravikiranpathade
 * Date: 3/27/16
 * Time: 5:34 PM
 */