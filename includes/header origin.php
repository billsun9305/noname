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

    <!-- MAIN CSS -->
    <link rel="stylesheet" href="css/tooplate-gymso-style.css">

	</head>

  <body>

  <!-- <script>window.onbeforeunload = function() { window.open('http://phpfragments.com' , '_self'); };</script> -->
    
    

    <div class="blog-masthead">
      <div class="container">
        <nav class="blog-nav">
		<?php if(isset($_GET['category']) || strpos($_SERVER['REQUEST_URI'] , "index.php") === false) { ?>
		  <a class="blog-nav-item" href="index.php">Home</a>
		<?php }else { ?>
		<a class="blog-nav-item active" href="index.php">Home</a>
		<?php } ?>
		  
		  <?php if($categories->num_rows > 0) {
		  while($row = $categories->fetch_assoc()){
			  if(isset($_GET['category']) && $row['id'] == $_GET['category'] ){ ?>
		  <a class="blog-nav-item active" href="index.php?category=<?php echo $row['id']; ?>"><?php echo $row['text']; ?></a>
			  <?php }else echo "<a class='blog-nav-item' href='index.php?category=$row[id]'>$row[text]</a>";
		  } }?>
        </nav>
      </div>
    </div>

    <div class="container">


      <div class="row">

        <div class="col-sm-8 blog-main">
