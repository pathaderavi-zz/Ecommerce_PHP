<?php
/**
 * Created by PhpStorm.
 * User: ravikiranpathade
 * Date: 4/23/16
 * Time: 6:43 PM
 */

$seller = $_SESSION['email'];


    ?>
    <table width="795" align="center" >


        <tr align="center">
            <td colspan="6"><h2>View All Products Here</h2></td>
        </tr>

        <tr align="center" bgcolor="skyblue">
            <th>S.N</th>
            <th>Title</th>
            <th>Image</th>
            <th>Price</th>
            <th>Edit</th>
            <th>Delete</th>
        </tr>
        <?php
        include("includes/db.php");

        $get_pro = "select * from products where seller='$seller '";

        $run_pro = mysqli_query($con, $get_pro);

        $i = 0;

        while ($row_pro=mysqli_fetch_array($run_pro)){

            $pro_id = $row_pro['product_id'];
            $pro_title = $row_pro['product_title'];
            $pro_image = $row_pro['product_image'];
            $pro_price = $row_pro['product_price'];
            $i++;

            ?>
            <tr align="center">
                <td><?php echo $i;?></td>
                <td><?php echo $pro_title;?></td>
                <td><img src="product_images/<?php echo $pro_image;?>" width="50" height="50"/></td>
                <td><?php echo $pro_price;?></td>
                <td><a href="edit_pro.php?edit_pro=<?php echo $pro_id; ?>">Edit</a></td>
                <td><a href="delete_pro.php?delete_pro=<?php echo $pro_id;?>">Delete</a></td>

            </tr>
        <?php } ?>
    </table>

