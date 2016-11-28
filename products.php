<?php 
	// TODO: Use global variable
	$title = "Products";
	include("header.php");


	$products = $db->getProducts(); ?>

	<div class="container">
	<h1>Products</h1>
	<ul>

	<?php foreach($products as $product) {
		// TODO: Add view orders page, edit product info
		$department = $db->getDepartmentByID(1);

		echo "<div class='row'> <h2>" . $product['Name'] . "</h2> <h4> Department:  " . $department['Name'] . "</h4>";

		if ($product['Notes'])
			echo "<div class='description'><h3> Description: </h3>" . $product['Notes'] . "</div>";

		echo "<a href='addToCart.php?productID=" . $product['ProductID'] . "' class='btn-primary btn'>Add To Cart</a>";

		echo "<a class='btn-primary btn btn-danger' href='product-delete.php?id=" . $product['ProductID'] . "'/> Delete Product </a>";
		
		echo "</div>";
	} ?>
	</ul>

	</div>

<?php include("footer.php"); ?>