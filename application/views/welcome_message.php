<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Welcome to <?echo $site_name; ?></title>
	<!--<link rel="stylesheet" type="text/css" href="styles.css"/>-->
	<style type="text/css">
		div {
			border: 1px solid black;
		}
	</style>
</head>
<body>

<div id="container">
	<h1>Welcome to <?php echo $site_name; ?>!</h1>

	<div id="body">

		<div id="form">
			<h3>Вход в систему</h3>
			<form method="post" action="/User/login">
				<?php if (isset($_GET['msg'])) { echo "<p style='color: red;'>".$_GET['msg']."</p>"; } ?>
				<input type="text" name="login" placeholder="Email" value="borismednikov@gmail.com"><br>
				<input type="password" name="password" placeholder="Пароль" value="8767"><br>
				<input type="submit" name="submit" value="Войти в систему">
			</form>
			<p><a href='/User/reg_form' target="_self">Зарегистрироваться</a></p>
		</div>

		<div id="description" style="float: left;">
			<h3>Описание системы</h3>
			<p>Система <?php echo $site_name; ?> предназначена для совершения покупок по самым низким ценам в вашем городе.</p>
		</div>
	</div>

	<div class="footer" style="clear: both; margin-top: 30px;">
		Page rendered in <strong>{elapsed_time}</strong> seconds. 
		<?php echo  (ENVIRONMENT === 'development') ?  'CodeIgniter Version <strong>' . CI_VERSION . '</strong>' : '' ?>
	</div>
</div>

</body>
</html>