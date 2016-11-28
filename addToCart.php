<?php 
	session_start();
	$id = $_GET['productID'];
	if(isset($_SESSION['ShoppingCart'] )) {
		if (isset($_SESSION['ShoppingCart'][$id]))
			$_SESSION['ShoppingCart'][$id] = $_SESSION['ShoppingCart'][$id] + 1;
		else $_SESSION['ShoppingCart'][$id] = 1;
	}
	else {		
			$_SESSION['ShoppingCart'] = array($id => 1);
	}

  $loc = "cart.php?added=" . $id;

  header("Location: $loc", true, 303); 
  exit(); 
?>