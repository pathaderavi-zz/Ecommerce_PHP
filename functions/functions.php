<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.1/css/font-awesome.min.css">
        <link rel="stylesheet" href="styles/style.css" media="all">
        
<?php
/**
 * Created by PhpStorm.
 * User: ravikiranpathade
 * Date: 3/28/16
 * Time: 1:15 AM
 */



$con = mysqli_connect("localhost","cl60-eschoppe","root","cl60-eschoppe");

$total = 0;

function getCats(){
    global $con;

    $get_cats = "select * from categories";
    $run_cats =mysqli_query($con,$get_cats);

    while($row_cats=mysqli_fetch_array($run_cats)){
        $cat_id = $row_cats['cat_id'];
        $cat_title = $row_cats['cat_title'];
        echo "<li><a href='index.php?cat=$cat_id'>$cat_title</a> ";

    }

}

function getBrands(){
    global $con;

    $get_brands = "select * from brands";
    $run_brands =mysqli_query($con,$get_brands);

    while($row_brands=mysqli_fetch_array($run_brands)){
        $brand_id = $row_brands['brand_id'];
        $brand_title = $row_brands['brand_title'];
        echo "<li><a href='index.php?brand=$brand_id'>$brand_title</a> ";
    }

}
/*
function getPro()
{
    global $con;
    $get_pro = "select * from products ORDER by RAND() LIMIT 0,6";
    $run_pro = mysqli_query($con, $get_pro);

    while ($row_pro = mysqli_fetch_array($run_pro)) {
        $pro_id = $row_pro['product_id'];
        $pro_cat = $row_pro['product_cat'];
        $pro_brand = $row_pro['product_brand'];
        $pro_title = $row_pro['product_title'];
        $pro_price = $row_pro['products_price'];
        $pro_image = $row_pro['product_image'];
        //$pro_id = $row_pro['product_id'];


        echo "
        <div id='single_product'>
        <h3>$pro_title</h3>
        <img src='admin_area/product_images/$pro_image' width='180px' height='180px'/>
        <p><b>$ $pro_price</b></p>
        <a href='details.php?pro_id=$pro_id'>View Product</a>
        <a href='index.php'><button style='float:right'> Add to Cart</button></a>
             
        </div>
        
        ";
    }
*/
    function getPro()
    {
        if (!isset($_GET['cat'])) {
            if (!isset($_GET['brand'])) {
                global $con;
                $get_pro = "select * from products ORDER by RAND() LIMIT 0,6";
                $run_pro = mysqli_query($con, $get_pro);

                while ($row_pro = mysqli_fetch_array($run_pro)) {
                    $pro_id = $row_pro['product_id'];
                    $pro_cat = $row_pro['product_cat'];
                    $pro_brand = $row_pro['product_brand'];
                    $pro_title = $row_pro['product_title'];
                    $pro_price = $row_pro['products_price'];
                    $pro_image = $row_pro['product_image'];
					$pro_rating = $row_pro['product_rating'];
                    //$pro_id = $row_pro['product_id'];


                    echo "
        <div id='single_product'>
        <h3>$pro_title</h3>
        <img src='admin_area/product_images/$pro_image' width='180px' height='180px'/>
        <p><b>$ $pro_price</b></p>
        <a href='details.php?pro_id=$pro_id'>View Product</a>
        <a href='index.php?add_cart=$pro_id'><button style='float:right'> Add to Cart</button></a>
        ";
		
		echo "<p style='text-align:center;clear:both;display:block;margin-top:10px;'>Rating: ";
			
			
			
			$x=1;
			
			while($x <= $pro_rating) {
				
				echo '<i class="fa fa-star" aria-hidden="true"></i>';
				$x++;
		
			} 
			
			$y = 5 - $pro_rating;
			
			while($y > 0){
						
				echo '<i class="fa fa-star-o" aria-hidden="true"></i>';
				
				$y = $y-1;
					
			}
			
			echo "<p>";
			
			echo "</div>";
		
                }
            }
        }


}
function getCatPro()
{
    if (isset($_GET['cat'])) {
        $cat_id = $_GET['cat'];

            global $con;
            $get_cat_pro = "select * from products where product_cat ='$cat_id'";
            $run_cat_pro = mysqli_query($con, $get_cat_pro);
            $count_cats = mysqli_num_rows($run_cat_pro);
            if($count_cats==0){
                echo "<h2 style='padding: 20px'>There are no products in this Category.</h2>";
            }
            while ($row_cat_pro = mysqli_fetch_array($run_cat_pro)) {
                $pro_id = $row_cat_pro['product_id'];
                $pro_cat = $row_cat_pro['product_cat'];
                $pro_brand = $row_cat_pro['product_brand'];
                $pro_title = $row_cat_pro['product_title'];
                $pro_price = $row_cat_pro['products_price'];
                $pro_image = $row_cat_pro['product_image'];
                //$pro_id = $row_pro['product_id'];
                echo "
        <div id='single_product'>
        <h3>$pro_title</h3>
        <img src='admin_area/product_images/$pro_image' width='180px' height='180px'/>
        <p><b>$ $pro_price</b></p>
        <a href='details.php?pro_id=$pro_id'>View Product</a>
       <a href='index.php?add_cart=$pro_id'><button style='float:right'> Add to Cart</button></a>
             
        </div>
        
        ";
            }

        }



}
function getBrandPro()
{
    if(isset($_GET['brand'])) {
        $cat_id = $_GET['brand'];

        global $con;
        $get_brand_pro = "select * from products where product_brand ='$brand_id'";
        $run_brand_pro = mysqli_query($con, $get_brand_pro);
        $count_brands = mysqli_num_rows($run_brand_pro);
        if($count_brands==0){
            echo "<h2 style='padding: 20px'>There are no products with this Brand.</h2>";
        }
        while ($row_brand_pro = mysqli_fetch_array($run_brand_pro)) {
            $pro_id = $row_brand_pro['product_id'];
            $pro_cat = $row_brand_pro['product_cat'];
            $pro_brand = $row_brand_pro['product_brand'];
            $pro_title = $row_brand_pro['product_title'];
            $pro_price = $row_brand_pro['products_price'];
            $pro_image = $row_brand_pro['product_image'];
            //$pro_id = $row_pro['product_id'];
            echo "
        <div id='single_product'>
        <h3>$pro_title</h3>
        <img src='admin_area/product_images/$pro_image' width='180px' height='180px'/>
        <p><b>$ $pro_price</b></p>
        <a href='details.php?pro_id=$pro_id'>View Product</a>
        <a href='index.php'><button style='float:right'> Add to Cart</button></a>
             
        </div>
        
        ";
        }

    }
}

function getIp() {
    $ip = $_SERVER['REMOTE_ADDR'];

    if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
        $ip = $_SERVER['HTTP_CLIENT_IP'];
    } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
        $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
    }

    return $ip;
}


function cart(){
    global $con;

    if(isset($_GET['add_cart'])){
            $ip = getIp();
            $pro_id = $_GET['add_cart'];
            $check_pro = "select * from cart where ip_add='$ip' AND p_id='$pro_id'";
            $run_check = mysqli_query($con,$check_pro);
        if(mysqli_num_rows($run_check)>0){
            echo "";
        }else{
            $insert_pro = "insert into cart(p_id,ip_add) values('$pro_id','$ip')";
            $run_pro = mysqli_query($con,$insert_pro);

        }
        }


}

function total_items(){

    global $con;
    if(isset($_GET['add_cart'])){


        $ip = getIp();
        $get_items = "select * from cart where ip_add='$ip'";
        $run_items = mysqli_query($con,$get_items);
            $count_items = mysqli_num_rows($run_items);{

            }
    }else{
        $ip = getIp();
        $get_items = "select * from cart where ip_add='$ip'";
        $run_items = mysqli_query($con,$get_items);
        $count_items = mysqli_num_rows($run_items);
    }
echo $count_items;

}
function total_price(){

    $total = 0;

    global $con;

    $ip = getIp();{

    $sel_price = "select * from cart where ip_add='$ip'";

    $run_price = mysqli_query($con, $sel_price);

    while($p_price=mysqli_fetch_array($run_price)){

        $pro_id = $p_price['p_id'];

        $pro_price = "select * from products where product_id='$pro_id'";

        $run_pro_price = mysqli_query($con,$pro_price);

        while ($pp_price = mysqli_fetch_array($run_pro_price)){

            $product_price = array($pp_price['products_price']);

            $values = array_sum($product_price);

            $total =$total+ $values;
            $r = $_SESSION['customer_email'];
            #echo $r;
            $sql_toid = "SELECT customer_id from customers where customer_email='$r'";
            $run_toid = mysqli_query($con,$sql_toid);
            $row_toid = mysqli_fetch_row($run_toid);

            $toid = $row_toid[0];
			$_SESSION['cust_id']=$toid;


            $sql_rew =  "SELECT SUM(amount) FROM payments where customer_id='$toid'";
            $run_rew = mysqli_query($con,$sql_rew);
            $row_rew = mysqli_fetch_row($run_rew);
            $res_rew = $row_rew[0]/20;

            $sel_erew = "select points from customers where customer_id='$toid'";
            $run_erew = mysqli_query($con,$sel_erew);
            $row_erew = mysqli_fetch_row($run_erew);
            $res_erew = $row_erew[0];
            $av_rew = $res_rew-$res_erew;

            if(isset($_GET['rw'])){

                #echo"<script>alert('$res_erew')</script>";
                $total= $total+ $res_erew-$res_rew;
            	 $total = round($total, 2);


            }

        }


    }

    echo "$" . $total;}


}
/*
function total_price(){     //done
    global $con;
    //global $total;
    //$total = 0;
    $ip = getIp(); //done
    $sel_price = "select * from cart where ip_add='$ip'";//done
    $run_price = mysqli_query($con,$sel_price);//done
    while($p_price=mysqli_fetch_array($run_price)){         //done

        $pro_id = $p_price['p_id'];     //done
        $pro_price = "select * from products WHERE product_id='$pro_id'";
        $run_pro_price = mysqli_query($con,$pro_price);
        while($pp_price = mysqli_fetch_array($run_pro_price))
        {
            $product_price = array($pp_price['product_price']);
            $values = array_sum($product_price);
            $total += $values;
        }

    }
    echo "$ ".$total;
    }
*/




	/* Glenndilen */
	
	function update_popularity($product_id = 0)
	{
		
		global $con;
		
		if($product_id > 0)
		{
			
			$query = "UPDATE products SET product_popularity = product_popularity + 1 WHERE product_id = " . $product_id;
            $update = mysqli_query($con, $query);
		
		}
	
	}
	
	function sortMAU($input = array(), $category_id = 0, $reverse = false)
	{

		global $con;
		
		$multipleAttributeUtility = array();
		
		if($category_id > 0){
		
			$query = "SELECT * FROM products WHERE product_cat = " . $category_id;
		
			$products = mysqli_query($con, $query);
		
			$query = 'SELECT MAX(product_popularity) AS max_value FROM products WHERE product_cat = ' . $category_id;
			if($result=mysqli_query($con, $query))
			{
				while($row=mysqli_fetch_row($result)){
					$max_popularity = $row[0];
					break;
				}	
			}
		
			$query = 'SELECT MAX(products_price) AS max_value FROM products WHERE product_cat = ' . $category_id;
			if($result=mysqli_query($con, $query))
			{
				while($row=mysqli_fetch_row($result)){
					$max_price = $row[0];
					break;
				}	
			}
		
		}else{

			$query = "SELECT * FROM products";
		
			$products = mysqli_query($con, $query);
		
			$query = 'SELECT MAX(product_popularity) AS max_value FROM products';
			if($result=mysqli_query($con, $query))
			{
				while($row=mysqli_fetch_row($result)){
					$max_popularity = $row[0];
					break;
				}	
			}
		
			$query = 'SELECT MAX(products_price) AS max_value FROM products';
			if($result=mysqli_query($con, $query))
			{
				while($row=mysqli_fetch_row($result)){
					$max_price = $row[0];
					break;
				}	
			}
		}
		
		$popularity_array = array();
		
		while($product = mysqli_fetch_array($products))
		{
            $multipleAttributeUtility[] = $product;
			
		}
		
		foreach($multipleAttributeUtility as $key => $mau){
			
			$score = array();
			
			
			if(isset($input['rating'])){
				$score['rating'] = calculateRatingScore($input['rating'], $mau['product_rating']);
			}else{
				unset($score['rating']);
			}
			
			if(isset($input['popularity'])){
				$score['popularity'] = calculatePopularityScore($input['popularity'], $mau['product_popularity'], $max_popularity);
			}else{
				unset($score['popularity']);
			}
			
			if(isset($input['price'])){
				$score['price'] = calculatePriceScore($input['price'], $mau['products_price'], $max_price);
			}else{
				unset($score['price']);
			}
		
			$v = 0;
			
			foreach($score as $i){
				$v = ((int)$v + (int)$i);
			}
		
			//print_r($v);
		
			$value = round($v / count($score));
			
			$multipleAttributeUtility[$key]['score'] = $value;
			
		}
		
		if($reverse == true){
			usort($multipleAttributeUtility, 'sortByScoreReverse');
		}else{
			usort($multipleAttributeUtility, 'sortByScore');
		}
		
		return $multipleAttributeUtility;
	
	}
	
	
	function calculateRatingScore($rating_value, $product_rating)
	{
		
		$rating_value = ($rating_value / 20);
		$score = $product_rating + ($rating_value - 5);
		if($score < 0) $score = -$score;
		$score = round($score * 20);
		return $score;
	
	}
	
	function calculatePopularityScore($popularity_value, $product_popularity, $max_popularity)
	{	
		$score = $product_popularity + ($popularity_value - $max_popularity);
		if($score < 0) $score = -$score;
		$score = round($score);
		if($score>100)$score=round(mapValue($score, 0, $max_popularity, 0, 100));
		return $score;
	}
	
	function calculatePriceScore($price_value, $product_price, $max_price)
	{	
		$score = round(mapValue($product_price, 0, $max_price, 0, 1000));
		$price = mapValue($price_value, 0, 100, 1000, 0);
		$score = $score - $price;
		if($score < 0) $score = -$score;
		$score = $score / 100;
		return $score;
	}
	
	function mapValue($value, $low1, $high1, $low2, $high2)
	{
		return ($value / ($high1 - $low1)) * ($high2 - $low2) + $low2;
	}
	
	function sortByScore($a, $b){
		return $b['score'] - $a['score'];
	}
	
	function sortByScoreReverse($a, $b){
		return $a['score'] - $b['score'];
	}

	function notify_me($customer_email, $product_id){
	
		global $con;
	
		$query = 'SELECT customer_id FROM customers WHERE customer_email = "' . $customer_email . '"';
	
		if($result=mysqli_query($con, $query))
		{
			while($row=mysqli_fetch_row($result)){
				$customer_id = $row[0];
				break;
			}
		}
		
		$query = 'SELECT * FROM notifications WHERE customer_id = ' . $customer_id . ' AND product_id = ' . $product_id;
	
		if($result=mysqli_query($con, $query))
		{
			while($row=mysqli_fetch_row($result)){
				if(isset($row[0])){
					return true;
				
				}
			}
		}
		
		return false;
	
	}
	
	function getCustomerID($email){
	
		global $con;
	
		$query = 'SELECT customer_id FROM customers WHERE customer_email = "' . $email . '"';
	
		if($result=mysqli_query($con, $query))
		{
			while($row=mysqli_fetch_row($result)){
				$customer_id = $row[0];
				break;
			}
		}
		
		return $customer_id;
		
	
	}
	
	function hasRated($customer_id, $product_id){
	
		global $con;
	
		$query = 'SELECT * FROM ratings WHERE customer_id = "' . $customer_id . '" AND product_id = "' . $product_id . '"';
	
		if($result=mysqli_query($con, $query))
		{
			while($row=mysqli_fetch_row($result)){
				if(isset($row[0])){
					return true;				
				}
			}
		}
		return false;
	
	}
	
	function getCategories(){
		
		global $con;
		$categories = array();
		$query = 'SELECT cat_id, cat_title FROM categories';
		if($result=mysqli_query($con, $query))
		{
			while($row=mysqli_fetch_row($result)){
				$categories[] = $row;
			}
		}
		
		return $categories;
	
	}