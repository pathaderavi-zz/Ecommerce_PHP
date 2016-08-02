<!doctype html>
<?php
session_start();
include ("functions/functions.php");?>
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
            <li><a href="cart1.php">Shopping Cart</a></li>
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
            
        </div>
        <div id="content_area">
            <?php cart();?>
            <div id="shopping_cart">
                    <span style="float:right; font-family: Seravek; padding: 5px; line-height:40px;"> Welcome!
                    <b style="color:yellow">Shopping Cart :</b>Total Items  :    <?php total_items();echo"          ";?>Total Price:       <?php total_price();?><a href="cart1.php">Your Cart</a></span>
            </div>

            <?php //echo $ip = getIp();?>
            <div id="products_box">
                <form action=" " method="post" enctype="multipart/form-data">
                    <table align="center" width="700" bgcolor="#f0f8ff">

                        <tr align="center">
                            <th>Remove</th>
                            <th>Product(s)</th>
                            <th>Quantity</th>
                            <th>Total Price</th>
                        </tr>
                        <?php
                        $total = 0;

                        global $con;

                        $ip = getIp();{

                            $sel_price = "select * from cart where ip_add='$ip'";

                            $run_price = mysqli_query($con, $sel_price);

                            while($p_price=mysqli_fetch_array($run_price)){

                                $pro_id = $p_price['p_id'];

                                $pro_price = "select * from products where product_id='$pro_id'";

                                $run_pro_price = mysqli_query($con,$pro_price);

                                while ($pp_price = mysqli_fetch_array($run_pro_price)){

                                    $products_price = array($pp_price['products_price']);
                                    $product_title = $pp_price['product_title'];
                                    $product_image = $pp_price['product_image'];
                                    $single_price = $pp_price['products_price'];

                                    $values = array_sum($products_price);

                                    $total =$total+ $values;


                                    //echo "$" . $total;
                                }

                                ?>

                                <tr align="center">
                                    <td><input type="checkbox" name="remove[]" value="<?php echo $pro_id;?>"/></td>
                                    <td><?php echo $product_title;?><br>
                                        <img src="admin_area/product_images/<?php echo $product_image;?>" width="60px" height="60px"/></td>
                                    <td><input type="text" size="6" name="qty" value="<?php echo $_SESSION['qty'];?>"/></td>
                                    <?php

                                    if(isset($_POST['update_cart'])){
                                        $qty = $_POST['qty'];
                                        $update_qty = "update cart set qty='$qty' ";
                                        $run_qty = mysqli_query($con,$update_qty);
                                        $_SESSION['qty'] = $qty;
                                        $total = $total*$qty;
                                    }?>

                                    <td><?php echo "$ ".$single_price;?></td>
                                </tr>
                                <tr align="right">
                                    <td colspan="4"><b>Sub Total:</b></td>
                                    <td colspan="4"><?php echo "$ ".$total;?></td>
                                </tr>
                            <?php }}?>
                        <tr align="center">
                            <td><input type="submit" name="update_cart" value="Update Cart"/></td>
                            <td><input type="submit" name="continue" value="Continue Shopping"/></td>
                            <td><button><a href="checkout.php" style="text-decoration:none; color:black;">Checkout</a></button></td>
                            <td><button><a href="donation.php" style="text-decoration:none; color:black;">Donate</a></button></td>
                        </tr>
                    </table>

                </form>
                <?php
                function updatecart(){
                global $con;
                $ip = getIp();
                $values = $_POST['remove'];
                if (isset($_POST['update_cart'])){
                    if(is_array($_POST['remove']))
                    {foreach ($values as $remove_id) {


                        $delete_product = "delete from cart WHERE p_id='$remove_id' AND ip_add='$ip'";
                        $run_delete = mysqli_query($con, $delete_product);
                        if ($run_delete) {
                            echo "<script>window.open('cart1.php','_self')</script>";

                        }
                    }
                    }
                }
                if(isset($_POST['continue'])){
                    echo "<script>window.open('index.php','_self')</script>";
                }

                }
                echo @$up_cart =updatecart();
              //  echo $_SESSION['qty'];
                ?>

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