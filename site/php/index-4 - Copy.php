<?php
session_start();
include_once("config.php");


//current URL of the Page. cart_update.php redirects back to this URL
$current_url = urlencode($url="http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']);
?>

<!DOCTYPE html>
<html lang="en">
     <head>
     <title>Купувај</title>
     <link href="../css/style_cart.css" rel="stylesheet" type="text/css">
     <meta charset="utf-8">
     <link rel="icon" href="../images/favicon.ico">
     <link rel="shortcut icon" href="../images/favicon.ico" />
     <link rel="stylesheet" href="../css/style.css">

     <!--<link rel="stylesheet" href="css/login.css">-->

     <script src="../js/jquery.js"></script>
     <script src="../js/jquery-migrate-1.1.1.js"></script>
     <script src="../js/jquery.equalheights.js"></script>
     <script src="../js/jquery.ui.totop.js"></script>
     <script src="../js/jquery.easing.1.3.js"></script>
     <script>
        $(document).ready(function(){

          $().UItoTop({ easingType: 'easeOutQuart' });
        })
     </script>
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

         <style>
             .bt-menu ul li{
                 padding: 0 30px 10px 20px;
             }

             nav.bt-menu  ul li:nth-child(3){
                 margin-right: 0px;
                 padding-left: -30%;
                 margin-left: -20px;
             }

             nav.bt-menu  ul li:nth-child(4){
                 margin-right: 0px;
                 padding-left: -6px;
                 margin-left: -90px;
             }

             nav.bt-menu  ul li:nth-child(2){
                 margin-right: 8%;
                 padding-right: 10%;
             }

         </style>
     </head>
     <body  class="">

<!--==============================header=================================-->
 <header>
  <div class="container_12">
   <div class="grid_12">
    <div class="socials">
      <a href="#"></a>
      <a href="#"></a>
      <a href="#"> </a>
      <a href="#" class="last"></a>
    </div>
    <h1><a href="../index.html"><img src="../images/logo.png" alt="Boo House"></a> </h1>
    <div class="menu_block">


    <nav id="bt-menu" class="bt-menu">
        <a href="#" class="bt-menu-trigger"><span>Menu</span></a>
        <ul>
            <li class="bt-icon current"><a href="index-4%20-%20Copy.php">Купувај</a></li>
            <li class="bt-icon"><a href="../order-status.html">Нарачка</a></li>
            <li class="bt-icon"><a href="profile.php">Профил</a></li>
            <li class="bt-icon"><a href="logout.php">Одјави се</a></li>
        </ul>
      </nav>

 <div class="clear"></div>
</div>
<div class="clear"></div>
          </div>
      </div>
</header>

<!--==============================Content=================================-->

<div class="content">
  <div class="container_12">


    <div class="grid_12">

      <!--
      TUKA (MEGU OVIE 2 DIV-A) MOZES DA UFRLAS KOD I DA TESTIRAS
      -->
        <h1 align="center">Products </h1>

        <!-- View Cart Box Start -->
        <?php
        if(isset($_SESSION["cart_products"]) && count($_SESSION["cart_products"])>0)
        {
            echo '<div class="cart-view-table-front" id="view-cart">';
            echo '<h4>Вашата кошничка</h4>';
            echo '<form method="post" action="cart_update.php">';
            echo '<table width="100%"  cellpadding="6" cellspacing="0">';
            echo '<tbody>';

            $total =0;
            $b = 0;
            foreach ($_SESSION["cart_products"] as $cart_itm)
            {
                $product_name = $cart_itm["product_name"];
                $product_qty = $cart_itm["product_qty"];
                $product_price = $cart_itm["product_price"];
                $product_code = $cart_itm["product_code"];
                $bg_color = ($b++%2==1) ? 'odd' : 'even'; //zebra stripe
                echo '<tr class="'.$bg_color.'">';
                echo '<td>Колку <input type="text" size="2" maxlength="2" name="product_qty['.$product_code.']" value="'.$product_qty.'" /></td>';
                echo '<td>'.$product_name.'</td>';
                echo '<td><input type="checkbox" name="remove_code[]" value="'.$product_code.'" /> Избриши</td>';
                echo '</tr>';
                $subtotal = ($product_price * $product_qty);
                $total = ($total + $subtotal);
            }
            echo '<td colspan="4">';
            echo '<button type="submit">Ажурирај</button><a href="view_cart.php" class="button">Наплати</a>';
            echo '</td>';
            echo '</tbody>';
            echo '</table>';

            $current_url = urlencode($url="http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']);
            echo '<input type="hidden" name="return_url" value="'.$current_url.'" />';
            echo '</form>';
            echo '</div>';

        }
        ?>
        <!-- View Cart Box End -->


        <!-- Products List Start -->
        <?php
        $results = $mysqli->query("SELECT ID, IME, OPIS, SLIKA_IME, CENA, PODGOTOVKA_MINUTI FROM produkt ORDER BY ID ASC");
        if($results){
            $products_item = '<ul class="products">';
//fetch results set as object and output HTML
            while($obj = $results->fetch_object())
            {
                $products_item .= <<<EOT
                <li class="product">
	            <form method="post" action="cart_update.php">
	            <div class="product-content"><h3>{$obj->IME}</h3>
	            <div class="product-thumb"><img  src="../images/{$obj->SLIKA_IME}"></div>
	            <div class="product-desc">{$obj->OPIS}</div>
	            <div class="product-info">
	            <div class="product_prep">Потребна подготовка: {$obj->PODGOTOVKA_MINUTI} мин.</div>
	            Цена {$obj->CENA}{$currency} 
	
	            <fieldset>
	
	                <label>
		            <span>Количина</span>
		            <input type="text" size="2" maxlength="2" name="product_qty" value="1" />
	                </label>
	
	            </fieldset>
	            <input type="hidden" name="product_code" value="{$obj->ID}" />
	            <input type="hidden" name="type" value="add" />
	            <input type="hidden" name="return_url" value="{$current_url}" />
	            <div align="center"><button type="submit" class="add_to_cart">Додај</button></div>
	            </div></div>
	            </form>
	            </li>
EOT;
            }
            $products_item .= '</ul>';
            echo $products_item;
        }
        ?>
        <!-- Products List End -->

        <!--
      TUKA (MEGU OVIE 2 DIV-A) MOZES DA UFRLAS KOD I DA TESTIRAS
      -->
    </div>

  </div>
</div>

<!--==============================footer=================================-->

<footer>
  <div class="container_12">
    <div class="grid_6 prefix_3">
        <a href="../index.html" class="f_logo"><img src="../images/f_logo.png" alt="Foodify MK"></a>
        <div class="copy">
            Website дизајниран од Тим 13
            <br>
            Управување на ИКТ
            <br>
            &copy; 2016
    </div>
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