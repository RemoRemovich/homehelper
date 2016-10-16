<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title><?php echo $site_name; ?></title>
		
	<!-- Bootsrap: -->
	<!--<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css">-->
	
	<!-- HTML5 Shiv and Respond.js for IE8 support of HTML5 elements and media queries -->
	<!-- Warning: respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
		<script src="https://oss.maxcdn.com/html5shiv/3.6.2/html5shiv.min.js"></script>
		<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->

	<!-- Optional theme for bootstrap: -->
	<!--<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap-theme.min.css">-->
	
	
	<style type="text/css">
		html {
		  -webkit-box-sizing: border-box;
		  -moz-box-sizing: border-box;
		  box-sizing: border-box;
		}

		.container {
			background: #f5f5f5;
		}

	/*	div {
			border: 1px solid black;
		}
	*/
		#menu {			
			background: #325da7;
			color: #fff;
		}
	
		ul.horizontal {
			margin-top: 5px;
			margin-bottom: 5px;
			padding: 0;
		}

		ul.horizontal li {
			display: inline;
			padding: 0 10px 0 0;
		}

		div#main_text {
		/*	float: left;*/
		} 

		form input, select, textarea, select {
			margin: 2px 0;
		}

		p.padded {
			padding: 3px 0;
		}

		div.footer {
			clear: both;
		}
	</style>
</head>

<body>

	<div class="container" id="container">
		<div class="row">
			<div class="col-sm-12"><h1><?php echo $site_name; ?></h1></div>
		</div>

		<div class="row">
			<div class="col-sm-12" id="menu">
				<ul class="horizontal">
					<li>Item 1</li>
					<li>Item 2</li>
					<li>Item 3</li>
					<li>Item 4</li>
					<li>Item 5</li>
				</ul>
			</div>
		</div>

		<div class="row">
			<div id="main_text" class="col-sm-12">

				<h2>Описание системы</h2>
				
				<p>Система <?php echo $site_name; ?> предназначена для помощи в совершении покупок по самым низким ценам в вашем городе.</p>

				<form action="/user/login" method="post">					
					<?php if (isset($_GET['msg'])) { echo "<p style='color: red;'>".$_GET['msg']."</p>"; } ?>
					<input type="hidden" name="login" placeholder="Email" value="anonymous@anonymous.com">
					<input type="hidden" name="password" placeholder="Пароль" value="anonymous">
					<input type="submit" name="submit" value="Воспользоваться без регистрации">
				</form>

				<p>&nbsp;</p>
			</div>
		</div>	

		<div class="row" id="body">
			<div id="login_form" class="col-sm-6">
				<h3>Вход в систему</h3>
				<form method="post" action="/User/login">
					<?php if (isset($_GET['msg'])) { echo "<p style='color: red;'>".$_GET['msg']."</p>"; } ?>
					<input type="text" name="login" size="33" placeholder="Email" value="borismednikov@gmail.com"><br>
					<input type="password" name="password" size="33" placeholder="Пароль" value="8767"><br>
					<input type="submit" name="submit" value="Войти в систему">
				</form>
				<p class="padded"><a href='/User/forgot_password' target="_self">Забыли пароль?</a></p>
			</div>
			<div id="reg_form" class="col-sm-6">
				<h3>Регистрация</h3>
				<form method="post" action="/User/register">
					<?php if (isset($_GET['msg_for_user_reg_form'])) { echo "<p style='color: red;'>".$_GET['msg']."</p>"; } ?>
					<input type="text" name="login" size="33" placeholder="Email" value=""><br>
					<input type="password" name="password" size="33" placeholder="Пароль" value=""><br>
					<input type="password" name="password" size="33" placeholder="Подтверждение пароля" value=""><br>
					<input type="submit" name="submit" value="Зарегистрироваться">
				</form>
			</div>
		</div>

		<div class="footer row"> <!-- margin-top: 30px;">-->
			<div class="col-sm-12">
				Page rendered in <strong>{elapsed_time}</strong> seconds. 
				<?php echo  (ENVIRONMENT === 'development') ?  'CodeIgniter Version <strong>' . CI_VERSION . '</strong>' : '' ?>
			</div>
		</div>
	</div> <!-- class=row -->

	<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
	<!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>-->
	<!-- Include all compiled plugins (below), or include inidividual files as needed -->
	<!-- latest JS: -->
	<!--<script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/js/bootstrap.min.js">"></script>-->
	
	<!-- Bootstrap 4.0-alpha-4 CSS files: -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.4/css/bootstrap.min.css" integrity="sha384-2hfp1SzUoho7/TsGGGDaFdsuuDL0LX2hnUp6VkX3CUQ2K4K+xjboZdsXyp4oUHZj" crossorigin="anonymous">

	<!-- Bootstrap 4.0-alpha-4 JS files: -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.0.0/jquery.min.js" integrity="sha384-THPy051/pYDQGanwU6poAc/hOdQxjnOEXzbT+OuUAFqNqFjL+4IGLBgCJC3ZOShY" crossorigin="anonymous"></script>

	<script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.2.0/js/tether.min.js" integrity="sha384-Plbmg8JY28KFelvJVai01l8WyZzrYWG825m+cZ0eDDS1f7d/js6ikvy1+X+guPIB" crossorigin="anonymous"></script>

	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.4/js/bootstrap.min.js" integrity="sha384-VjEeINv9OSwtWFLAtmc4JCtEJXXBub00gtSnszmspDLCtC0I4z4nqz7rEFbIZLLU" crossorigin="anonymous"></script>

</body>
</html>