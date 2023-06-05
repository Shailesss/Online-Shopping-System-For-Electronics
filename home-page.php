<?php include("partials/menu.php"); ?>
<!DOCTYPE html>
<html lang="en">
<head>
     <link rel="stylesheet" href="css/homepage.css">
     <meta charset="UTF-8">
     <meta http-equiv="X-UA-Compatible" content="IE=edge">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>Hello, <?php echo $_COOKIE['name']; ?></title>
</head>
<body>
     <div class="main-content">
               <div class="linen-color"><br>
                    <div>
                         <?php
                              $sql = "SELECT * FROM product WHERE product_stock >0";
                              $res = mysqli_query($con, $sql);
                              while($row = mysqli_fetch_assoc($res))
                              {
                         ?>
                         <a href="product-description.php?id=<?php echo $row['id']; ?>">
                         <div class="col3 center">
                              <img src="images/product/<?php echo $row['image1']; ?>" alt=""><br><br>
                              <h2><?php echo $row['product_name']; ?></h2>
                              <h3>Rs. <?php echo $row['price']; ?></h3>
                         </div></a>
                         <?php
                              }
                         ?>                         
                         <div class="clear-fix"></div>
                         <br>
                    </div>
               </div>
          
     </div>
</body>
</html>
<?php include("partials/footer.php"); ?>