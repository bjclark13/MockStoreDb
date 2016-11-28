<?php 
	// TODO: Use global variable
	$title = "Customers";
	include("header.php");

	$customers = $db->getCustomers(); ?>

	<div class="container">
	<h1>Customers</h1>
	<?php foreach($customers as $customer) {
		// TODO: Add view orders page, edit customer info
		echo "<li>" . $customer['FName'] . " " . $customer['LName'] . " <a href='customer-delete.php?id=" . $customer['CustomerID'] . "'/> Delete </a></li>";

	} ?>
	</ul>

	</div>

<?php include("footer.php"); ?>