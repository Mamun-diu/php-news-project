<?php
  include "config.php";
  $page = basename($_SERVER['PHP_SELF']);
  switch ($page) {
    case 'single.php':
      $id = $_REQUEST['id'];
      $sql = "SELECT * FROM news_post where post_id = {$id}";
      $result = mysqli_query($conn,$sql);
      $row = mysqli_fetch_assoc($result);
      $page_title = $row['title'];
      break;
    case 'search.php':
      $page_title = $_REQUEST['search'];
      break;
    case 'index.php':
      if(isset($_REQUEST['id'])){
        $id = $_REQUEST['id'];
        $sql = "SELECT * FROM news_category where category_id = {$id}";
        $result = mysqli_query($conn,$sql);
        $row = mysqli_fetch_assoc($result);
        $page_title = $row['category_name'];
      }else{
        $page_title = "NEWS SITE";
      }
      break;
    default:
      $page_title = "NEWS SITE";
      break;
  }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title><?php echo $page_title; ?></title>
    <!-- Bootstrap -->
    <link rel="stylesheet" href="css/bootstrap.min.css" />
    <!-- Font Awesome Icon -->
    <link rel="stylesheet" href="css/font-awesome.css">
    <!-- Custom stlylesheet -->
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
<!-- HEADER -->
<div id="header">
    <!-- container -->
    <div class="container">
        <!-- row -->
        <div class="row">
            <!-- LOGO -->
            <div class=" col-md-offset-4 col-md-4">
                <a href="index.php" id="logo"><img src="images/news.jpg"></a>
            </div>
            <!-- /LOGO -->
        </div>
    </div>
</div>
<!-- /HEADER -->
<!-- Menu Bar -->
<div id="menu-bar">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <ul class='menu'>
                  <?php
                    include "config.php";
                    $sql = "SELECT * FROM news_category";
                    $result = mysqli_query($conn,$sql) or die("Query Failed");
                    if(mysqli_num_rows($result)>0){
                      while($row=mysqli_fetch_assoc($result)){

                        if(isset($_REQUEST['id'])){
                          $id = $_REQUEST['id'];
                          if($row['category_id']==$id){
                            $active = "active";
                          }else{
                            $active = "";
                          }
                        }else{
                          $active = "";
                        } ?>
                        <li ><a class="<?php echo $active; ?>" href='index.php?id=<?php echo $row['category_id']; ?>'><?php echo $row['category_name']; ?></a></li>
                    <?php  }
                    }
                   ?>
                </ul>
            </div>
        </div>
    </div>
</div>
<!-- /Menu Bar -->
