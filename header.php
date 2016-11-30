 <!DOCTYPE html>
 <?php $path = "http://localhost/MockStoreDb"?>
		<html lang="en">
		  <head>
		    <meta charset="utf-8">
		    <meta name="viewport" content="width=device-width, initial-scale=1.0">
		    <title><?php echo $title ?></title>

		    <!-- Bootstrap core CSS  -->    
		    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet"> 
		    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
		    <link rel="stylesheet" type="text/css" href="<?php echo $path; ?>/style.css">
		     <!-- Custom styles for this template 
		     <link href="bootstrap3_defaultTheme/theme.css" rel="stylesheet">-->

		    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
		    <!--[if lt IE 9]>
		      <script src="../../assets/js/html5shiv.js"></script>
		      <script src="../../assets/js/respond.min.js"></script>
		    <![endif]-->
		  </head>
<body>

<?php 

session_start();
include("database/db.php");
$db = new Database();

 ?>

 <div class="left-sidebar">
 	<ul class="nav">
 	 	<li><a href="<?php echo $path; ?>/products.php"><i class="fa fa-cubes"></i> Products</a></li>
 		<li><a href="<?php echo $path; ?>/customers.php"><i class="fa fa-users"></i> Customers</a></li>
 		<li><a href="<?php echo $path; ?>/inventory.php"><i class="fa fa-bar-chart"></i> Inventory</a></li>
 		<li><a href="<?php echo $path; ?>/orders.php"><i class="fa fa-money"></i> Orders</a></li>
 	</ul>
 </div>

 <div class="container main-content">
 	<h1><?php echo $title ?></h1>