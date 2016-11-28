<?php 

	include("../header.php");


	if(isset(	$_POST['Name'] ))
		$Name = $_POST['Name'];
	else die("Product Name");

	if(isset(	$_POST['Department'] ))
		$Department = intval($_POST['Department']);
	else die("No Department provided");

	if(isset(	$_POST['Price'] ))
		$Price = floatval($_POST['Price']);

	if(isset($_POST['Notes']))
		$notes = $_POST['Notes'];

	$result = $db->addProduct($Name, $Price, $Department, $notes);

	// TODO: Add error message that helps show what went wrong
	if($result)
		echo $Name . " added succesfully.";

	else
		echo $Name . " could not be added at this time.";

	include("../footer.php");
?>