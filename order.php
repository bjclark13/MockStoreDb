<?php $title = "Order"; 
include("header.php"); 

	if(isset($_SESSION['ShoppingCart'])):
		$result = $db->completeOrder($_SESSION['ShoppingCart']);
		if($result) {
			echo "Order Completed";
			unset($_SESSION['ShoppingCart']);
		}
		else echo "Could not complete order at this time.";

	 else: 
		echo "Cart is empty. <a href='products.php'>Continue Shopping</a>";

	endif;

	include("footer.php");

?>