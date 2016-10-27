<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

		<p>&nbsp;<input type="button" value="Определить свое местоположение (для улучшения результатов поиска)"
			onClick="getLocation();"></p>
		<div id="geolocation_result"></div>

		<div id="search_goods">
			<form method="post" action="/user/edit/shop">
				<input type="hidden" name="userid" value="<?php echo $user['id']; ?>">
				<input type="text" name="search_query" placeholder="Enter shop name" value="">
				<input type="submit" name="submit" value="Search">
			</form>
		</div>

		<div id="pricelist">
			<div id="pricelist_header">
				<span style="font-weight: bold; font-size: 24pt;">Shops</span> 
				<span style="float: right;"><a href="#" onclick="showHideAddForm()">Add shop</a></span>
			</div>
			<table border="1" style="border-collapse: collapse; border-color: black; cellpadding: 10px; cellspacing: 0;">
				<tr>
					<th>ID</th>
					<th>Name</th>
					<th>Address</th>
				</tr>
				<?php
					/* $goods = [ 'id'=>'1', 
								'name'=>'Tovar', 
								#'prices'=>['$0.99 @ HomeDepot (800 m)', '$1.20 @ Lowe\'s (500 m)']
								'prices'=>'$0.99 @ HomeDepot (800 m),<br> $1.20 @ Lowe\'s (500 m)'
							  ]; */

					if (isset($shops)) {
						foreach ($shops as $shop) {							
							echo "<tr>";
							echo "<td>".$shop['id']."</td>";
							echo "<td>".$shop['name']."</td>";
							echo "<td>".
							$shop['address_description']
							"</td>";
							echo "</tr>";
						}
					} else {
						echo "<tr><td colspan=4><span style='color: black;'>Nothing found!</span></td></tr>";
					}
				?>
			</table>
			<p>&nbsp;</p>
		</div>