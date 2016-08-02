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
                <li><a href="#">Sign Up</a></li>
                <li><a href="cart.php">Shopping Cart</a></li>

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
                <!--<ul id="cats">
                    <?php //getBrands();?>

                </ul>-->
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
                         
                    <b style="color:yellow">Shopping Cart :</b>Total Items  :    <?php total_items();echo"          ";?>Total Price:       <?php if(isset($_GET['rws'])){
                         
                        echo "$".$_GET['rws'];
                         
                         
                         }else {total_price();}?><a href="cart.php">Your Cart</a></span>
                </div>

                <?php //echo $ip = getIp();?>

                        <?php
                        if(!isset($_SESSION['customer_email'])){
                            include ("customer_login.php");
                        }
                        else{
                            include ("payment.php");
                        }
                        ?>

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