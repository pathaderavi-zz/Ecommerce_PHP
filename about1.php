<?php
/**
 * Created by PhpStorm.
 * User: ravikiranpathade
 * Date: 4/19/16
 * Time: 1:54 AM
 */

?>

<!doctype html>
<?php
//session_start();
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
        <div class="header_wrapper">
            <a href="index.php"><img id="logo" src="images/logo.png"></a>

        </div>
        <!-- Menu -->
        <div class="menubar">
            <ul id="menu">
                <li><a href="index.php">Home</a></li>
                <li><a href="all_products.php">All Products</a></li>
                <?php //<li><a href="customer/my_account.php">My Account</a></li>?>
                <li><a href="customer_register.php">Sign Up</a></li>
                <li><a href="cart.php">Shopping Cart</a></li>
                <li><a href="about.php">About Team 6</a></li>
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
				
				<div class="about-team">
					
					<h3>About Team 6</h3>
					<p>Find out who were are, and what we do!</p>
				
					<div class="wrap">
						
						<div class="profile">
							
							<h4>Ravikiran Pathade<h4>
							<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
						
						</div>
						
						<div class="profile">
							
							<h4>Arunkumar Odedara<h4>
							<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
						
						</div>
						
						<div class="profile">
							
							<h4>Pavneet Kaur Kohli<h4>
							<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
						
						</div>
						
						<div class="profile">
							
							<h4>Pranita Setiya<h4>
							<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
						
						</div>
						
						<div class="profile">
							
							<h4>Vikas Verma<h4>
							<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
						
						</div>
						
						<div class="profile">
							
							<h4>Shengkun Li<h4>
							<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
						
						</div>
					
					</div>
				
				</div>       

            </div>
         </div>
        <div id="footer">
            <h2 style="text-align: center; padding-top: 30px; color: gold;font-family: Seravek">&copy; A Software Engineering Project by Team 6</h2>

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