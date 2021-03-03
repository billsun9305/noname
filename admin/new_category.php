<?php
include("autologout.php");
include('includes/header.php');
include('includes/sidebar.php');
?>



          <h1 class="page-header">Categories</h1>

		  <a href="new_category.php" class="btn btn-info btn-lg">Add New</a>
		  
          <div class="table-responsive">
            <form method="post">
				<div class="form-group">
					<label for="category">
						Category : 
					</label>
					<input class="form-control" name="category" >
				
				</div>
			<button type="submit" name="add_category" class="btn btn-default">Add Category</button>
			
			</form>
			
			
			
          </div>
        </div>
      </div>
    </div>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="js/bootstrap.js"></script>
  </body>
</html>

