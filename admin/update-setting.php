<?php
  include "config.php";
  if(isset($_REQUEST['submit'])){
    if(!empty($_FILES['new-image']['name'])){
      $errors = array();
      $file_name = mt_rand().$_FILES['new-image']['name'];
      $file_size = $_FILES['new-image']['size'];
      $file_tmp = $_FILES['new-image']['tmp_name'];
      $file_type = $_FILES['new-image']['type'];
      $tmp = explode('.',$file_name);
      $file_ext = end($tmp);
      $extension = array("jpeg","jpg","png");
      if(in_array($file_ext,$extension)==false){
        $errors[] = "The file type must be jpeg,jpg or png";
      }
      if($file_size > (2*1024*1024)){
        $errors[] = "The file size must be 2MB or lower";
      }
      if(empty($error)==true){
        move_uploaded_file($file_tmp,"images/".$file_name);
        $old_img = "images/".$_REQUEST['old-image'];
        unlink($old_img);
      }else{
        print_r($errors);
        die();
      }
    }else{
      $file_name = $_REQUEST['old-image'];
    }
    $page_name = $_REQUEST['page_title'];
    $footer_description = $_REQUEST['footer_description'];
    $page_img = $file_name;
    $sql = "UPDATE news_setting SET page_name = '{$page_name}', footer_description = '{$footer_description}',page_img = '{$page_img}'";
    if(mysqli_query($conn,$sql)){
      header("Location: users.php");
    }else{
      echo "Something went wrong";
    }
  }
?>
