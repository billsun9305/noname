<?php 
include("includes/config.php");
include("includes/db.php");

if(isset($_GET['category'])){
	$category = mysqli_real_escape_string($link , $_GET['category']);
	
	$cat = $link->query("SELECT * FROM categories WHERE id='$category'");
	
	$c = $cat->fetch_assoc();
	
	$page_title = $c['text'] . " Posts";
	
}

// include("includes/header.php");


if(isset($_GET['category'])){
	$category = mysqli_real_escape_string($link , $_GET['category']);
	$query = "SELECT * FROM posts WHERE category='$category'";
}else {
	$query = "SELECT * FROM posts";
}


$posts = $link->query($query);

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
     <link rel="stylesheet" href="css/blog2.css">
     <link rel="stylesheet" href="css/tooplate-gymso-style.css">


</head>
<body data-spy="scroll" data-target="#navbarNav" data-offset="50">

    <!-- MENU BAR -->
    <nav class="navbar navbar-expand-lg fixed-top">
        <div class="container">

            <a class="navbar-brand" href="../index.html">Gymso Fitness</a>

            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ml-lg-auto">
                    <li class="nav-item">
                        <a href="../index.html" class="nav-link smoothScroll">Home</a>
                    </li>

                    <li class="nav-item">
                        <a href="../index.html#about" class="nav-link smoothScroll">About Us</a>
                    </li>

                    <li class="nav-item">
                        <a href="../index.html#class" class="nav-link smoothScroll">Classes</a>
                    </li>

                    <li class="nav-item">
                        <a href="../index.html#schedule" class="nav-link smoothScroll">Schedules</a>
                    </li>

                    <li class="nav-item">
                        <a href="../index.html#contact" class="nav-link smoothScroll">Contact</a>
                    </li>

                    <li class="nav-item">
                        <a id="news" href="index.php" class="nav-link smoothScroll active" >News</a>
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

    <!-- BANNER -->
    
    <section id="news" class="hero d-flex flex-column justify-content-center align-items-center" style="min-height: 50vh; background-position: center;" >

        <div class="bg-overlay"></div>
           <div class="container">
                <div class="row">
                     <div class="col-lg-8 col-md-10 mx-auto col-12 ">
                          <div class="hero-text mt-5 text-center">
                                <!-- <h6 data-aos="fade-up" data-aos-delay="300">new way to build a healthy lifestyle!</h6> -->
                                <h1 class="text-white " data-aos="fade-up" data-aos-delay="500">最新消息</h1>
                                <!-- <a href="#feature" class="btn custom-btn mt-3" data-aos="fade-up" data-aos-delay="600">Get started</a> -->
                                <!-- <a href="#about" class="btn custom-btn bordered mt-3" data-aos="fade-up" data-aos-delay="700">learn more</a> -->
                          </div>
                     </div>
                </div>
           </div>
    </section>
    
    <!-- newsmenu -->
    <div class="container" style="min-width:100%">
        <div class="row justify-content-md-center newsmenu">
            <div class="col-md-10">
                <?php include("includes/sidebar.php");?>
            </div>
        </div>
        <div class="row">
            <div id="news" class="container col-md-7 pt-5">
                <div class="blog-post">
                    <div class="text-center">

                    <p class="blog-post-category">首頁 > 最新消息 > 
                        
                    <?php
                    
                    
                    
                    if(isset($_GET['category'])){
                        $category = mysqli_real_escape_string($link , $_GET['category']);
	                    $cat = $link->query("SELECT * FROM categories WHERE id='$category'");
                        $c = $cat->fetch_assoc();
                        echo $c['text'];
                    } else echo '全部消息'; ?></p>
                    
                    <h1 class="blog-cat"><?php if(isset($_GET['category'])){ echo $c['text'];} else echo '全部消息';  ?></h1>

                   
                    
                    </div>
                </div>
            </div>
        </div>
    </div>







    <!-- news -->
    <div id="newscontent" class="container pt-2">
        <hr >
        <div class="pb-5">
        </div>
		
      <!-- <div class="blog-header">
        <h1 class="blog-title">BlogCMS</h1> 
        <p class="lead blog-description">The official example template of creating a blog with Bootstrap.</p>
      </div> -->


		<?php if($posts->num_rows > 0) { 

        $num_rows = $posts->num_rows;

        
        
        

		for ($i = 1; $i <= $num_rows; $i++) {

            

            $row = $posts->fetch_assoc();
            echo $i;

            if($i < 6){
            
		?>
	    <div class="row">
            <div class="col-md-5 pb-5">
                <h2 class="thumbnail"><a href="single.php?post=<?php echo $row['id'] ?>"><?php echo $row['thumbnail']; ?></a></h2>
            </div>

            <div class="blog-post col-md-7">
              	<h2 class="blog-post-title" ><a href="single.php?post=<?php echo $row['id'] ?>"><?php echo $row['title']; ?></a></h2>
                <p class="blog-post-meta"><?php echo $row['id'].' '.$row['date'];   ?>  </p>
                <!-- by <a href="#"><?php //echo $row['author']; ?></a></p> -->
            
	    		<?php $body = $row['body'];
	    			echo substr(strip_tags($body) , 0 , 200) . "...";
	    		?>

                <br>
	    		<a href="single.php?post=<?php echo $row['id'] ?>" class="btn btn-primary btn-info mt-3">了解更多</a>
	    	</div><!-- /.blog-post -->
        </div>
	    	<?php } } } else {
            
	    			echo "<p>No Matching Posts</p>";
            
	    	}?>
        


        

    </div><!-- /.blog-main -->

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

<?php //include("includes/sidebar.php");?>
<?php //include("includes/footer.php");?>