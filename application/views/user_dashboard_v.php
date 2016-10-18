<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title><?php echo $page_name; ?> - <?php echo $site_name; ?></title>
	<link rel="stylesheet" type="text/css" href="/styles.css"/>
	<script type="text/javascript" src="/geolocation.js"></script>
	<script type="text/javascript" src="/functions.js"></script>
</head>


<body>

<div id="wrap" class="container">
	<div id="header" class="row">
		<div class="col-sm-12">
			<h1>User dashboard</h1>

			<div id="userid"> <!--style="border-bottom: 1px solid black;"-->
				<?php echo $user['name']; ?> (<a href="/user/logout" target="_self">Log out</a>)
				<br>
			</div>
		</div>
	</div>

	<div class="row">
		<div id="sidebar" class="col-sm-2"> <!-- border-right: 1px solid black;">-->
			<ul>
				<li><a href="/user/edit/products" target="_self">Products</a></li>
				<li><a href="/user/edit/shops" target="_self">Shops</a></li>
				<li><a href="/user/edit/prices" target="_self">Prices</a></li>
			</ul>

			<p style="padding-left: 38px;"><a href="/user/view_cart" target="_self">Cart</a></p>
		</div>

		<div id="main" class="col-sm-10">
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
	</div>

	<div class="row"
		<div id="footer" style="clear: both;" class="col-sm-12">
			Page rendered in <strong>{elapsed_time}</strong> seconds. 
			<?php echo  (ENVIRONMENT === 'development') ?  'CodeIgniter Version <strong>' . CI_VERSION . '</strong>' : '' ?>
		</div>
	</div>
</div>

	<!-- Bootstrap 4.0-alpha-4 CSS files: -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.4/css/bootstrap.min.css" integrity="sha384-2hfp1SzUoho7/TsGGGDaFdsuuDL0LX2hnUp6VkX3CUQ2K4K+xjboZdsXyp4oUHZj" crossorigin="anonymous">

	<!-- Bootstrap 4.0-alpha-4 JS files: -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.0.0/jquery.min.js" integrity="sha384-THPy051/pYDQGanwU6poAc/hOdQxjnOEXzbT+OuUAFqNqFjL+4IGLBgCJC3ZOShY" crossorigin="anonymous"></script>

	<script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.2.0/js/tether.min.js" integrity="sha384-Plbmg8JY28KFelvJVai01l8WyZzrYWG825m+cZ0eDDS1f7d/js6ikvy1+X+guPIB" crossorigin="anonymous"></script>

	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.4/js/bootstrap.min.js" integrity="sha384-VjEeINv9OSwtWFLAtmc4JCtEJXXBub00gtSnszmspDLCtC0I4z4nqz7rEFbIZLLU" crossorigin="anonymous"></script>

</body>
</html>