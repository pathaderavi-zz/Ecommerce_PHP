<!doctype html>
<?php include ("functions/functions.php");?>
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
            <li><a href="customer/my_account.php">My Account</a></li>
            <li><a href="#">Sign Up</a></li>
            <li><a href="cart.php">Shopping Cart</a></li>
            <li><a href="#">Contact Us</a></li>
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
            <div id="shopping_cart">
                    <span style="float:right; font-family: Seravek; padding: 5px; line-height:40px;"> Welcome!
                    <b style="color:yellow">Shopping Cart :</b>Total Items: Total Price:<a href="cart.php">Your Cart</a></span>
            </div>
            <div id="products_box">
                <?php

                if (isset($_GET['search'])){
                    $search_query = $_GET['user_query'];
                $get_pro = "select * from products WHERE product_keywords LIKE '%$search_query%' ";
                $run_pro = mysqli_query($con, $get_pro);

                while ($row_pro = mysqli_fetch_array($run_pro)) {
                    $pro_id = $row_pro['product_id'];
                    $pro_cat = $row_pro['product_cat'];
                    $pro_brand = $row_pro['product_brand'];
                    $pro_title = $row_pro['product_title'];
                    $pro_price = $row_pro['products_price'];
                    $pro_image = $row_pro['product_image'];
                    //$pro_id = $row_pro['product_id'];


                    echo "
        <div id='single_product'>
        <h3>$pro_title</h3>
        <img src='admin_area/product_images/$pro_image' width='180px' height='180px'/>
        <p><b>$ $pro_price</b></p>
        <a href='details.php?pro_id=$pro_id'>View Product</a>
        <a href='index.php?add_cart=".$pro_id."'><button style='float:right'> Add to Cart</button></a>
             
        </div>
        
        ";
                }
                }?>
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