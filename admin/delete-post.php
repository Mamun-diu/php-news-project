<?php
  include "config.php";
  if(isset($_REQUEST['id'])){
    $post_id = $_REQUEST['id'];
    $category_id = $_REQUEST['catid'];
    $post_img = $_REQUEST['post_img'];
    $sql = "DELETE FROM news_post where post_id = {$post_id};";
    $sql.= "UPDATE news_category SET post = post - 1 WHERE category_id={$category_id}";
    $delete = "upload/$post_img";
    unlink($delete);
    if(mysqli_multi_query($conn,$sql)){
      header("Location: post.php");
    }
  }
?>
