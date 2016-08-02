<?php
    session_start();
include ("includes/db.php");
$seller = $_SESSION['email'];


?><!doctype html>
<html>
    <head>
        <script src="//cdn.tinymce.com/4/tinymce.min.js"></script>
        <script>tinymce.init({ selector:'textarea' });</script>
        <title>Insert Product</title>
    </head>
    <body bgcolor="#f0f8ff">
    <form action="insert_product.php" method="post" enctype="multipart/form-data">

        <table align="center" width="795" border="2" bgcolor="#fffafa">
        <tr>
            <td colspan="8" align="center"><h2>Insert New Product</h2></td>
        </tr>
        <tr>
            <td>Product Title</td>
            <td><input type="text" name="product_title" size="60" required/></td>
        </tr>
            <tr>
                <td>Product Category</td>
                <td><select name="product_cat" required>
                        <option>Select a Category</option>
                        <?php
                        $get_cats = "select * from categories";
                        $run_cats =mysqli_query($con,$get_cats);

                        while($row_cats=mysqli_fetch_array($run_cats)){
                            $cat_id = $row_cats['cat_id'];
                            $cat_title = $row_cats['cat_title'];
                            echo "<option value='".$cat_id."'>$cat_title</option> ";

                        }


                        ?>
                    </select></td>
            </tr>
            <tr>
                <td>Product Brand</td>
                <td><select name="product_brand" required>
                        <option>Select a Brand</option>
                        <?php
                        $get_brands = "select * from brands";
                        $run_brands =mysqli_query($con,$get_brands);

                        while($row_brands=mysqli_fetch_array($run_brands)){
                            $brand_id = $row_brands['brand_id'];
                            $brand_title = $row_brands['brand_title'];
                            echo "<option value='".$cat_id."'>$brand_title</option> ";


                        }
                        ?>
                    </select>
                </td>
            </tr>
            <tr>
                <td align="right"><b>Product Image:</b></td>
                <td><input type="file" name="product_image" /></td>
            </tr>
            <tr>
                <td>Product Price</td>
                <td><input type="text" name="product_price" required/></td>
            </tr>
            <tr>
                <td>Product Description</td>
                <td><textarea name="product_desc" cols="20" rows="10" ></textarea></td>
            </tr>
            <tr>
                <td>Product Keywords</td>
                <td><input type="text" name="product_keywords" size="50" required/></td>
            </tr>
            <tr align="center">
                <td colspan="8"><input type="submit" value="Submit" name="insert_post" required/></td>
                <td><?php echo $email;?></td>
            </tr>

        </table>
    </form>

    </body>
</html>


<?php
/**cart 
 * Created by PhpStorm.
 * User: ravikiranpathade
 * Date: 3/28/16
 * Time: 1:53 AM
 */




if(isset($_POST['insert_post'])){
    $product_title = $_POST['product_title'];
    $product_cat = $_POST['product_cat'];
    $product_brand = $_POST['product_brand'];
    $product_price = $_POST['product_price'];
    $product_desc = $_POST['product_desc'];
    $product_keywords = $_POST['product_keywords'];
        //to get an image
    $img = $_POST['product_image'];
    $product_image = $_FILES['product_image']['name'];
    $product_image_tmp = $_FILES['product_image']['tmp_name'];

    move_uploaded_file($product_image_tmp,"product_images/$product_image");
    //echo $img."hello";
   $insert_product = "INSERT INTO products (product_cat, product_brand, product_keywords, product_title, products_price, product_desc,product_image,seller) VALUES ('$product_cat', '$product_brand', '$product_keywords' ,'$product_title', '$product_price', '$product_desc','$product_image','$seller')";
    //echo "<br><br><br><br><br><br>".$insert_product;

    $insert_pro = mysqli_query($con,$insert_product);
    if($insert_pro){
        echo "<script>alert('Product has been inserted')</script>";
        echo "<script>window.open('http://176.32.230.51/eschoppes.com/admin_area/index.php?insert_product','_self')</script>";
    }else{

    }

}

