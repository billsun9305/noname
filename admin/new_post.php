<?php
include("autologout.php");
include('includes/config.php');
// include('includes/db.php');
include('includes/header.php');
include('includes/sidebar.php');
include("../connection.php");

// $link = mysqli_connect("localhost" , "root" , "12345678" , "blogcms");

if(isset($_POST['add_post'])){
	$title = mysqli_real_escape_string($link, $_POST['title']);
	$author = mysqli_real_escape_string($link, $_POST['author']);
	$category = mysqli_real_escape_string($link, $_POST['category']);
	$thumbnail = mysqli_real_escape_string($link, $_POST['thumbnail']);
	$body = mysqli_real_escape_string($link, $_POST['body']);
	$keywords = mysqli_real_escape_string($link, $_POST['keywords']);

	if(isset($_POST['id'])){
		$id = mysqli_real_escape_string($link, $_POST['id']);
		$query = "UPDATE posts SET title='$title',author='$author',category='$category',thumbnail='$thumbnail',body='$body',keywords='$keywords' WHERE id='$id'";
	}else{
		$d = getdate();
		$date = "$d[month] $d[mday] $d[year]";
		$query = "INSERT INTO posts (title,author,category,thumbnail,body,keywords,date) VALUES ('$title','$author','$category','$thumbnail','$body','$keywords','$date')";
	}

	$result = mysqli_query($link, $query);

	
};

if(isset($_GET['post'])){
	$id = mysqli_real_escape_string($link, $_GET['post']);
	$query = "SELECT * FROM posts where id ='$id'";
	$result = mysqli_query($link, $query);
	$row = mysqli_fetch_assoc($result);
	// echo $row['body'];
	
};


$query = "SELECT * FROM categories";
$result = mysqli_query($link, $query);




?>



          <h1 class="page-header">Add New Post</h1>

          <div class="table-responsive">
            <form method="post">
			<?php if(isset($row)){
				echo "<input type='hidden' value='$id' name='id' /> ";
			}
			?>
				
				<div class="form-group">
					<label>
						Post Title : 
					</label>
					<input class="form-control" type="text" name="title" value="<?php echo @$row['title']; ?>">
				</div>
				
				<div class="form-group">
					<label>
						Post Author : 
					</label>
					<input class="form-control" type="text" name="author" value="<?php echo @$row['author']; ?>">
				</div>
				<div class="form-group">
					<label>
						Post Category : 
					</label>
					<select name="category" class="form-control">
					<?php while($row2 = mysqli_fetch_assoc($result)) {
						// $seleted = ($row2['id'] == $row['category'] ? "selected":"");
					?>
						<option value="<?php echo $row2['id'] ?>"<?php if($row2['id'] == $row['category']) echo 'selected="selected"' ?>><?php echo $row2['text'] ?></option>
					<?php } ?>
					</select>
				</div>
				<div class="form-group">
					<label>
						Thumbnail : 
					</label>
					<textarea name="thumbnail" type="text" class="form-control" ><?php echo @$row['thumbnail']; ?></textarea>
				</div>
				<div class="form-group">
					<label>
						Post Body : 
					</label>
					<textarea name="body" type="text" class="form-control" ><?php echo @$row['body']; ?></textarea>
				</div>
				
				<div class="form-group">
					<label>
						Post Keywords : 
					</label>
					<input class="form-control" type="text" name="keywords" value="<?php echo @$row['keywords']; ?>">
				</div>
				
				
				
			<button type="submit" name="add_post" class="btn btn-default">Add Post</button>
			
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

