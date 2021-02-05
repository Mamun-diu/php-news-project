<?php
  include "header.php";
  include "config.php";
  if($_SESSION['role']==0){
    header("Location: add-post.php");
  }
  if(isset($_REQUEST['id'])){
    $id = $_REQUEST['id'];

    $sql = "SELECT * from news_user where user_id = '{$id}'";
    $result = mysqli_query($conn,$sql) or die("Query Failed");
    $row = mysqli_fetch_assoc($result);
  }
  $preusername = $row['username'];
  if(isset($_REQUEST['submit'])){
    $user_id = mysqli_real_escape_string($conn,$_REQUEST['user_id']);
    $f_name = mysqli_real_escape_string($conn,$_REQUEST['f_name']);
    $l_name = mysqli_real_escape_string($conn,$_REQUEST['l_name']);
    $username = mysqli_real_escape_string($conn,$_REQUEST['username']);
    $role = mysqli_real_escape_string($conn,$_REQUEST['role']);

    $sql1 = "SELECT username from news_user where username = '{$username}'";
    $result1 = mysqli_query($conn,$sql1);

    if($preusername == $username){
      $sql2 = "UPDATE news_user set  first_name = '{$f_name}', last_name = '{$l_name}', username = '{$username}', role = '{$role}' where user_id = '{$user_id}'";
      if(mysqli_query($conn,$sql2)){
        header("Location: users.php");
      }
    }else{
      if(mysqli_num_rows($result1)>0){
        echo "<p style='color:red;margin:10px 0;text-align:center;'>Username already exists.</p>";
      }else{
        $sql2 = "UPDATE news_user set  first_name = '{$f_name}', last_name = '{$l_name}', username = '{$username}', role = '{$role}' where user_id = '{$user_id}'";
        if(mysqli_query($conn,$sql2)){
          header("Location: users.php");
        }
      }
    }


  }
?>
  <div id="admin-content">
      <div class="container">
          <div class="row">
              <div class="col-md-12">
                  <h1 class="admin-heading">Modify User Details</h1>
              </div>
              <div class="col-md-offset-4 col-md-4">
                  <!-- Form Start -->
                  <form  action="<?php $_SERVER['PHP_SELF']; ?>" method ="POST">
                      <div class="form-group">
                          <input type="hidden" name="user_id"  class="form-control" value="<?php echo $row['user_id'] ?>" placeholder="" >
                      </div>
                          <div class="form-group">
                          <label>First Name</label>
                          <input type="text" name="f_name" class="form-control" value="<?php echo $row['first_name'] ?>" placeholder="" required>
                      </div>
                      <div class="form-group">
                          <label>Last Name</label>
                          <input type="text" name="l_name" class="form-control" value="<?php echo $row['last_name'] ?>" placeholder="" required>
                      </div>
                      <div class="form-group">
                          <label>User Name</label>
                          <input type="text" name="username" class="form-control" value="<?php echo $row['username'] ?>" placeholder="" required>
                      </div>
                      <div class="form-group">
                          <label>User Role</label>
                          <select class="form-control" name="role" value="<?php echo $row['role']; ?>">
                            <?php
                              if($row['role']==1){ ?>
                                <option value="0">normal User</option>
                                <option value="1" selected>Admin</option>
                              <?php }else{ ?>
                                <option value="0" selected>normal User</option>
                                <option value="1">Admin</option>
                            <?php  }
                             ?>

                          </select>
                      </div>
                      <input type="submit" name="submit" class="btn btn-primary" value="Update" required />
                  </form>
                  <!-- /Form -->
              </div>
          </div>
      </div>
  </div>
<?php include "footer.php"; ?>
