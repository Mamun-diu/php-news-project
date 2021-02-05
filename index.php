<?php include 'header.php'; ?>
    <div id="main-content">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <!-- post-container -->
                    <div class="post-container">
                      <?php
                        include "config.php";
                        $limit = 3;
                        if(isset($_REQUEST['page'])){
                          $page_no = $_REQUEST['page'];
                        }else{
                          $page_no = 1;
                        }
                        $offset = ($page_no-1)*$limit;
                        if(isset($_REQUEST['id'])){
                          $id = $_REQUEST['id'];
                          $sql = "SELECT * FROM news_post
                            LEFT JOIN news_category ON news_post.category = news_category.category_id
                            LEFT JOIN news_user ON news_post.author = news_user.user_id
                            WHERE news_category.category_id = {$id}
                            order by news_post.post_id DESC LIMIT {$offset},{$limit}";
                        }else{
                          $sql = "SELECT * FROM news_post
                            LEFT JOIN news_category ON news_post.category = news_category.category_id
                            LEFT JOIN news_user ON news_post.author = news_user.user_id
                            order by news_post.post_id DESC LIMIT {$offset},{$limit} ";
                        }
                       

                        $result = mysqli_query($conn,$sql) or die("Query Failed");
                        if(mysqli_num_rows($result)>0){
                          while($row=mysqli_fetch_assoc($result)){


                      ?>
                        <div class="post-content">
                            <div class="row">
                                <div class="col-md-4">
                                    <a class="post-img" href="single.php?id=<?php echo $row['post_id']; ?>"><img src="admin/upload/<?php echo $row['post_img']; ?>" alt=""/></a>
                                </div>
                                <div class="col-md-8">
                                    <div class="inner-content clearfix">
                                        <h3><a href='single.php?id=<?php echo $row['post_id']; ?>'><?php echo $row['title']; ?></a></h3>
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
                                            <?php echo substr($row['description'],0,150)."..."; ?>
                                        </p>
                                        <a class='read-more pull-right' href='single.php?id=<?php echo $row['post_id']; ?>'>read more</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php
                          }
                        }
                        if(isset($_REQUEST['id'])){
                          $id = $_REQUEST['id'];
                          $sql1 = "SELECT * FROM news_post
                            LEFT JOIN news_category ON news_post.category = news_category.category_id
                            LEFT JOIN news_user ON news_post.author = news_user.user_id
                            WHERE news_category.category_id = {$id}
                            order by news_post.post_id DESC LIMIT {$offset},{$limit}";
                        }else{
                          $sql1 = "SELECT * FROM news_post";
                        }

                          $result1 = mysqli_query($conn,$sql1) or die("Query Failed");
                          if(mysqli_num_rows($result1)){
                            $total_record = mysqli_num_rows($result1);
                            $total_pages = ceil($total_record/$limit);
                            echo "<ul class='pagination admin-pagination'>";
                            if($page_no>1){
                              $prev = $page_no-1;
                              echo '<li><a href="index.php?page='.$prev.'">Prev</a></li>';
                            }

                            for ($i=1; $i <= $total_pages; $i++) {
                              if($page_no==$i){
                                $active = "active";
                              }else{
                                $active = "";
                              }
                              echo "<li class='{$active}'><a href='index.php?page=$i'>$i</a></li>";
                            }
                            if($page_no<$total_pages){
                              $next = $page_no+1;
                              echo '<li><a href="index.php?page='.$next.'">Next</a></li>';
                            }
                            echo "</ul>";
                          }
                        ?>
                        <!-- <ul class='pagination'>
                            <li class="active"><a href="">1</a></li>
                            <li><a href="">2</a></li>
                            <li><a href="">3</a></li>
                        </ul> -->
                    </div><!-- /post-container -->
                </div>
                <?php include 'sidebar.php'; ?>
            </div>
        </div>
    </div>
<?php include 'footer.php'; ?>
