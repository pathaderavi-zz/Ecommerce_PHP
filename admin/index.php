<?php
session_start();
if(!isset($_SESSION['admin'])){
    ?><script>alert('Please Login First.')</script>
    <script>window.open('adminlogin.php')</script>
    <?php
exit();
}


?>


<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Frameset//EN"
"http://www.w3.org/TR/html4/frameset.dtd">
<html>
<head>
<title>Frame page</title>
<style type="text/css">

</style>
</head>


<frameset rows="90,*,90">
<frame name="top-frame" scrolling="no" noresize target="right_frame" src="top.php" frameborder="0">
<frameset cols="15%,85%">
<frame src="left.php" frameborder="0">
<frame src="right.php" name="main_page" frameborder="0">
</frameset>
<noframes>





</html>