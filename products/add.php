<?php 

$title = "Add Product";
include("../header.php"); 
?>
<form id="product-add" action="product-add.php" method="post">

	<label for="Name">Product Name</label>
	<input type="text" name="Name" id="name">

	<label for="Price">Price</label>
	<input type="number" name="Price" id="price">

	<label for="">Departments</label>
	<select name="Department" id="department">
	<?php 
		$departments = $db->getDepartments();
		foreach($departments as $department): ?>
			<option value="<?php echo $department['DepartmentID'];?>">
				<?php echo $department['Name']; ?>
			</option>
		<?php 
		endforeach; ?>
	</select>

	<label for="Notes">Description: </label>
	<textarea name="Notes"></textarea>

	<button class="btn-primary" type="submit">Add Product</button>

</form>

<?php include("../footer.php"); ?>
