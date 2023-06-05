<?php include("partials/menu.php"); ?>
<!DOCTYPE html>
<html lang="en">
     <head>
          <link rel="stylesheet" href="css/homepage.css">
          <meta charset="UTF-8">
          <meta http-equiv="X-UA-Compatible" content="IE=edge">
          <meta name="viewport" content="width=device-width, initial-scale=1.0">
     </head>
     <body>
          <div class="main-content">
               <div class="linen-color"><br>
                    <div>
                         <?php
                              $product = $_GET['product'];
                              $sql = "SELECT * FROM product WHERE product_name LIKE '%$product%' OR product_category LIKE '%$product%'";
                              $res = mysqli_query($con, $sql);
                              $count = mysqli_num_rows($res);
                              if($count>0)
                              {
                                   while($row = mysqli_fetch_assoc($res))
                                   {
                         ?>
                         <title><?php echo $product; ?> - Gada Electronics</title>
                         <div class="col3 center">
                              <img src="images/product/<?php echo $row['image1']; ?>" alt=""><br><br>
                              <h2><?php echo $row['product_name']; ?></h2>
                              <h3>Rs. <?php echo $row['price']; ?></h3>
                         </div>
                         <?php
                                   }
                              }
                              else
                              {
                         ?>
                         <div class="center"><img id="err" src="images/error.png" height="395px" alt=""></div>   
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