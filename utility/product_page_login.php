<?php
	include("../dataconn/dataconn.php");
	if(!isset($_SESSION))
	{
		session_start();
	}
	$user_id = $_SESSION['user_id'];

  require("../dataconn/page_load.php");

  //product content
  $product_id = $_REQUEST['product_id'];
  $product_sql = "select * from product where product_id = ".$product_id." ";
  $product_exe = mysql_query($product_sql);
  $product_row = mysql_num_rows($product_exe);
  $product_image = "";
  do {
    $product_image = $product_row['Product_Pic'];
    $product_name = $product_row['Product_Name'];
    $product_price = $product_row['Product_Price'];
    $product_rent_price = $product_row['Product_Rent_Price'];
    $product_describe = $product_row['Product_Description'];
  }while($product_row = mysql_fetch_array($product_exe));
?>
<!DOCTYPE html>
<html>
<head>
	<title>Sales of Point System for Video and Audio shop
	</title>
	<link rel="icon" href="images/favicon.png" type="image/x-icon" sizes="16x16">
	<link href="../css/main.css" rel="stylesheet" type="text/css" />
  <link href="../css/product.css" rel="stylesheet" type="text/css" />
	<link rel="stylesheet" href="../css/font/elegantlux/elegant_luxmager.css" type="text/css" charset="utf-8" />
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
	<script src="../js/main.js"></script>
	<script>
	url_quantity_val = "";
	function minus_function(){
		quantity_value = parseInt(document.getElementById('product_quantity_value').value);
		if(quantity_value == 1){
			document.getElementById('product_quantity_value').value=quantity_value;
			document.getElementById('quantity_value_hidden_js').value=quantity_value;
		}
		else {
			quantity_value = quantity_value-1;
			document.getElementById('product_quantity_value').value=quantity_value;
			document.getElementById('quantity_value_hidden_js').value=quantity_value;
		}
	}
	function plus_function(){
		quantity_value = parseInt(document.getElementById('product_quantity_value').value);
		if(quantity_value == 5){
			document.getElementById('product_quantity_value').value=quantity_value;
			document.getElementById('quantity_value_hidden_js').value=quantity_value;
		}
		else {
			quantity_value = quantity_value+1;
			document.getElementById('product_quantity_value').value=quantity_value;
			document.getElementById('quantity_value_hidden_js').value=quantity_value;
		}
	}
	</script>
</head>
<body>
	<div class="cont section group">

		<?php include('../utility/user_header.php');?>
		<?php include("../utility/navigation.php");?>
		<div class="cont_element col span_2_of_2 ">
			<div id="" class="product_content_div">
				<div class="col span_1_of_5 " style="">
					<?php
						if(isset($_POST['buy_btn'])){
							$buy_url = "../user/buy_product.php";
						}
					?>
					<img src="<?php echo $product_image;?>" id="" class="product_picture"/>
					<form action="../user/buy_product.php" method="POST">
	          <input type="submit" id="" class="product_btn buy_btn" name="buy_btn" value="BUY">
						<input type="hidden" id="" name="product_id" value="<?php echo $product_id;?>">
						<input type="hidden" id="quantity_value_hidden_js" name="quantity_value_hidden" value="1">
					</form>
					<form>
						<input type="submit"  id="" class="product_btn rent_btn" value="RENT">
						<input type="hidden" id="hidden_product_id" name="quantity_value_hidden" value="<?php echo $product_id;?>">
					</form>
				</div>
				<div class="col span_4_of_5 product_content_name" style="">
					<?php echo $product_name; ?>
				</div>

				<div class="col span_4_of_5 product_content_price" style="">
					<span id="" class="buy_title">Buy :</span> RM <?php echo $product_price; ?>
					<span id="" class="rent_title"> / Rent :</span> RM <?php echo $product_rent_price; ?>
				</div>
				<div class="col span_4_of_5 product_content_quantity_div" style="">
					<div id="" class="product_content_quantity_function_title">Quantity</div>
					<div id="" class="product_content_quantity_function_operation">

						<input type="button" name="quantity_minus" value="-" onclick="minus_function()" class="minus_function_char">
						<input type="number" id="product_quantity_value" name="product_quantity_value" value="1" disabled="disabled" class="quantity_value_input"/>
						<input type="button" name="quantity_plus" value="+" onclick="plus_function()" class="plus_function_char">
					</div>
				</div>
				<div class="col span_4_of_5 product_content_description" style="">
					<?php echo $product_describe; ?>
				</div>
			</div>

		</div>
		<?php include("../utility/footer.php");?>

	</div>
</body>
</html>
