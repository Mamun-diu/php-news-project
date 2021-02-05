<?php
  include "config.php";
  $sql = "SELECT * FROM news_setting";
  $result = mysqli_query($conn,$sql);
  $row = mysqli_fetch_assoc($result);
 ?>
<!-- Footer -->
<div id ="footer">
    <div class="container">
        <div class="row">
            <div class="col-md-12">

                <span><?php echo $row['footer_description']; ?> </span>
            </div>
        </div>
    </div>
</div>
<!-- /Footer -->
</body>
</html>
