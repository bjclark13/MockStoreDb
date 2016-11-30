<?php 
	// TODO: Use global variable
	$title = "Orders";
	include("header.php");


	$orders = $db->getOrders(); ?>

<?php foreach($orders as $order) {
		// TODO: Make this a table
		$orderitems = $db->getOrderItems($order['OrderID']);
		if($orderitems) {
			$total = 0;
			echo "<div> <h2>Order# " . $order['OrderID'] . " (" . date('m-d-y', strtotime($order['DatePurchased'])) . ")</h2>"; ?>
		<table>
			<th>Name</th>
			<th>Price</th>
			<th>Quantity</th>
			<th>Total</th>

		 <?php 	foreach($orderitems as $item) {
				echo "<tr>";
				$product = $db->getProductByID($item['ProductID']);
				$total += floatval($product['Price']) * intval($item['Quantity']);

				echo "<td> " . $product['Name'] . "</td><td> $ " . money_format("%i", $product['Price']) . "</td><td>" .  $item['Quantity'] . "</td> <td> $" . money_format("%i" ,floatval($product['Price']) * intval($item['Quantity'])) . "</td>"; 
				echo("</tr>");
			} ?> 

			</table>

			<?php echo "<h4>Total: $" . money_format("%i",$total) . "</h4>";

			echo "</div>";
						echo "<hr/>";

		}
	} ?>

		<?php include("footer.php"); ?>
