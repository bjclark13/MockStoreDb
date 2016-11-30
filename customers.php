<?php 
	// TODO: Use global variable
	$title = "Customers";
	include("header.php");

	$customers = $db->getCustomers(); ?>
	<a class="btn btn-default" href="customer/add.php"><i class="fa fa-plus"></i> Add a Customer</a>

	<div class="container">
	<?php foreach($customers as $customer) {
		// TODO: Add view orders page, edit customer info
		echo "<li>" . $customer['FName'] . " " . $customer['LName'] . " <a href='".$path . "/customer/customer-delete.php?id=" . $customer['CustomerID'] . "'/> Delete </a></li>";

	} ?>
	</ul>
	</div>

<?php include("footer.php"); ?>