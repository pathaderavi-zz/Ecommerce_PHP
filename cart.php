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
            <div id="sidebar_title"></div>
           
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
                          
            <div id="products_box"  style="border-style:groove;"><?php
        $ip = getIp();

                $check_pro = "select * from cart where ip_add='$ip'";
                $run_check = mysqli_query($con,$check_pro);
                $row_cnt_cart = $run_check->num_rows;
				//echo $row_cnt_cart;
                echo "<table align=\"center\" width=\"700\" bgcolor=\"#f0f8ff\">";
                echo "<tr><td>Title</td><td>Image</td><td>Price</td><td>Delete</td><td>Qty</td></tr>";
                //$i = 0 ;
                while($array = mysqli_fetch_array($run_check)){
                    $p_id = $array['p_id'];
                    $check_pro_1 = "select * from products where product_id='$p_id'";
                    $run_check_1 = mysqli_query($con,$check_pro_1);
                    while($array1= mysqli_fetch_array($run_check_1)){

                        $pro_1 = $array1["product_image"];
                        $qty1 = $array['qty'];
                        ?><tr><td><?php echo $array1["product_title"];?></td><td><img src="admin_area/product_images/<?php echo $pro_1;?>" width="80px" height="80px"/></td></td>
                        <td><?php echo "$".$array1["products_price"];?></td>
                        <td><button><a href="cart.php?delete=<?php echo $p_id;?>">Delete</a></button></td>
                        <td><?php $pid = $array1["product_id"];?>
                            <form action="cart.php" method="get">
                                <?php $pid = $array1["product_id"];echo $qty1;?>
                                <input type="hidden" name="id" value="<?php echo $pid;?>">
                                <select name = "qty">
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>
                                    <input type="submit" name="update" value="Update">
                                </select></form>

                        </td>
                        <td>

                        </td>
                        </tr><?php
                        ?><?php

                    }



                }

                ?><?php if (isset($_GET['update'])) {echo $_POST['qty'];} ?><?php
                echo "</table>";
                echo "<table align=\"center\" width=\"700\" bgcolor=\"#f0f8ff\">";








                if (isset($_GET['update'])) {
                    $qtty = $_GET["id"];
                    $pids = $_GET["qty"];

                    $check_pro_2 = "UPDATE `cart` SET `qty`='$pids' WHERE `p_id`=".$qtty;

                    $run_check_2 = mysqli_query($con,$check_pro_2);
                    echo "<script>window.open('cart.php','_self')</script>";

                }?>
                <?php
                $r = $_SESSION['customer_email'];
                //echo $r;
                $sql_toid = "SELECT customer_id from customers where customer_email='$r'";
                $run_toid = mysqli_query($con,$sql_toid);
                $row_toid = mysqli_fetch_row($run_toid);

                $toid = $row_toid[0];



                $sql_rew =  "SELECT SUM(amount) FROM payments where customer_id='$toid'";
                $run_rew = mysqli_query($con,$sql_rew);
                $row_rew = mysqli_fetch_row($run_rew);
                $res_rew = $row_rew[0]/20;

                $sel_erew = "select points from customers where customer_id='$toid'";
                $run_erew = mysqli_query($con,$sel_erew);
                $row_erew = mysqli_fetch_row($run_erew);
                $res_erew = $row_erew[0];
                $av_rew = $res_rew-$res_erew;
                $av_rew = round($av_rew, 2);
                $_SESSION['rewards_av']=$av_rew;
				if($row_cnt_cart>=1){
                if(!isset($_GET["rw"])){
                ?>
                <tr><td>Available Rewards</td><td><?php echo $av_rew;?></td><td><a href="cart.php?rw=<?php echo $av_rew;?>">Redeem</a></td>
                    <?php }
                    if(isset($_GET["rw"])){ ?>
                        <td><a href="cart.php">Cancel Redeem</a></td>
                    <?php } }?>
                </tr>
                <tr><td></td><td>Total= $<?php

                        $check_pro_4 = "select * from cart where ip_add='$ip'";
                        //echo "select * from cart where ip_add='$ip'";
                        $run_check_4 = mysqli_query($con,$check_pro_4);
                        

                        while($array3 = mysqli_fetch_array($run_check_4)){
                            $arrays[] = $array3["p_id"];
                            // if($array3["qty"]==0){
                            $arrays1[] = $array3["qty"];
                            //echo "<br>".$array3["qty"];
                             
                        }
                        $row_cnt = $run_check_4->num_rows;
                       // echo "<br".$row_cnt;
                        if($row_cnt!=0) {
                            $check_pro_5 = "select * from products where product_id IN (" . implode(',', array_map('intval', $arrays)) . ")";
                            //echo "<br>".$check_pro_4;
                         $run_check_5 = mysqli_query($con, $check_pro_5);
                            $price_array = array();
                            
                            foreach ($run_check_4 as $row) {
                                $price_array[] = $row['products_price'];
                               //echo $run_check_4['products_price'];
                               
                            }
                            while($array4 = mysqli_fetch_array($run_check_5)){
                            
                            $arrays2[] = $array4["products_price"];
                            //echo $array4["products_price"];
                            }
                            
                            $ex = array(1, 2);
                            $ey = array(3, 4);
                            for ($i = 0; $i < count($ex); $i++) {

                                $result[] = $arrays1[$i] * $arrays2[$i];
                               

                            }

                            $total = array_sum($result);
                            
                            $_SESSION['total_change']=$total;
                            if (isset($_GET["rw"])) {
                                $rew = $_GET["rw"];

                                $total = $total - $rew;
                            
                                $_SESSION['total_change']=$total;
                            }
                        }
                        echo $total;


                        ?></td></tr>

                <?php
                if(isset($_GET["delete"])){
                    $del_id = $_GET["delete"];
                    $delete_product = "delete from cart WHERE p_id='$del_id' AND ip_add='$ip'";
                    $run_delete = mysqli_query($con, $delete_product);
                    echo "<script>window.open('cart.php','_self')</script>";
                }




                ?>
                <tr>
                    <td><button><a href="index.php" style="text-decoration:none; color:black;">Continue Shopping</a></button></td>
                    <td><button><a href="checkout.php?rws=<?php echo $total;?>" style="text-decoration:none; color:black;">Checkout</a></button></td>
                    <td><button><a href="donate.php?rw=<?php echo $total;?>" style="text-decoration:none; color:black;">Donate</a></button></td>
                </tr></table>
</div>

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