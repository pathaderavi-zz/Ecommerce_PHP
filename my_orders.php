<!doctype html>
<?php
session_start();
include ("functions/functions.php");
include ("includes/db.php");?>
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
                    <span style="float:right; font-family: Seravek; padding: 5px; line-height:40px;"> Welcome!
                    <b style="color:yellow">Shopping Cart :</b>Total Items  :    <?php total_items();echo"          ";?>Total Price:       <?php total_price();?><a href="cart.php">Your Cart</a></span>
            </div>

            <form method="post" action="customer_register.php" enctype="multipart/form-data" >
                <table align="center" width="750">
                    <tr>
                        <td align="center"><h2> Create an Account</h2></td>
                    </tr>
                    <tr>
                        <td align="right">Your Name</td>
                        <td><input type="text" name="c_name" required/></td>
                    </tr>
                    <tr>
                        <td align="right">Email
                        </td>
                        <td><input type="text" name="c_email" required/></td>
                    </tr>
                    <tr>
                        <td align="right">Password</td>
                        <td><input type="password" name="c_pass" required/></td>
                    </tr>
                    <tr>
                        <td align="right">Country</td>
                        <td>
                            <select name="c_country" required>
                                <option>Select a Country</option>
                                <option>United States</option>
                                <option>Canada</option>
                                <option>United Kingdom</option>
                                <option>China</option>
                                <option>India</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td align="right">City</td>
                        <td><input type="text" name="c_city" required/></td>
                    </tr>
                    <tr>
                        <td align="right">Customer Contact</td>
                        <td><input type="text" name="c_contact" required/></td>
                    </tr>
                    <tr>
                        <td align="right">Customer Address</td>
                        <td><textarea cols="20" rows="10" name="c_address" required></textarea></td>
                    </tr>
                    <tr>
                        <td align="right"><input type="submit" value="Submit" name="register"></td>
                        <td></td>
                    </tr>
                </table>
            </form>

        </div>
    </div>
    <div id="footer">
        <h2 style="text-align: center; padding-top: 30px; color: gold;font-family: Seravek">&copy; A Software Engineering Project by Team 6</h2>

    </div>

</div>
<html>





<?php


if (isset($_POST['register'])){
    $ip = getIp();
    $c_name = $_POST['c_name'];
    $c_email = $_POST['c_email'];
    $c_pass = $_POST['c_pass'];
    $c_country = $_POST['c_country'];
    $c_city = $_POST['c_city'];
    $c_contact = $_POST['c_contact'];
    $c_address = $_POST['c_address'];


    $insert_c = "INSERT INTO `tproject`.`customers` ( `customer_ip`, `customer_name`, `customer_email`, `customer_pass`, `customer_country`, `customer_city`, `customer_contact`) VALUES ('$ip', '$c_name', '$c_email', '$c_pass', '$c_country', '$c_city', '$c_contact')";

    $run_c = mysqli_query($con,$insert_c);

    $sel_cart = "select * from cart where ip_add='$ip'";

    $run_cart = mysqli_query($con,$sel_cart);
    $check_cart = mysqli_num_rows($run_cart);

    if($check_cart==0){
        $_SESSION['customer_email']=$c_email;

        echo "<script>alert('Account Creation Successfull.')</script>";
        echo  "<script>window.open('customer/my_account.php','_self')</script>";
    }
    else{
        $_SESSION['customer_email']=$c_email;

        echo "<script>alert('Account Creation Successfull.')</script>";
        echo  "<script>window.open('checkout.php','_self')</script>";
    }
    #if($run_c){
    # echo "<script>alert('Registration Successful. You can purchase products in the Cart now.')</script>>";
    # }
    //echo $
    //;
}