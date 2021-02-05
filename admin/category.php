<?php
include "header.php";
include "config.php";
if($_SESSION['role']==0){
  header("Location: add-post.php");
}
 ?>
<div id="admin-content">
    <div class="container">
        <div class="row">
            <div class="col-md-10">
                <h1 class="admin-heading">All Categories</h1>
            </div>
            <div class="col-md-2">
                <a class="add-new" href="add-category.php">add category</a>
            </div>
            <div class="col-md-12">
                <table class="content-table">
                    <thead>
                        <th>S.No.</th>
                        <th>Category Name</th>
                        <th>No. of Posts</th>
                        <th>Edit</th>
                        <th>Delete</th>
                    </thead>
                    <tbody>
                      <?php
                        $limit = 3;
                        if(isset($_REQUEST['page'])){
                          $page_no = $_REQUEST['page'];
                        }else{
                          $page_no = 1;
                        }
                        $offset = ($page_no - 1)*$limit;
                        $sql = "select * from news_category LIMIT {$offset},{$limit}";
                        $result = mysqli_query($conn,$sql);
                        if(mysqli_num_rows($result)>0){
                          while($row = mysqli_fetch_assoc($result)){ ?>
                            <tr>
                                <td class='id'><?php echo $row['category_id']; ?></td>
                                <td><?php echo $row['category_name']; ?></td>
                                <td><?php echo $row['post']; ?></td>
                                <td class='edit'><a href=''><i class='fa fa-edit'></i></a></td>
                                <td class='delete'><a href=''><i class='fa fa-trash-o'></i></a></td>
                            </tr>
                        <?php  }
                        }
                      ?>


                    </tbody>
                </table>
                <?php
                  $sql1 = "SELECT * FROM news_category";
                  $result1 = mysqli_query($conn,$sql1) or die("Query Failed");
                  if(mysqli_num_rows($result1)>0){
                    $total_record = mysqli_num_rows($result1);
                    $total_pages = ceil($total_record/$limit);
                    echo "<ul class='pagination admin-pagination'>";
                    if($page_no>1){
                      $prev = $page_no -1;
                      echo '<li><a href = "category.php?page='.$prev.'">Prev</a></li>';
                    }
                    for($i = 1;$i<=$total_pages;$i++){
                      if($page_no==$i){
                        $active = "active";
                      }else{
                        $active = "";
                      }
                      echo "<li class='{$active}'><a href='category.php?page=$i'>$i</a></li>";
                    }
                    if($page_no<$total_pages){
                      $next = $page_no + 1;
                      echo '<li><a href="category.php?page='.$next.'">Next</a></li>';
                    }
                    echo "</ul>";
                  }
                ?>


            </div>
        </div>
    </div>
</div>
<?php include "footer.php"; ?>
