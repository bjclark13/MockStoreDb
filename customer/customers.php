<?php 
	// TODO: Use global variable
	include("../database/db.php");
	$title = "Customers";
	include("../header.php");
	$db = new Database();

	$customers = $db->getCustomers(); ?>

	<div class="container">
	<h1>Customers</h1>
	<ul>
	<?php foreach($customers as $customer) {
		// TODO: Add view orders page, edit customer info
		echo "<li>" . $customer['FName'] . " " . $customer['LName'] . " <a href='customer-delete.php?id=" . $customer['CustomerID'] . "'/> Delete </a></li>";

	} ?>
	</ul>

	</div>

<?php include("../footer.php"); ?>