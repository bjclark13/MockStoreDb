<?php 
	// TODO: Use global variable
	include("../header.php");
	$result = false;

	if(isset( $_GET['id'] ))
		$result = $db->deleteCustomer( $_GET['id']);

	// TODO: Add error message that helps show what went wrong
	if($result)
		echo "Deleted succesfully.";

	else
		echo "Could not be deleted at this time.";

	include("../footer.php");
?>