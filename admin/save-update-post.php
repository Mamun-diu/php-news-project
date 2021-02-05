<?php
  include "config.php";
  if(isset($_REQUEST['submit'])){
    if(!empty($_FILES['new-image']['name'])){
      $errors = array();
      $file_name = mt_rand().$_FILES['new-image']['name'];
      $file_size = $_FILES['new-image']['size'];
      $file_tmp = $_FILES['new-image']['tmp_name'];
      $file_type = $_FILES['new-image']['type'];
      $tmp = explode(".",$file_name);
      $file_ext = end($tmp);
      $extension = array("png","jpeg","jpg");
      if(in_array($file_ext,$extension)===false){
        $errors[] = "The file type must be jpge,jpg or png";
      }
      if($file_size > (2*1024*1024)){
        $errors[] = "The file must be 2MB or lower";
      }
      if(empty($errors)==true){
        $old_image = $_REQUEST['old-image'];
        $path = "upload/$old_image";
        unlink($path);
        move_uploaded_file($file_tmp,"upload/".$file_name);
      }else{
        print_r($errors);
        die();
      }
    }else{
      $file_name = $_REQUEST['old-image'];

    }
    $post_id = $_REQUEST['post_id'];
    $post_title = mysqli_real_escape_string($conn,$_REQUEST['post_title']);
    $postdesc = mysqli_real_escape_string($conn,$_REQUEST['postdesc']);
    $category = $_REQUEST['category'];

    $sql = "UPDATE news_post SET title = '{$post_title}', description = '{$postdesc}', category = {$category}, post_img = '{$file_name}' WHERE post_id = {$post_id}";
    if(mysqli_query($conn,$sql)){
      header("Location: post.php");
    }
  }
?>
