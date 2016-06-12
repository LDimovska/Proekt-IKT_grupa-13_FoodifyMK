<?php
session_start();
include_once("config.php");
?>
<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>Кошничка</title>
	<link href="../css/style_cart.css" rel="stylesheet" type="text/css">
	<meta charset="utf-8">
	<link rel="icon" href="../images/favicon.ico">
	<link rel="shortcut icon" href="../images/favicon.ico" />
	<link rel="stylesheet" href="../css/style.css">


	<!--[if lt IE 8]>
	<div style=' clear: both; text-align:center; position: relative;'>
		<a href="http://windows.microsoft.com/en-US/internet-explorer/products/ie/home?ocid=ie6_countdown_bannercode">
			<img src="http://storage.ie6countdown.com/assets/100/images/banners/warning_bar_0000_us.jpg" border="0" height="42" width="820" alt="You are using an outdated browser. For a faster, safer browsing experience, upgrade for free today." />
		</a>

	<![endif]-->
	<!--[if lt IE 9]>
	<script src="../js/html5shiv.js"></script>
	<link rel="stylesheet" media="screen" href="../css/ie.css">
	<![endif]-->
	<!--[if lt IE 10]>
	<script src="../js/html5shiv.js"></script>
	<link rel="stylesheet" media="screen" href="../css/ie1.css">
	<![endif]-->

</head>
<body>
<header>
	<div class="container_12">
		<div class="grid_12">
			<div class="socials">
				<a href="#"></a>
				<a href="#"></a>
				<a href="#"> </a>
				<a href="#" class="last"></a>
			</div>
			<h1><a href="../index.html"><img src="../images/logo.png" alt="Foodify MK"></a> </h1>

			<div class="clear"></div>
		</div>
	</div>
</header>

<div class="content">
	<div class="container_12">

		<div class="grid_12">

			<h1 align="center">View Cart</h1>
			<div class="cart-view-table-back">
				<form method="post" action="cart_update.php">
					<table width="100%"  cellpadding="6" cellspacing="0"><thead><tr><th>Колку</th><th>Име</th><th>Цена</th><th>Вкупно</th><th>Избриши</th></tr></thead>
						<tbody>
						<?php
						if(isset($_SESSION["cart_products"])) //check session var
						{
							$total = 0; //set initial total value
							$b = 0; //var for zebra stripe table
							foreach ($_SESSION["cart_products"] as $cart_itm)
							{
								//set variables to use in content below
								$product_name = $cart_itm["product_name"];
								$product_qty = $cart_itm["product_qty"];
								$product_price = $cart_itm["product_price"];
								$product_code = $cart_itm["product_code"];
								$subtotal = ($product_price * $product_qty); //calculate Price x Qty

								$bg_color = ($b++%2==1) ? 'odd' : 'even'; //class for zebra stripe
								echo '<tr class="'.$bg_color.'">';
								echo '<td><input type="text" size="2" maxlength="2" name="product_qty['.$product_code.']" value="'.$product_qty.'" /></td>';
								echo '<td>'.$product_name.'</td>';
								echo '<td>'.$product_price.$currency.'</td>';
								echo '<td>'.$subtotal.$currency.'</td>';
								echo '<td><input type="checkbox" name="remove_code[]" value="'.$product_code.'" />Избриши</td>';
								echo '</tr>';

								$total = ($total + $subtotal); //add subtotal to total var
							}
							echo '<td colspan="5" align="right">Внеси купон: <input type="text" maxlength="6" size="6" name="discount"></td>';
							$discount=0;
//							$word=$_GET['discount'];
//							if($word=='popust'){
//								$discount=20;
//							}
							$grand_total = $total; //grand total including shipping cost
							foreach($taxes as $key => $value){ //list and calculate all taxes in array
								$tax_amount     = round($total * ($value / 100));
								$tax_item[$key] = $tax_amount;
								$grand_total    = $grand_total + $tax_amount;  //add tax val to grand total
							}
							$grand_total-=$discount;

							$list_tax       = '';
							foreach($tax_item as $key => $value){ //List all taxes
								$list_tax .= $key. ': '. sprintf("%01.2f", $value).$currency.'<br />';

							}
//							$shipping_cost = ($shipping_cost)?'Shipping Cost : '.sprintf("%01.2f", $shipping_cost).$currency.'<br />':'';
						}

						?>
						<tr><td colspan="5"><span style="float:right;text-align: right;"><?php echo $list_tax; ?>Вкупно: <?php echo sprintf("%01.2f", $grand_total)." ден.";?></span></td></tr>
						<tr><td colspan="5"><a href="index-4%20-%20Copy.php" class="button">Купувај уште</a><button type="submit" class="button">Ажурирај</button></td></tr>
						</tbody>
					</table>
					<input type="hidden" name="return_url" value="<?php
					$current_url = urlencode($url="http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']);
					echo $current_url; ?>" />
				</form>
			</div>

		</div>
	</div>
</div>
<footer>
	<div class="container_12">
		<div class="grid_6 prefix_3">
			<a href="index.html" class="f_logo"><img src="../images/f_logo.png" alt="Foodify MK"><span></span></a>
			<div class="copy">
				Website дизајниран од Тим 13
				<br>
				Управување на ИКТ
				<br>
				&copy; 2016
		</div>
	</div>
</footer>
<script>
	$(document).ready(function(){
		$(".bt-menu-trigger").toggle(
			function(){
				$('.bt-menu').addClass('bt-menu-open');
			},
			function(){
				$('.bt-menu').removeClass('bt-menu-open');
			}
		);
	})
</script>
</body>
</html>
