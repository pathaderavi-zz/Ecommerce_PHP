<?php
/**
 * Created by PhpStorm.
 * User: ravikiranpathade
 * Date: 4/23/16
 * Time: 11:00 PM
 */

session_start();

 ?>
<html>
    <head>
        <title>
            Payment Successful.
        </title>
    </head>
<body>
<h2>Welcome <?php echo $_SESSION['customer_email']?></h2>
<h3>Your Payment was successfull.</h3>
<h3><a href="http://176.32.230.51/eschoppes.com/customer/my_account.php">Your Account</h3>

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
    //echo $pro_id."here";

    $pro_price = "select * from products where product_id='$pro_id'";
    $product_id =$pp_price['product_id'];

    $run_pro_price = mysqli_query($con,$pro_price);

    while ($pp_price = mysqli_fetch_array($run_pro_price)){

        $product_price = array($pp_price['products_price']);
        $product_name = $pp_price['products_title'];
        $values = array_sum($product_price);

        $total =$total+ $values;

    }
}


//for quantity

$get_qty = "select * from cart where p_id ='$pro_id' AND ip_add='$ip'";
$run_qty = mysqli_query($con,$get_qty);

$row_qty = mysqli_fetch_array($run_qty);
$qty = $row_qty['qty'];

if($qty==0){
    $qty=1;

}else{
    $qty=$qty;
    $total = $total*$qty;
}

$user = $_SESSION['customer_email'];
$get_c = "select * from customers where customer_email='$user'";

$run_c = mysqli_query($con,$get_c);
$row_c = mysqli_fetch_array($run_c);
$c_id = $row_c['customer_id'];
$amount = $_GET['amt'];
$currency = $_GET['cc'];
$trx_id = $_GET['tx'];

$invoice = mt_rand(0,100000);
//echo $invoice;


$cust_id = $_SESSION['cust_id'];
if($_SESSION['rewards_av']!=0){
$rew_here = $_SESSION['rewards_av'];
//echo $rew_here;
$rew_p = "UPDATE customers SET points = points +$rew_here WHERE customer_id =$cust_id";
echo $rew_p;
$run_payments = mysqli_query($con,$rew_p);
unset($_SESSION['rewards_av']);
}
    
$sel_price1 = "select * from cart where ip_add='$ip'";

$run_price1 = mysqli_query($con, $sel_price);

while($p_price1=mysqli_fetch_array($run_price1)){

    $pro_id1 = $p_price1['p_id'];

$insert_payments = "insert into payments (amount,customer_id,product_id,trx_id,currency,payment_date) VALUES ('$amount','$c_id','$pro_id','$trx_id','$currency', NOW())";
$run_payments = mysqli_query($con,$insert_payments);
$insert_donation = "insert into donation (p_id ,c_id,invoice_number,qty,order_date,donated_to) VALUES ('$pro_id1','$c_id','$invoice','$qty', NOW(),'Modest Needs Foundation')";
$run_donation = mysqli_query($con,$insert_donation);
//echo $insert_donation;
}
$empty_cart = "delete from cart where ip_add='$ip'";
$run_cart = mysqli_query($con,$empty_cart);
if ($amount==$total){
    echo "<h2>Welcome</h2>".$_SESSION['customer_email']."Your payment was successfull.<br>";
    echo "<a href='http://176.32.230.51/eschoppes.com/customer/my_account.php'>Go to Your Account</a>";
}
?>
    </body>

</html>
