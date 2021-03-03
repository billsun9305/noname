<?php
    session_start();
    ob_start();
    include("connection.php");
    $_SESSION['LAST_ACTIVITY'] = time(); // update last activity time stamp

    
    if ($_POST['submit'] == "login"){
        
        // $query = "select * from manager where email='".mysqli_real_escape_string($link,$_POST['email'])."'AND password='".md5(md5($_POST['email']).$_POST['password'])."' LIMIT 1";
        $query = "select * from manager where email='".$_POST['email']."'AND password='".$_POST['password']."' LIMIT 1";

        $result = mysqli_query($link,$query);
        
        $row = mysqli_fetch_array($result);
        
        if ($row){
            $_SESSION['id'] = $row['id'];
            // echo "OK";
            // $_POST['submit']='Renew';
            header("location:admin/index.php"); //redirect


        }else{
            $error =  "找不到用戶";
        }
        
    }
    

?>

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
  <title>Login</title>
  <meta name="description" content="TBA">
  <meta name="keywords" content="">
  <link rel="stylesheet" type="text/css"
		href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
  <link href="https://fonts.googleapis.com/css?family=Josefin+Sans|Open+Sans|Raleway" rel="stylesheet">
  <!-- <link rel="stylesheet" href="css/flexslider.css"> -->
  <!-- <link rel="stylesheet" href="css/font-awesome.min.css"> -->
  <!-- <link rel="stylesheet" href="css/style.css"> -->
  <!-- <link rel="stylesheet" href="css/style-rwd.css"> -->
  <link rel="stylesheet" type="text/css" href="css/blog.css">
  <!-- <link rel="stylesheet" type="text/css" href="css/homepage/homepage_rwd.css"> -->
</head>
<body>

    <div class="container">
        <div class="row justify-content-center mt-5">
            <h2 class="form-signin-heading">Please sign in</h2><br><br><br>
        </div>
    
        <div class="row justify-content-center">
            <div class="col-md-4 border rounded bg-light a">
                <form class="form mt-4 mb-4" method="post">

                <label for="email" >帳號</label>
                <div class="form-group">
                    <input id="email" type="email" name="email" placeholder="Email" class="form-control" value="<?php echo addslashes($_POST['email']); ?>" required autofocus/>
                </div>

                <label for="password">密碼</label>
                <div class="form-group">
                    <input id="password" type="password" name="password" placeholder="Password" class="form-control" value="<?php echo addslashes($_POST['password']); ?>" required/>
                </div>

                <!-- <div class="row justify-content-center"> -->
                    <input type="submit" name="submit" class="btn-block btn btn-success submit" value="login" >
                <!-- </div> -->
                </form>
            </div>
        </div>
    
    </div>
    <div class="container">
        <div class="row justify-content-center">
            <div class="text-center">
                <?php echo $error ?>
            </div>
        </div>
    </div>
</body>