<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

		<p>&nbsp;<input type="button" value="Определить свое местоположение (для улучшения результатов поиска)"
			onClick="getLocation();"></p>
		<div id="geolocation_result"></div>

		<div id="search_goods">
			<form method="post" action="/user/dashboard">
				<input type="hidden" name="userid" value="<?php echo $user['id']; ?>">
				<input type="text" name="search_query" placeholder="Enter product name" value="">
				<input type="submit" name="submit" value="Search">
			</form>
		</div>

		<div id="pricelist">
			<div id="pricelist_header">
				<span style="font-weight: bold; font-size: 24pt;">Pricelist</span> 
				<span style="float: right;"><a href="/user/add_price" target="_self">Add price</a></span>
			</div>
			<table border="1" style="border-collapse: collapse; border-color: black; cellpadding: 10px; cellspacing: 0;">
				<tr>
					<th>ID</th>
					<th>Name</th>
					<th>Prices</th>
					<th>Actions</th>
				</tr>
				<?php
					/* $goods = [ 'id'=>'1', 
								'name'=>'Tovar', 
								#'prices'=>['$0.99 @ HomeDepot (800 m)', '$1.20 @ Lowe\'s (500 m)']
								'prices'=>'$0.99 @ HomeDepot (800 m),<br> $1.20 @ Lowe\'s (500 m)'
							  ]; */

					if (isset($goods)) {
						foreach ($goods as $good) {							
							echo "<tr>";
							echo "<td>".$good['id']."</td>";
							echo "<td>".$good['name']."</td>";
							echo "<td>".
							//$good['prices'].
							"</td>";
							echo "<td>".
								 "<input type='number' name='quantity_".$good['id']."' value='1' min='1' max='100' size='3'> ".
								 "<input type='button' name='submit_".$good['id']."' value='Add to cart'> ".
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