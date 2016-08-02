<!doctype html>
<?php include ("functions/functions.php");
session_start();?>
<html>
<head>
    <title>ESCHOPPE</title>
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
            <li><a href="customer/my_account.php">My Account</a></li>
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
                    <span style="float:right; font-family: Seravek; padding: 5px; line-height:40px;">
                         <?php if(isset($_SESSION['customer_email'])){
                             echo "<b>Welcome:  </b>".$_SESSION['customer_email']."<b><Your/b>";
                         }
                         else{
                             echo "<b>Welcome Guest</b>";
                         }?>
                        <b style="color:yellow">Shopping Cart :</b>Total Items  :    <?php $qty = total_items();echo"          ";?>Total Price:       <?php   echo "$".$_GET['rw'];?><a href="cart.php">Your Cart</a></span>
            </div>
			<?php $total = $_SESSION['total_change'];
			//$total = $_SESSION['total_change'];
			
				
			//echo $total." ".$qty;
			?>
            <?php //echo $ip = getIp();?>
            <form action="donate.php" method="post" >
                <select name="hello">
                    <option disabled selected value> -- select an option -- </option>
                   
                    <option value="saab">Modest Needs Foundation</option>
                    <option value="mercedes">Children Scholarship Fund</option>
                    <option value="audi">Women Enews</option>
                </select>
                <input type="submit" name="submit" value="Submit">
            </form>

            <?php
            if(isset($_POST['submit'])){
                if($_POST['hello']=="volvo"){
                    echo "<script>window.open('donate/donate1.php?rw= ','_self')</script>";
                }
                if($_POST['hello']=="saab"){
                   echo " <center>
                <form action='https://www.sandbox.paypal.com/cgi-bin/webscr' method='post' >

                    <!-- Identify your business so that you can collect the payments. -->
                    <input type='hidden' name='business' value='test2@eschoppe.com'>

                    <!-- Specify a Buy Now button. -->
                    <input type='hidden' name='cmd' value='_xclick'>

                    <!-- Specify details about the item that buyers will purchase. -->
                    <input type='hidden' name='item_name' value='Donation to'>
                    <input type='hidden' name='amount' value='$total'>
                    <input type='hidden' name='currency_code' value='USD'>
                    <input type='hidden' name='quantity' value='$qty'>
                    <input type='hidden' name='item_number' value=''>

                    <input type='hidden' name='return' value='paypal_success2.php'/>
                    <input type='hidden' name='cancel_return' value='payment_cancel.php'/>

                    <!-- Display the payment button. -->
                    <input type='image' src='https://www.sandbox.paypal.com/en_US/i/btn/btn_buynowCC_LG.gif'
                           border='0' name='submit' alt='PayPal - The safer, easier way to pay online!'>
                    <img alt='' src='https://www.sandbox.paypal.com/en_US/i/scr/pixel.gif'
                         width='1' height='1'>
                </form>
            </center>";
                }
                if($_POST['hello']=="mercedes"){
                    echo " <center>
                <form action='https://www.sandbox.paypal.com/cgi-bin/webscr' method='post' >

                    <!-- Identify your business so that you can collect the payments. -->
                    <input type='hidden' name='business' value='test3@eschoppe.com'>

                    <!-- Specify a Buy Now button. -->
                    <input type='hidden' name='cmd' value='_xclick'>

                    <!-- Specify details about the item that buyers will purchase. -->
                    <input type='hidden' name='item_name' value='Donation to'>
                    <input type='hidden' name='amount' value='$total'>
                    <input type='hidden' name='currency_code' value='USD'>
                    <input type='hidden' name='quantity' value='$qty'>
                    <input type='hidden' name='item_number' value=''>

                    <input type='hidden' name='return' value='paypal_success2.php'/>
                    <input type='hidden' name='cancel_return' value='payment_cancel.php'/>

                    <!-- Display the payment button. -->
                    <input type='image' src='https://www.sandbox.paypal.com/en_US/i/btn/btn_buynowCC_LG.gif'
                           border='0' name='submit' alt='PayPal - The safer, easier way to pay online!'>
                    <img alt='' src='https://www.sandbox.paypal.com/en_US/i/scr/pixel.gif'
                         width='1' height='1'>
                </form>
            </center>";
                }
                if($_POST['hello']=="audi"){
                   echo " <center>
                <form action='https://www.sandbox.paypal.com/cgi-bin/webscr' method='post' >

                    <!-- Identify your business so that you can collect the payments. -->
                    <input type='hidden' name='business' value='test4@eschoppe.com'>

                    <!-- Specify a Buy Now button. -->
                    <input type='hidden' name='cmd' value='_xclick'>

                    <!-- Specify details about the item that buyers will purchase. -->
                    <input type='hidden' name='item_name' value='Donation to'>
                    <input type='hidden' name='amount' value='$total'>
                    <input type='hidden' name='currency_code' value='USD'>
                    <input type='hidden' name='quantity' value='$qty'>
                    <input type='hidden' name='item_number' value=''>

                    <input type='hidden' name='return' value='paypal_success2.php'/>
                    <input type='hidden' name='cancel_return' value='payment_cancel.php'/>

                    <!-- Display the payment button. -->
                    <input type='image' src='https://www.sandbox.paypal.com/en_US/i/btn/btn_buynowCC_LG.gif'
                           border='0' name='submit' alt='PayPal - The safer, easier way to pay online!'>
                    <img alt='' src='https://www.sandbox.paypal.com/en_US/i/scr/pixel.gif'
                         width='1' height='1'>
                </form>
            </center>";
                }
            }

            ?>

            <?php

            ?>

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