<?php
  include "header.php";
  include "config.php";
  if($_SESSION['role']==0){
    header("Location: add-post.php");
  }


  $limit = 3;
  if(isset($_REQUEST['page'])){
    $page_no = $_REQUEST['page'];
  }else{
    $page_no = 1;
  }
    $offset = ($page_no-1)*$limit;
    $sql = "SELECT * FROM news_user order by user_id DESC LIMIT {$offset},{$limit} ";
    $result = mysqli_query($conn,$sql);

?>
  <div id="admin-content">
      <div class="container">
          <div class="row">
              <div class="col-md-10">
                  <h1 class="admin-heading">All Users</h1>
              </div>
              <div class="col-md-2">
                  <a class="add-new" href="add-user.php">add user</a>
              </div>
              <div class="col-md-12">
                <?php if(mysqli_num_rows($result)<=0){
                  echo "</h1>No data found.</h1>";
                }else{  ?>
                  <table class="content-table">
                      <thead>
                          <th>S.No.</th>
                          <th>Full Name</th>
                          <th>User Name</th>
                          <th>Role</th>
                          <th>Edit</th>
                          <th>Delete</th>
                      </thead>
                      <tbody>
                        <?php $i = 1; while($row = mysqli_fetch_assoc($result)){  ?>
                          <tr>
                              <td class='id'><?php echo $i++; ?></td>
                              <td><?php echo $row['first_name']." ".$row['last_name']; ?></td>
                              <td><?php echo $row['username']; ?></td>
                              <td><?php if($row['role']==1){echo "Admin";}else{echo "Normal User";} ?></td>
                              <td class='edit'><a href='update-user.php?id=<?php echo $row["user_id"]; ?>'><i class='fa fa-edit'></i></a></td>
                              <td class='delete'><a href='delete-user.php?id=<?php echo $row["user_id"]; ?>'><i class='fa fa-trash-o'></i></a></td>
                          </tr>
                        <?php  } ?>
                      </tbody>
                  </table>
              <?php  }

                $sql1 = "SELECT * FROM news_user";
                $result1 = mysqli_query($conn,$sql1) or die("Query Failed");
                if(mysqli_num_rows($result1)){
                  $total_record = mysqli_num_rows($result1);
                  $total_pages = ceil($total_record/$limit);
                  echo "<ul class='pagination admin-pagination'>";
                  if($page_no>1){
                    $prev = $page_no-1;
                    echo '<li><a href="users.php?page='.$prev.'">Prev</a></li>';
                  }

                  for ($i=1; $i <= $total_pages; $i++) {
                    if($page_no==$i){
                      $active = "active";
                    }else{
                      $active = "";
                    }
                    echo "<li class='{$active}'><a href='users.php?page=$i'>$i</a></li>";
                  }
                  if($page_no<$total_pages){
                    $next = $page_no+1;
                    echo '<li><a href="users.php?page='.$next.'">Next</a></li>';
                  }
                  echo "</ul>";
                }

              ?>

              </div>
          </div>
      </div>
  </div>
