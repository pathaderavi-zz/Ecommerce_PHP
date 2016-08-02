<?php
/**
 * Created by PhpStorm.
 * User: ravikiranpathade
 * Date: 4/23/16
 * Time: 5:52 PM
 */


session_start();

/*if(!isset($_SESSION['email'])){
    echo "<script>alert('Please Login First')</script>";
    echo "<script>window.open('login.php','_self')</script>";
}
else { */?>


    <html>

    <head>
        <title>Seller Dashboard</title>
        <link rel="stylesheet" href="styles/style.css">
    </head>

    <body>
    <div class="main_wrapper">
        <div id="header" style="align: center">
            <h1 align="center">Seller Dashboard</h1>
        </div>


        <div id="right">

            <h2 style="text-align: center;">Manage</h2>
            <a href="index.php?insert_product">Insert Product</a>
            <a href="index.php?view_products">View All Products</a>
            <a href="index.php?insert_brand">Insert New Brand Product</a>
            <a href="index.php?messages">Messages</a>
           
            <a href="index.php?logout">Logout</a>
         
        </div>


    </div>
    <div id="left">
        <?php
        echo "<h2>Welcome ".$_SESSION['email']."</h2>";
        if (isset($_GET['insert_product'])) {

            include("insert_product.php");
        }
        if (isset($_GET['view_products'])) {

            include("view_products.php");
        }
        if (isset($_GET['edit_prodcts'])) {

            include("edit_pro.php");
        }
        if (isset($_GET['delete_prodcts'])) {

            include("delete_pro.php");
        }
        if (isset($_GET['insert_brand'])) {

            include("insert_brand.php");
        }
		if (isset($_GET['messages'])) {

            include("messages.php");
        }
        if (isset($_GET['logout'])) {

            include("logout.php");
        } ?>
    </div>

    </body>
    </html>
    <?php

?>