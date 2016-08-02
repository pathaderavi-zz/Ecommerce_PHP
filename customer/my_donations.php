<?php
/**
 * Created by PhpStorm.
 * User: ravikiranpathade
 * Date: 4/24/16
 * Time: 3:40 AM
 */

?>
<table width="760" align="center" >


    <tr align="center">
        <td colspan="6"><h2>Your Donation details:</h2></td>
    </tr>

    <tr align="center" bgcolor="skyblue">
        <th>S.N</th>
        <th>Product (S)</th>
        <th>Quantity</th>
        <th>Invoice No</th>
        <th>Order Date</th>
        <th>Donated To</th>
    </tr>
    <?php
    session_start();
    include("includes/db.php");
    $userid = $_SESSION['customer_email'];
    $get_cid = "select customer_id from customers WHERE customer_email='$userid'";
    
    $run_cid = mysqli_query($con, $get_cid);
    $row_cid = mysqli_fetch_row($run_cid);
    
  
    
    $get_order = "select * from donation WHERE c_id='$row_cid[0]'";


    $run_order = mysqli_query($con, $get_order);


    while ($row_order=mysqli_fetch_array($run_order)){

        #$order_id = $row_order['product_id'];
        $qty = $row_order['qty'];
        $pro_id = $row_order['p_id'];
        $invoice_no = $row_order['invoice_number'];
        $order_date = $row_order['order_date'];
        $status = $row_order['donated_to'];
        $i++;

        $get_pro = "select * from products where product_id='$pro_id'";
        $run_pro = mysqli_query($con, $get_pro);

        $row_pro=mysqli_fetch_array($run_pro);

        $pro_image = $row_pro['product_image'];
        $pro_title = $row_pro['product_title'];

        ?>
        <tr align="center">
            <td><?php echo $i;?></td>
            <td>
                <?php echo $pro_title;?>
                <img src="http://176.32.230.51/eschoppes.com/admin_area/product_images/<?php echo $pro_image;?>" width="50" height="50"/>
            </td>
            <td><?php echo $qty;?></td>
            <td><?php echo $invoice_no;?></td>
            <td><?php echo $order_date;?></td>
            <td><?php echo $status;?></td>

        </tr>
    <?php } ?>
</table>