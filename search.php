<?php
  include 'header.php';
  include 'config.php';
?>
    <div id="main-content">
      <div class="container">
        <div class="row">
            <div class="col-md-8">
                <!-- post-container -->
                <div class="post-container">
                  <?php
                    if(isset($_REQUEST['search'])){
                      $search = $_REQUEST['search'];
                      $limit = 3;
                      if(isset($_REQUEST['page'])){
                        $page_no = $_REQUEST['page'];
                      }else{
                        $page_no = 1;
                      }
                        $offset = ($page_no-1)*$limit;
                        $sql = "SELECT * FROM news_post
                          LEFT JOIN news_category ON news_post.category = news_category.category_id
                          LEFT JOIN news_user ON news_post.author = news_user.user_id
                          WHERE news_post.title LIKE '%{$search}%'
                          order by news_post.post_id DESC LIMIT {$offset},{$limit} ";

                          $result = mysqli_query($conn,$sql);
                    }
                  ?>
                  <h2 class="page-heading">Search : <?php echo $search; ?></h2>
                    <div class="post-content">
                      <?php
                        if(mysqli_num_rows($result)>0){
                          while($row=mysqli_fetch_assoc($result)){ ?>
                            <div class="row">
                                <div class="col-md-4">
                                    <a class="post-img" href="single.php"><img src="admin/upload/<?php echo $row['post_img']; ?>" alt=""/></a>
                                </div>
                                <div class="col-md-8">
                                    <div class="inner-content clearfix">
                                        <h3><a href='single.php'><?php echo $row['title']; ?></a></h3>
                                        <div class="post-information">
                                            <span>
                                                <i class="fa fa-tags" aria-hidden="true"></i>
                                                <a href='index.php?id=<?php echo $row['category_id']; ?>'><?php echo $row['category_name']; ?></a>
                                            </span>
                                            <span>
                                                <i class="fa fa-user" aria-hidden="true"></i>
                                                <a href='author.php'><?php echo $row['username']; ?></a>
                                            </span>
                                            <span>
                                                <i class="fa fa-calendar" aria-hidden="true"></i>
                                                <?php echo $row['post_date']; ?>
                                            </span>
                                        </div>
                                        <p class="description">
                                            <?php echo substr($row['description'],0,150)."...."; ?>
                                        </p>
                                        <?php
                                          if(strlen($row['description'])>150){ ?>
                                            <a class='read-more pull-right' href='single.php?id=<?php echo $row['post_id']; ?>'>read more</a>"
                                      <?php    }
                                        ?>

                                    </div>
                                </div>
                            </div>
                      <?php    }
                    }else{
                      echo "<h1>No Data Found</h1>";
                    }
                      ?>

                    </div>
                    <?php
                      $sql1 = "SELECT * FROM news_post WHERE news_post.title LIKE '%{$search}%'";
                      $result1 = mysqli_query($conn,$sql1) or die("Query Failed");
                      if(mysqli_num_rows($result1)>0){
                      $total_record = mysqli_num_rows($result1);
                      $total_pages = ceil($total_record/$limit);
                      echo "<ul class='pagination admin-pagination'>";
                      if($page_no>1){
                        $prev = $page_no-1;
                        echo '<li><a href="post.php?page='.$prev.'">Prev</a></li>';
                      }

                      for ($i=1; $i <= $total_pages; $i++) {
                        if($page_no==$i){
                          $active = "active";
                        }else{
                          $active = "";
                        }
                        echo "<li class='{$active}'><a href='post.php?page=$i'>$i</a></li>";
                      }
                      if($page_no<$total_pages){
                        $next = $page_no+1;
                        echo '<li><a href="post.php?page='.$next.'">Next</a></li>';
                      }
                      echo "</ul>";
                    }
                    ?>
                </div><!-- /post-container -->
            </div>
            <?php include 'sidebar.php'; ?>
        </div>
      </div>
    </div>
<?php include 'footer.php'; ?>
