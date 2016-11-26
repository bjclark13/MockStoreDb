<?php 

	include("../header.php");

	// TODO: Use global variable
	include("../database/db.php");
	$db = new Database();

	var_dump($_POST);

	if(isset(	$_POST['FName'] ))
		$fname = $_POST['FName'];
	else die("No First Name provided");

	if(isset(	$_POST['LName'] ))
		$lname = $_POST['LName'];
	else die("No Last Name provided");

	if(isset($_POST['Notes'])) {
		$notes = $_POST['Notes'];
		$result = $db->addCustomer($fname, $lname, $notes);
	} else $result = $db->addCustomer($fname, $lname);

	// TODO: Add error message that helps show what went wrong
	if($result)
		echo $fname . " " . $lname . " added succesfully.";

	else
		echo $fname . " " . $lname . " could not be added at this time.";

	include("../footer.php");
?>