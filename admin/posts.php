<?php
include("autologout.php");
include('includes/header.php');
include('includes/sidebar.php');
include("../connection.php");


// $link = mysqli_connect("localhost" , "root" , "12345678" , "blogcms");

if(isset($_GET['entity']) && isset($_GET['action']) && isset($_GET['id']) ){
  // $entity = mysql_real_escape_string($db , $_GET['entity']);
  
  $entity=mysqli_real_escape_string($link, $_GET['entity']);
  // $action = mysql_real_escape_string($db , $_GET['action']);
  $action=$_GET['action'];
  // $id = mysql_real_escape_string($db , $_GET['id']);
  $id=$_GET['id'];


  if($action == "delete"){
    if($entity == "post"){
      $query = "DELETE FROM posts WHERE id = '$id'";
    }else if($entity == "comments"){
      $query = "DELETE FROM comments WHERE id = '$id'";
    }else{
      $query = "DELETE FROM categories WHERE id = '$id'";
        }
    // $result4 = mysqli_query($link, $query); 
    // echo mysqli_num_rows($result4);

  }else{
    $query = "UPDATE comments set status ='1' WHERE id = '$id'";
  }
  // $db->query($query);
  $result4 = mysqli_query($link, $query);
}
$query="SELECT * FROM posts ORDER BY id DESC";
$query2="SELECT * FROM comments ORDER BY id DESC";
$query3="SELECT * FROM categories ORDER BY id DESC";
$result = mysqli_query($link, $query);
$result2 = mysqli_query($link, $query2);
$result3 = mysqli_query($link, $query3);

?>



          <h1 class="page-header">Posts</h1>

		  <a href="new_post.php" class="btn btn-info btn-lg">Add New</a>
		  
          <div class="table-responsive">
            <form method="post">
			<table class="table table-striped">
              <thead>
                <tr>
					        <!-- <th>Select</th> -->
                  <th>Date Posted</th>
                  <th>Title</th>
                  <th>Author</th>
				          <th>Tags</th>
				          <th>Category</th>
                  <th>Actions</th>
                </tr>
              </thead>
              <tbody>
                
              <?php while($row = mysqli_fetch_assoc($result)) { ?>
                <tr>
                  <td><?php echo $row['date']; ?></td>
                  <td><?php echo $row['title']; ?></td>
                  <td><?php echo $row['author']; ?></td>
                  <td><?php echo $row['keywords']; ?></td>
                  <td><?php echo $row['category']; ?></td>
                  <td><a href="new_post.php?post=<?php echo $row['id']; ?>" class="btn btn-warning">Edit</a> 
                  <a href="index.php?entity=post&action=delete&id=<?php echo $row['id']; ?>" class="btn btn-danger">Delete</a></td>
                </tr>
              <?php } ?>
              



              
                <!-- <tr>
				  <td><input type="checkbox" name='checkbox[]'></td>
                  <td>1,006</td>
                  <td>nibh</td>
                  <td>elementum</td>
				  <td>elementum</td>
				  <td>elementum</td>
                  <td><a href="" class="btn btn-warning">Edit</a></td>
                </tr>
                <tr>
				  <td><input type="checkbox" name='checkbox[]'></td>
                  <td>1,006</td>
                  <td>nibh</td>
                  <td>elementum</td>
				  <td>elementum</td>
				  <td>elementum</td>
                  <td><a href="" class="btn btn-warning">Edit</a></td>
                </tr>
				<tr>
				  <td><input type="checkbox" name='checkbox[]'></td>
                  <td>1,006</td>
                  <td>nibh</td>
                  <td>elementum</td>
				  <td>elementum</td>
				  <td>elementum</td>
                  <td><a href="" class="btn btn-warning">Edit</a></td>
                </tr> -->
	
              </tbody>
            </table>
			
			<!-- <select name="action">
				<option>Delete</option>
				<option>Clone</option>
			</select>
			
			<button type="submit" name="apply" class="btn btn-default">Apply</button> -->
			
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

