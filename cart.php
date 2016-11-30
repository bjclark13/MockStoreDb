<?php include("header.php"); 
	if(isset($_SESSION['ShoppingCart'])): ?>
		<table>
			<th>Name</th>
			<th>Price</th>
			<th>Quantity</th>
			<th>Total</th>

    <?php foreach($_SESSION['ShoppingCart'] as $id => $quantity) :
    	$product = $db->getProductByID($id);
    	$total = floatval($product['Price']) * intval($quantity);
     ?>
    	<tr>
    	<td><?php echo $product['Name'];?> </td>
    	<td><?php echo $product['Price'];?> </td>
    	<td><?php echo $quantity;?> </td>
    	<td><?php echo $total ;?> </td>

    	</tr>
  <?php endforeach; ?>
		</table>
		<a href="order.php">Confirm Order</a>

	<?php else: 
		echo "Cart is empty. <a href='products.php'>Continue Shopping</a>";

	endif;

	include("footer.php");

?>