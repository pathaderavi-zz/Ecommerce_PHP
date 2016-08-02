<?php
/**
 * Created by PhpStorm.
 * User: ravikiranpathade
 * Date: 4/23/16
 * Time: 9:22 PM
 */


session_start();

session_destroy();

echo "<script>window.open('login.php?logged_out=You have logged out, come back soon!','_self')</script>";




?>