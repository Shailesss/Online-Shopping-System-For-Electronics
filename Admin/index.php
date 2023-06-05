<?php include("partials/menu.php")?>
<head>
     <title>Admin - Dashboard</title>
</head>
<div class="wrapper">
     <div class="main-content"><br>
          <h1 class="text-center">Dashboard</h1><br><br>
          <div class="col-4 text-center">
               <img src="../images/customer.png" width=100% id="dashboard-image">
               <div>
                    <?php
                         $sql = "SELECT * FROM customer";
                         $res = mysqli_query($con, $sql);
                         $count = mysqli_num_rows($res);
                    ?>
                    <br>
                    <h1><?php echo $count; ?></h1>
                    <br>
                    <h2 class="color-white">Customers</h2>
               </div>
          </div>
          <div class="col-4 text-center">
               <img src="../images/product.png" width=100% id="dashboard-image">
               <div>
                    <?php
                         $sql = "SELECT * FROM product";
                         $res = mysqli_query($con, $sql);
                         $count = mysqli_num_rows($res);
                    ?>
                    <br>
                    <h1><?php echo $count; ?></h1>
                    <br>
                    <h2 class="color-white">Products</h2>
               </div>
          </div>
          <div class="col-4 text-center">
               <img src="../images/order.png" width=100% id="dashboard-image">
               <div>
                    <?php
                         $sql = "SELECT * FROM cart WHERE status='in-process'";
                         $res = mysqli_query($con, $sql);
                         $count = mysqli_num_rows($res);
                    ?>
                    <br>
                    <h1><?php echo $count; ?></h1>
                    <br>
                    <h2 class="color-white">Orders</h2>
               </div>
          </div>
          <div class="col-4 text-center">
               <img src="../images/message.png" width=100% id="dashboard-image">
               <div>
                    <?php
                         $sql = "SELECT * FROM message WHERE reply='in process'";
                         $res = mysqli_query($con, $sql);
                         $count = mysqli_num_rows($res);
                    ?>
                    <br>
                    <h1><?php echo $count; ?></h1>
                    <br>
                    <h2 class="color-white">Messages</h2>
               </div>
          </div>
          <div class="col-4 text-center">
               <img src="../images/revenue.png" width=100% id="dashboard-image">
               <div>
                    <?php
                         $sql = "SELECT SUM(total_price) AS paisa FROM payment";
                         $res = mysqli_query($con, $sql);
                         $row = mysqli_fetch_assoc($res);
                    ?>
                    <br>
                    <h1>₹. <?php echo $row['paisa']; ?></h1>
                    <br>
                    <h2 class="color-white">Revenue</h2>
               </div>
          </div>
          <div class="clearfix"></div>
     </div>
     <br><br> <br><br>
</div>
<?php include("partials/footer.php")?>