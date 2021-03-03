<?php
	include("includes/db.php");
	$query = "SELECT * FROM categories";
	
	$categories =$link->query($query);
	
?>


<!DOCTYPE html>
<html lang="en">
  <head>
  
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta name="author" content="">
    <title><?php echo $page_title; ?></title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.css" rel="stylesheet">
	
    <!-- Custom styles for this template -->
    <link href="css/blog.css" rel="stylesheet">
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <link rel="stylesheet" href="css/aos.css">
    <!-- <link rel="stylesheet" href="css/blog.css"> -->


    <!-- MAIN CSS -->
    <link rel="stylesheet" href="css/tooplate-gymso-style.css">

	</head>



  <!-- <script>window.onbeforeunload = function() { window.open('http://phpfragments.com' , '_self'); };</script> -->
    
    

    
