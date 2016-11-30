<?php 
	// TODO: Use global variable
	$title = "Products";
	include("header.php");


	$products = $db->getProducts(); ?>
	<a class="btn btn-default" href="products/add.php"><i class="fa fa-plus"></i> Add a Product</a>

	<?php foreach($products as $product) {
		// TODO: Add view orders page, edit product info
		$department = $db->getDepartmentByID($product['DepartmentID']);

		echo "<div class='item'> <h2>" . $product['Name'] . "</h2> <h4> Department:  " . $department['Name'] . "</h4>";

		if ($product['Notes'])
			echo "<div class='description'><h3> Description: </h3>" . $product['Notes'] . "</div>";

		echo "<a href='addToCart.php?productID=" . $product['ProductID'] . "' class='btn-primary btn'>Add To Cart</a> ";

		echo "<a class='btn-primary btn btn-danger' href='product-delete.php?id=" . $product['ProductID'] . "'/> Delete Product </a>";
		
		echo "</div>";
	} ?>

<?php include("footer.php"); ?>