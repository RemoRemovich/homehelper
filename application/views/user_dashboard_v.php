<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title><?php echo $page_name; ?> - <?php echo $site_name; ?></title>
	<link rel="stylesheet" type="text/css" href="/styles.css"/>
	<script type="text/javascript" src="/geolocation.js"></script>
	<script type="text/javascript" src="/functions.js"></script>
</head>


<body>

<div id="wrap">
	<div id="header">
		<h1>User dashboard</h1>

		<div id="userid"> <!--style="border-bottom: 1px solid black;"-->
			<?php echo $user['name']; ?> (<a href="/Welcome" target="_self">Log out</a>)
			<br>
		</div>
	</div>

	<div id="sidebar"> <!-- border-right: 1px solid black;">-->
		<ul>
			<li><a href="/user/edit/products" target="_self">Products</a></li>
			<li><a href="/user/edit/shops" target="_self">Shops</a></li>
			<li><a href="/user/edit/prices" target="_self">Prices</a></li>
		</ul>

		<p style="padding-left: 38px;"><a href="/user/view_cart" target="_self">Cart</a></p>
	</div>

	<div id="main">
		<?php 
			switch ($page_name) {
				case 'User dashboard':
					require('user_prices_v.php');
					break;

				case 'Products':
					require('user_products_v.php');
					break;
				
				default:
					require('user_prices_v.php');
					break;
			}
		?>
	</div>

	<div id="footer" style="clear: both; margin-top: 30px;">
		Page rendered in <strong>{elapsed_time}</strong> seconds. 
		<?php echo  (ENVIRONMENT === 'development') ?  'CodeIgniter Version <strong>' . CI_VERSION . '</strong>' : '' ?>
	</div>
</div>

</body>
</html>