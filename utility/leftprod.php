<?php
	include("../dataconn/dataconn.php");
	$check_login_url = "";
	if(isset($_SESSION['user_id']) && $_SESSION['user_id']) {
		$user_id = $_SESSION['user_id'];
		$check_login_url = "../utility/product_page_login.php?u_id=".$user_id;
		$login_product="product_page_login.php";
	} else {
		$check_login_url = "../visitor/login.php";
		$login_product="product_page.php";
	}
?>
<div id="" class="new_pro_color pro_title">New Arrive
</div>
<?php
	$product_sql = "select * from product where product_status = 1";
	$product_result = mysql_query($product_sql);

	$product_check = mysql_num_rows($product_result);
	$product_name = "";
	if($product_check!=0){
		$product_row = mysql_fetch_array($product_result);
		do{
			$product_id = $product_row['Product_ID'];
			$product_name = $product_row['Product_Name'];
			$product_image = $product_row['Product_Pic'];
			$product_price = $product_row['Product_Price'];
			echo "
				<div id='' class='pro_div'>
					<div id='' class='prod_pic'>
						<a href='../utility/".$login_product."?product_id=".$product_id."' target='_blank' id='' class=''><img src='".$product_image."' id='' class='prod_pic_img'/></a>
					</div>
					<a href='../utility/".$login_product."?product_id=".$product_id."' target='_blank' id='' class='prod_name'>
					".$product_name."
					</a>
					<a href='../utility/".$login_product."?product_id=".$product_id."' target='_blank' id='' class='prod_price'>
					RM ".$product_price."
					</a>
					<a href='".$check_login_url."' class='prod_btn prod_rent'>RENT</a>
					<a href='".$check_login_url."' class='prod_btn prod_buy'>BUY</a>
				</div>
				";
		}while($product_row = mysql_fetch_array($product_result));
	}
	else {
		echo "222";
	}


		/**/

?>
