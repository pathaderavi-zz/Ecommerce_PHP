<?php
/**
 * Created by PhpStorm.
 * User: ravikiranpathade
 * Date: 3/31/16
 * Time: 11:55 AM
 */



session_start();
session_destroy();

echo "<script>window.open('index.php','_self')</script>";

