<?php
/**
 * Created by PhpStorm.
 * User: ravikiranpathade
 * Date: 4/23/16
 * Time: 4:13 PM
 */
$user1 = $_SESSION['customer_email'];

if (isset($_POST['change_pass'])){
    $current_pass=$_POST['current_pass'];
    $new_pass=$_POST['new_pass'];
    $new_pass_again=$_POST['new_pass_again'];

    $sel_pass = "select customer_pass from customers where customer_email='$user1'";
    $run_sel_pass = mysqli_query($con,$sel_pass);
    $row_sel_pas = mysqli_fetch_array($run_sel_pass);
    $row_sel_pass = $row_sel_pas['customer_pass'];
    if($new_pass!=$new_pass_again){
        echo "<script>alert('Both Passwords do not match.')</script>";
        exit();
    }

    if($row_sel_pass==$current_pass){
        $new_pw = "update customers set customer_pass='$new_pass' WHERE customer_email='$user1'";
        $run_pw = mysqli_query($con,$new_pw);
        if($run_pw){
        echo "<script>alert('Your Password has been updated.')</script>";
        echo "<script>window.open('my_account.php','_self')</script>";
    }

    }else{
        echo "<script>alert('Please enter Correct Current Password')</script>";
    }


}

?>
<h2 style="text-align: center">
Change Your Password
</h2>
<form action="" method="post" style="text-align: center">
    <br>
    <table align="center">
        <tr>
    <td><b>Enter Current Password: </b> </td><td><input type="password" name="current_pass"></td></tr>
        <tr>
   <td> <b>Enter New Password: </b> </td><td><input type="password" name="new_pass"><br></td></tr>
    <tr><td><b>Confirm New Pasword: </b></td><td><input type="password" name="new_pass_again"></td></tr>
    <tr><td><input type="submit" name="change_pass" value="Update Password"/></td></tr></table>
   </form>
