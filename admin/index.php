<?php


include("autologout.php");
include("includes/config.php");
include("../connection.php");
// include("includes/db.php");
include('includes/header.php');
include('includes/sidebar.php');
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

          <h1 class="page-header">Dashboard</h1>
          
          

          <h2 class="sub-header">Recent Posts</h2>
          <div class="table-responsive">
            <table class="table table-striped">
              <thead>
                <tr>
                  <th>Date Posted</th>
                  <th>Title</th>
                  <th>Author</th>
                  <th>Actions</th>
                </tr>
              </thead>
              <tbody>
                
               
                <?php while($row = mysqli_fetch_assoc($result)) { ?>
                <tr>
                  <td><?php echo $row['date']; ?></td>
                  <td><?php echo $row['title']; ?></td>
                  <td><?php echo $row['author']; ?></td>
                  <td><a href="new_post.php?post=<?php echo $row['id']; ?>" class="btn btn-warning">Edit</a> 
                  <a href="index.php?entity=post&action=delete&id=<?php echo $row['id']; ?>" class="btn btn-danger">Delete</a></td>
                </tr>
                <?php } ?>
               
                
              </tbody>
            </table>
			
			
			<h2 class="sub-header">Recent Comments</h2>
          <div class="table-responsive">
            <table class="table table-striped">
              <thead>
                <tr>
                  <th>Name</th>
                  <th>Comment</th>
                  <th>Actions</th>
                </tr>
              </thead>
              <tbody>
                
               
              <?php while($row = mysqli_fetch_assoc($result2)) { ?>
                <tr>
                  <td><?php echo $row['name']; ?></td>
                  <td><?php echo $row['comment']; ?></td>
                  <td><a href="index.php?entity=comments&action=approve&id=<?php echo $row['id']; ?>" class="btn btn-success">Approve</a>  
                  <a href="index.php?entity=comments&action=delete&id=<?php echo $row['id']; ?>" class="btn btn-danger">Delete</a></td>
                </tr>
              <?php } ?>
               
                
              </tbody>
            </table>
			
			
			<h2 class="sub-header">Recent Categories</h2>
          <div class="table-responsive">
            <table class="table table-striped">
              <thead>
                <tr>
                  <th>ID</th>
                  <th>Title</th>
                  <th>Actions</th>
                </tr>
              </thead>
              <tbody>
                
               
              <?php while($row = mysqli_fetch_assoc($result3)) { ?>
                <tr>
                  <td><?php echo $row['id']; ?></td>
                  <td><?php echo $row['text']; ?></td>
                  <td><a href="new_category.php?categories=<?php echo $row['id']; ?>" class="btn btn-warning">Edit</a>  
                  <a href="index.php?entity=categories&action=delete&id=<?php echo $row['id']; ?>" class="btn btn-danger">Delete</a></td>
                </tr>
              <?php } ?>
               
                
              </tbody>
            </table>
			
			
			
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

<?php
// session_destroy();
?>
