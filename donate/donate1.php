<?php

/**
 * Created by PhpStorm.
 * User: ravikiranpathade
 * Date: 4/19/16
 * Time: 4:49 AM
 */
 session_start();
?>
<html>
<div>
    <center><h2>Pay now with Paypal:</h2><center>
            <?php
            include ("includes/db.php");
            include ("functions/functions.php");
            $total = 0;

            global $con;

            $ip = getIp();

            $sel_price = "select * from cart where ip_add='$ip'";

            $run_price = mysqli_query($con, $sel_price);

            while($p_price=mysqli_fetch_array($run_price)){

                $pro_id = $p_price['p_id'];

                $pro_price = "select * from products where product_id='$pro_id'";

                $run_pro_price = mysqli_query($con,$pro_price);

                while ($pp_price = mysqli_fetch_array($run_pro_price)){

                    $product_price = array($pp_price['products_price']);
                    $product_name = $pp_price['products_title'];
                    $values = array_sum($product_price);

                    $total =$total+ $values;

                }
            }

            $get_qty = "select * from cart where p_id ='$pro_id' AND ip_add='$ip'";
            $run_qty = mysqli_query($con,$get_qty);

            $row_qty = mysqli_fetch_array($run_qty);
            $qty = $row_qty['qty'];

            if($qty==0){
                $qty=1;

            }else{
                $qty=$qty;
            } 
             $total = $_SESSION['total_change'];
             ?>
            <center>
                <form action="https://www.sandbox.paypal.com/cgi-bin/webscr" method="post" >

                    <!-- Identify your business so that you can collect the payments. -->
                    <input type="hidden" name="business" value="test2@eschoppe.com">

                    <!-- Specify a Buy Now button. -->
                    <input type="hidden" name="cmd" value="_xclick">

                    <!-- Specify details about the item that buyers will purchase. -->
                    <input type="hidden" name="item_name" value="<?php echo "Donation to ";?>">
                    <input type="hidden" name="amount" value="<?php echo $total;?>">
                    <input type="hidden" name="currency_code" value="USD">
                    <input type="hidden" name="quantity" value="<?php echo $qty;?>">
                    <input type="hidden" name="item_number" value="<?php echo $pro_id;?>">

                    <input type="hidden" name="return" value="paypal_success2.php"/>
                    <input type="hidden" name="cancel_return" value="payment_cancel.php"/>

                    <!-- Display the payment button. -->
                    <input type="image" src="https://www.sandbox.paypal.com/en_US/i/btn/btn_buynowCC_LG.gif"
                           border="0" name="submit" alt="PayPal - The safer, easier way to pay online!">
                    <img alt="" src="https://www.sandbox.paypal.com/en_US/i/scr/pixel.gif"
                         width="1" height="1">
                </form>
            </center>
</div>
</html>