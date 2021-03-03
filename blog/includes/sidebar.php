	<!-- <div class="col-sm-3 col-sm-offset-1 blog-sidebar"> -->
		
			<!-- <div class="sidebar-module">
            <h4>Search</h4>
			<hr>
				<form method="get" action="results.php" class="form-inline">
				  <div class="form-group">
					<input type="text" name="search" class="form-control" id="exampleInputName2" placeholder="Search...">
				  </div>
				  
				</form>
          	</div> -->
		
          
			<!-- <div class="sidebar-module"> -->
            <!-- <h4>Categories</h4>
			<hr> -->
			
			<?php $q = "SELECT * FROM categories";
				$categories = $link->query($q);
				
			?>
            <ul class="list-unstyled">
			<div class="d-flex justify-content-center newscategory">
				<li><a class="p-2 bd-highlight button3 text-white"  href="index.php">全部消息</a></li>
				<?php while($c = $categories->fetch_assoc()){ ?>
            	  <li><a class="p-2 bd-highlight button3 text-white "  href="index.php?category=<?php echo $c['id']; ?>"><?php echo $c['text']; ?></a></li>
				<?php } ?>
				
			</div>
            </ul>
		  <!-- </div> -->
		  
		  
		  
		  
		


		
	<!-- </div> -->
	<!-- /.blog-sidebar -->
		
		