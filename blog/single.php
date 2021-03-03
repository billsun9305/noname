<?php 

include("includes/config.php");
include("includes/db.php");

if(isset($_GET['post'])){
	$post = mysqli_real_escape_string($link , $_GET['post']);
	
	$p = $link->query("SELECT * FROM posts WHERE id='$post'");
	
	$p1 = $p->fetch_assoc();
	
	$page_title = $p1['title'];
	
}

include("includes/header2.php");


if(isset($_GET['post'])){
		$id = mysqli_real_escape_string($link , $_GET['post']);
		$query = "SELECT * FROM posts WHERE id='$id'";
	}
	
	$posts =$link->query($query);
	
	// if(isset($_POST['post_comment'])){
	// 	$name = mysqli_real_escape_string($link , $_POST['name']);
	// 	$comment = mysqli_real_escape_string($link , $_POST['comment']);
		
	// 	if(isset($_POST['website'])){
	// 		$website = mysqli_real_escape_string($link , $_POST['website']);
	// 	}else {
	// 		$website = "";
	// 	}
		
	// 	$query = "INSERT INTO comments (name,comment,post,website) VALUES('$name','$comment','$id','$website')";
		
	// 	$link->query($query);
	// 	header("Location:single.php?post=$id");
	// 	exit();
		
	// }
	
	$query = "SELECT * FROM comments WHERE post='$id' AND status='1'";
	
	$comments = $link->query($query);
	

?>

<!DOCTYPE html>
<html lang="en">
<head>

     <title>Gymso Fitness HTML Template</title>

     <meta charset="UTF-8">
     <meta http-equiv="X-UA-Compatible" content="IE=Edge">
     <meta name="description" content="">
     <meta name="keywords" content="">
     <meta name="author" content="">
     <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

     <link rel="stylesheet" href="css/bootstrap.min.css">
     <link rel="stylesheet" href="css/font-awesome.min.css">
     <link rel="stylesheet" href="css/aos.css">

     <!-- MAIN CSS -->
	 <link rel="stylesheet" href="css/tooplate-gymso-style.css">
	 <link rel="stylesheet" href="css/blog2.css">


</head>
<body data-spy="scroll" data-target="#navbarNav" data-offset="50">

    <!-- MENU BAR -->
    <nav class="navbar navbar-expand-lg fixed-top">
        <div class="container">

            <a class="navbar-brand" href="index.html">Gymso Fitness</a>

            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ml-lg-auto">
                    <li class="nav-item">
                        <a href="#home" class="nav-link smoothScroll">Home</a>
                    </li>

                    <li class="nav-item">
                        <a href="#about" class="nav-link smoothScroll">About Us</a>
                    </li>

                    <li class="nav-item">
                        <a href="#class" class="nav-link smoothScroll">Classes</a>
                    </li>

                    <li class="nav-item">
                        <a href="#schedule" class="nav-link smoothScroll">Schedules</a>
                    </li>

                    <li class="nav-item">
                        <a href="#contact" class="nav-link smoothScroll">Contact</a>
                    </li>

                    <li class="nav-item">
                        <a id="news" href="index.php" class="nav-link smoothScroll" style="color:red">News</a>
                    </li>
                </ul>

                <ul class="social-icon ml-lg-3">
                    <li><a href="https://fb.com/tooplate" class="fa fa-facebook"></a></li>
                    <li><a href="#" class="fa fa-twitter"></a></li>
                    <li><a href="#" class="fa fa-instagram"></a></li>
                </ul>
            </div>

        </div>
    </nav>


     


     
	<!-- blog-post -->
	
	<div id="post" class="container col-md-7">
		

			<?php if($posts->num_rows > 0) { 
			while($row = $posts->fetch_assoc()){
			$categoryid = $row['category'];
			$query = "SELECT * FROM categories where id = '1';";
			$result = $link -> query($query);
			$category = mysqli_fetch_assoc($result);
			?>
	    	<div class="blog-post">
				<div class="text-center">
					<p class="blog-post-category">首頁 > 最新消息 > <?php echo $category['text']; ?></p>
    				<h2 class="blog-post-title"><?php echo $row['title']; ?></h2>
                    <p class="blog-post-meta"><?php echo $row['date']; ?></p>
                    
                </div>
                <hr class="pb-5">
                
				<?php echo $row['body'];?>
			</div><!-- /.blog-post -->
            <?php } } ?>	
            <hr class="mt-5">
            <div class="col-lg-5 mx-auto col-7 text-center mb-5 mt-5">
                
                <a type="button" class=" btn btn-primary btn-lg btn-info" href="/index.php">上一頁</a>
            </div>
	</div>
	 
			


	<!-- FOOTER -->
	<footer class="site-footer">
          <div class="container">
               <div class="row">

                    <div class="ml-auto col-lg-4 col-md-5">
                        <p class="copyright-text">Copyright &copy; 2020 Gymso Fitness Co.
                        
                        <br>Design: <a href="https://www.tooplate.com">Tooplate</a></p>
                    </div>

                    <div class="d-flex justify-content-center mx-auto col-lg-5 col-md-7 col-12">
                        <p class="mr-4">
                            <i class="fa fa-envelope-o mr-1"></i>
                            <a href="#">hello@company.co</a>
                        </p>

                        <p><i class="fa fa-phone mr-1"></i> 010-020-0840</p>
                    </div>
                    
               </div>
          </div>
    </footer>


    <!-- SCRIPTS -->
	<script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/aos.js"></script>
    <script src="js/smoothscroll.js"></script>
    <script src="js/custom.js"></script>


	</body>
</html>



		  <!-- /.blog-main -->

<?php //include("includes/footer.php");?>