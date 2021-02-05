<?php
  include "config.php";

  if(isset($_FILES['fileToUpload'])){
    $error = array();
    $file_name = mt_rand().$_FILES['fileToUpload']['name'];
    $file_size = $_FILES['fileToUpload']['size'];
    $file_tmp = $_FILES['fileToUpload']['tmp_name'];
    $file_type = $_FILES['fileToUpload']['type'];
    $tmp = explode('.', $file_name);
    $file_ext = end($tmp);
    $extensions = array("jpeg","jpg","png");

    if(in_array($file_ext,$extensions)===false){
      $error[] = "The file extenssion is not allowed, please choose jpeg,jpg or png format";

    }
    if($file_size > 2097152){
      $error[] = "The file size must be 2MB or lower";

    }
    if(empty($error)==true){
      move_uploaded_file($file_tmp,"upload/".$file_name);
    }else{
      print_r($error);
      die();
    }
  }
  session_start();
  $post_title = mysqli_real_escape_string($conn,$_REQUEST['post_title']);
  $post_description = mysqli_real_escape_string($conn,$_REQUEST['postdesc']);
  $post_category = mysqli_real_escape_string($conn,$_REQUEST['category']);
  $date = date("d M, Y");
  $author = $_SESSION['user_id'];

  $sql = "INSERT INTO news_post(title,description,category,post_date,author,post_img)
          VALUES('{$post_title}','{$post_description}','{$post_category}','{$date}','{$author}','{$file_name}');";
  $sql.="UPDATE news_category set post = post + 1 WHERE category_id = {$post_category}";
  if(mysqli_multi_query($conn,$sql)){
      header("Location: post.php");
  }
?>
