<?php

include('includes/header.php');
include('includes/sidebar.php');
$link = mysqli_connect("localhost" , "root" , "12345678" , "blogcms");
$query="SELECT * FROM posts ORDER BY id DESC";
$result = mysqli_query($link, $query)
?>



          <h1 class="page-header">Comments</h1>

          <div class="table-responsive">
            <form method="post">
			<table class="table table-striped">
              <thead>
                <tr>
				  <th>Select</th>
                  <th>Author</th>
                  <th>Website</th>
                  <th>Post</th>
				  <th>Comment</th>
				  <th>Status</th>
                  <th>Reply</th>
                </tr>
              </thead>
              <tbody>
                
               
              
                <tr>
				  <td><input type="checkbox" name='checkbox[]'></td>
                  <td>Basit</td>
                  <td>twitter.com</td>
                  <td>Sample Java Post</td>
				  <td>Nice Post Danyal</td>
				  <td><button class="btn btn-success">Approved</button></td>
                  <td><a href="" class="btn btn-info">Reply</a><textarea cols="15" rows="2" class="form-control"></textarea></td>
                </tr>
				
				<tr>
				  <td><input type="checkbox" name='checkbox[]'></td>
                  <td>Yasir</td>
                  <td>phpfragments.com</td>
                  <td>Sample Java Post</td>
				  <td>WOW</td>
				  <td><button class="btn btn-warning">Pending</button></td>
                  <td><a href="" class="btn btn-info">Reply</a><textarea cols="15" rows="2" class="form-control"></textarea></td>
                </tr>
               
	
              </tbody>
            </table>
			
			<select name="action">
				<option>Delete</option>
				<option>Approve</option>
			</select>
			
			<button type="submit" name="apply" class="btn btn-default">Apply</button>
			
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

