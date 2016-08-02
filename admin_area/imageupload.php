<!doctype html>



    <html>
            <form action="imageupload.php" method="post" enctype="multipart/form-data">
                <input type="file" name="file">
                <input type="submit" name="upload">

            </form>
    </html>


<?php
/**
 * Created by PhpStorm.
 * User: ravikiranpathade
 * Date: 3/28/16
 * Time: 7:41 PM
 */

if(isset($_POST['upload'])){

    $file= $_FILES['file'];
    print_r($file);


}