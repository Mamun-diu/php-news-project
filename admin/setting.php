<?php
  include "config.php";
  session_start();
  if($_SESSION['role']==0){
    header("Location: add-post.php");
  }
  $sql = "SELECT * FROM news_setting";
  $result = mysqli_query($conn,$sql) or die("Query Failed");
  $row = mysqli_fetch_assoc($result);
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
        <title>ADMIN Panel</title>
        <!-- Bootstrap -->
        <link rel="stylesheet" href="../css/bootstrap.min.css" />
        <!-- Font Awesome Icon -->
        <link rel="stylesheet" href="../css/font-awesome.css">
        <!-- Custom stlylesheet -->
        <link rel="stylesheet" href="../css/style.css">
    </head>
    <body>
        <!-- HEADER -->
        <div id="header-admin">
            <!-- container -->
            <div class="container">
                <!-- row -->
                <div class="row">
                    <!-- LOGO -->
                    <div class="col-md-2">
                        <a href="post.php"><img class="logo" src="images/news.jpg"></a>
                    </div>
                    <!-- /LOGO -->
                      <!-- LOGO-Out -->
                    <div class="col-md-offset-7  col-md-3">
                        <span class="admin-logout">Hello almamun, </span>
                        <a style="float:right" href="logout.php" class="admin-logout" > logout</a>
                    </div>
                    <!-- /LOGO-Out -->
                </div>
            </div>
        </div>
        <!-- /HEADER -->
        <!-- Menu Bar -->
        <div id="admin-menubar">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                       <ul class="admin-menu">
                          <li>
                              <a href="post.php">Post</a>
                          </li>
                            <li>
                                <a href="category.php">Category</a>
                            </li>
                            <li>
                                <a href="users.php">Users</a>
                            </li>
                            <li>
                                <a href="setting.php">Setting</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <!-- /Menu Bar -->
<div id="admin-content">
  <div class="container">
  <div class="row">
    <div class="col-md-12">
        <h1 class="admin-heading">Update Page</h1>
    </div>
    <div class="col-md-offset-3 col-md-6">

        <!-- Form for show edit-->
        <form action="update-setting.php" method="POST" enctype="multipart/form-data" autocomplete="off">
            <div class="form-group">
                <label for="exampleInputTile">Page Title</label>
                <input type="text" name="page_title"  class="form-control" id="exampleInputUsername" value="<?php echo $row['page_name']; ?>">
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Footer Description</label>
                <textarea name="footer_description" class="form-control"  required rows="5">
                  <?php echo $row['footer_description']; ?>
                </textarea>
            </div>

            <div class="form-group">
                <label for="">Page image</label>
                <input type="file" name="new-image">
                <img  src="images/<?php echo $row['page_img']; ?>" height="150px">
                <input type="hidden" name="old-image" value="<?php echo $row['page_img']; ?>">
            </div>
            <input type="submit" name="submit" class="btn btn-primary" value="Update" />
        </form>
        <!-- Form End -->
      </div>
    </div>
  </div>
</div>
<!-- Footer -->
<div id ="footer">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <span>©Copyright 2021 News | Powered by <a href="https://www.microdeveloperbd.com">Developer Mamun</a></span>
            </div>
        </div>
    </div>
</div>
<!-- /Footer -->
</body>
</html>
