<?php
  include "config.php";
  if($_SESSION['role']==0){
    header("Location: add-post.php");
  }
  if(isset($_REQUEST['id'])){
    $id = $_REQUEST['id'];
    $sql = "DELETE FROM news_user where user_id = '{$id}'";
    if(mysqli_query($conn,$sql)){
      header("Location: users.php");
    }
  }
 ?>
