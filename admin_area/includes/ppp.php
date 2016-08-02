<!DOCTYPE html>

    <html>
        <head>
                <title>
                    Upload Image
                </title>
            <body>
            <form action="ppp.php" method="post" enctype="multipart/form-data">
                <label>Upload Image</label>
                <input type="file" name="image"><br>
                <input type="submit" value="Upload" name="upload">

            </form>

            </body>
        </head>
    </html>
<?php

        if(isset($_POST['upload'])){
                            $name = $_FILES['image']['name'];
                            $tmp = $_FILES['image']['tmp_name'];
            if($name){
                move_uploaded_file($tmp,"test/$name");
            }else{
                echo "Cant";
            }
                    }
        else{
    echo  "Never";
        }


?>