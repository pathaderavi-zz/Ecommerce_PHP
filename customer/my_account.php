<!doctype html>

<?php include ("functions/functions.php");?>
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
            <li><a href="../index.php">Home</a></li>
            <li><a href="../all_products.php">All Products</a></li>
            <?php //<li><a href="customer/my_account.php">My Account</a></li>?>
            <li><a href="../cart.php">Shopping Cart</a></li>
            <li><a href="../about.php">About Team 6</a></li>
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
            <div id="sidebar_title"><a href="my_account.php">My Account</a></div>
            <ul id="cats">
                <?php
                $user = $_SESSION['customer_email'];
                $get_img = "select * from customers where customer_email='$user'";

                $run_img = mysqli_query($con,$get_img);
                $row_img = mysqli_fetch_array($run_img);
                $c_name = $row_img['customer_name'];

                ?>
                <li><a href="my_account.php?my_orders">My Orders</a></li>
                <li><a href="my_account.php?edit_account">Edit Account</a></li>
                <li><a href="my_account.php?change_pass">Change Password</a></li>
                <li><a href="my_account.php?my_donations">My Donations</a></li>
                <li><a href="my_account.php?delete_account">Delete Account</a></li>


            </ul>
        </div>
        <div id="content_area">
            <?php cart();?>
            <div id="shopping_cart">
                    <span style="float:right; font-family: Seravek; padding: 5px; line-height:40px;">
                        <?php if(isset($_SESSION['customer_email'])){
                            echo "<b>Welcome:  </b>".$_SESSION['customer_email'];
                        }
                       ?>
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
                Welcome <b><?php
                echo $c_name;?></b>
                <?php
                if(!isset($_GET['my_orders'])){
                if(!isset($_GET['edit_account'])){
                    if(!isset($_GET['change_pass'])) {
                        if(!isset($_GET['delete_account'])) {if(!isset($_GET['my_donations'])){
                            echo " <b><?php echo $c_name;?></b>";
                        echo "<br>You can see your orders progress by clicking <a href='my_account.php?my_orders'>here</a>.";
                        } }  }}
                }?>
                <?php
                if(isset($_GET['my_orders'])){
                    include("my_orders.php");
                }
                if(isset($_GET['edit_account'])){
                                    include("edit_account.php");
                }
                if(isset($_GET['change_pass'])){
                    include ("change_pass.php");
                }
                if(isset($_GET['delete_account'])){
                    include ("delete_account.php");
                }
                if(isset($_GET['my_donations'])){
                    include ("my_donations.php");
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