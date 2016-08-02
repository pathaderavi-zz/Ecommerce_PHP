<?php
include "includes/db.php";
$user = $_SESSION['customer_email'];
$get_customer = "select * from customers where customer_email='$user'";

$run_customer = mysqli_query($con,$get_customer);
$row_customer = mysqli_fetch_array($run_customer);

$name = $row_customer['customer_name'];
$email = $row_customer['customer_email'];
$pass = $row_customer['customer_pass'];
$country = $row_customer['customer_country'];
$city = $row_customer['customer_city'];
$contact = $row_customer['customer_contact'];
$address = $row_customer['customer_address'];
$get_id ="select customer_id from customers where customer_email='$user'";
$run_id = mysqli_query($con,$get_id);
$row_id = mysqli_fetch_array($run_id);
$c_id = $row_id['customer_id'];

?>
            <form method="post" action="" enctype="multipart/form-data" >
                <table align="center" width="750">
                    <tr>
                        <td align="center"><h2> Update Your Account</h2></td>
                    </tr>
                    <tr>
                        <td align="right">Your Name</td>
                        <td><input type="text" name="c_name" value="<?php echo $name;?>" required/></td>
                    </tr>
                    <tr>
                        <td align="right">Email
                        </td>
                        <td><input type="text" name="c_email" value="<?php echo $email;?>"required/></td>
                    </tr>
                    <?php
                    /*echo $c_id;echo $customer_id;
                    <tr>
                        <td align="right">Password</td>
                        <td><input type="password" name="c_pass" required/></td>
                    </tr>*/?>
                    <tr>
                        <td align="right">Country</td>
                        <td>
                            <select name="c_country" disabled>
                                <option><?php echo $country;?></option>
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
                        <td><input type="text" name="c_city" value="<?php echo $city;?>" required/></td>
                    </tr>
                    <tr>
                        <td align="right">Customer Contact</td>
                        <td><input type="text" name="c_contact" value="<?php echo $contact;?>"equired/></td>
                    </tr>
                    <tr>
                        <td align="right">Customer Address</td>
                        <td><input cols="20" rows="10" name="c_address" value="<?php echo $address;?>"required></input></td>
                    </tr>
                    <tr>
                        <td align="right"><input type="submit" value="Update Information" name="register"></td>
                        <td></td>
                    </tr>
                </table>
            </form>






<?php

#echo $c_id;
if (isset($_POST['register'])){
    $ip = getIp();
    $c_name = $_POST['c_name'];
    $c_email = $_POST['c_email'];
    $c_pass = $_POST['c_pass'];
    $c_country = $_POST['c_country'];
    $c_city = $_POST['c_city'];
    $c_contact = $_POST['c_contact'];
    $c_address = $_POST['c_address'];
    echo  $c_name;
    #$customer_id = $c_id;
    $update_c = "update customers set customer_name='$c_name', customer_email='$c_email',customer_city='$c_city',customer_contact='$c_contact',customer_address='$c_address' where customer_id='$c_id'";
    #$run_update = mysqli_query($con,$update_c);
    if ($con->query($update_c) === TRUE) {
        echo "<script>alert('Your account has been updated.')</script>";
        echo "<script>window.open('my_account.php','_self')</script>";
    } else {
        echo "<script>alert('Error.')</script> ";
    }
   /* if($run_update){
        echo "<script>alert('Your account has been updated.')</script>";
        echo "<script>window.open('my_account.php','_self')</script>";
    }*/
}