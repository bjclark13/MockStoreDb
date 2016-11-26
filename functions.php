<?php 

function getHeader() {
	echo '
	<!DOCTYPE html>
		<html lang="en">
		  <head>
		    <meta charset="utf-8">
		    <meta name="viewport" content="width=device-width, initial-scale=1.0">
		    <title>' . $title . '</title>

		    <!-- Bootstrap core CSS  -->    
		    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet"> 
		     <!-- Custom styles for this template 
		     <link href="bootstrap3_defaultTheme/theme.css" rel="stylesheet">-->

		    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
		    <!--[if lt IE 9]>
		      <script src="../../assets/js/html5shiv.js"></script>
		      <script src="../../assets/js/respond.min.js"></script>
		    <![endif]-->
		  </head>

		  <body>';
}

function getFooter() {

}
?>