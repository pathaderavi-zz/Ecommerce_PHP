<?php
/**
 * Created by PhpStorm.
 * User: ravikiranpathade
 * Date: 4/19/16
 * Time: 4:49 AM
 */
?>
<html>
<div>
    <h2>Pay now with Paypal:</h2>
    <?php
    include ("includes/db.php");
    $total = 0;

    global $con;

    $ip = getIp();

    $sel_price = "select * from cart where ip_add='$ip'";

    $run_price = mysqli_query($con, $sel_price);

    
   
  $total = $_SESSION['total_change'];

    ?>
    <form action="https://www.sandbox.paypal.com/cgi-bin/webscr" method="post">

        <!-- Identify your business so that you can collect the payments. -->
        <input type="hidden" name="business" value="rpathade@albany.edu">

        <!-- Specify a Buy Now button. -->
        <input type="hidden" name="cmd" value="_xclick">

        <!-- Specify details about the item that buyers will purchase. -->
        <input type="hidden" name="item_name" value="<?php echo "ESCHOPPE";?>">
        <input type="hidden" name="amount" value="<?php echo $total;?>">
        <input type="hidden" name="currency_code" value="USD">
        <input type="hidden" name="quantity" value="<?php echo $qty;?>">
        <input type="hidden" name="item_number" value="<?php echo $pro_id;?>">

        <input type="hidden" name="return" value="paypal_success.php"/>
        <input type="hidden" name="cancel_return" value="payment_cancel.php"/>

        <!-- Display the payment button. -->
        <input type="image" src="https://www.sandbox.paypal.com/en_US/i/btn/btn_buynowCC_LG.gif"
               border="0" name="submit" alt="PayPal - The safer, easier way to pay online!">
        <img alt="" src="https://www.sandbox.paypal.com/en_US/i/scr/pixel.gif"
             width="1" height="1">
    </form>

</div>
</html>