<?php include("partials/menu.php") ;
     $id = $_GET['id'];
     $sql = "SELECT * FROM product WHERE id=$id";
     $res= mysqli_query($con,$sql);
     $row = mysqli_fetch_assoc($res);
     $title = $row['product_name'];
     $image1 = $row['image1'];
     $image2 = $row['image2'];
     $image3 = $row['image3'];
     $price = $row['price'];
     $category = $row['product_category'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
     <link rel="stylesheet" href="css/homepage.css">
     <meta charset="UTF-8">
     <meta http-equiv="X-UA-Compatible" content="IE=edge">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title><?php echo $title; ?></title>
</head>
<body>
     <div class="main-content">
          <div class="wrapper linen-color">
                   <br><i> <a href="home-page.php">Home</a> > <?php echo $title; ?> > <?php echo $category; ?> </i>        
               <br><br>
               <hr>
               <?php
               if(isset($_SESSION['add-cart']))
               {
                    echo $_SESSION['add-cart'];
                    unset($_SESSION['add-cart']);
               }
               ?>
               <br>
               <center>
                    <br><h1 class="red"><?php echo $title; ?></h1>
                    <br><h4><?php echo $category; ?></h4><br><br>

                    <div class="imgline">
                         <img class="image-3" src="images/product/<?php echo $image1; ?>" alt="">
                         <img class="image-3" src="images/product/<?php echo $image2; ?>" alt="">
                         <img class="image-3" src="images/product/<?php echo $image3; ?>" alt="">
                         <div class="clear-fix"></div>
                    </div>
                    <br><br>
                    <h2 class='green'>Price:  ₹ <?php echo $price; ?></h2><br><br>
                    <br>
                    <?php
                    if(isset($_SESSION['user']))
                         {
                              $check_query = "SELECT cart.id AS c FROM product INNER JOIN cart ON cart.id=product.id WHERE cart.transaction_method=''";
                              $res_c = mysqli_query($con,$check_query);
                              $count = mysqli_num_rows($res_c);
                              //print_r($res_c);
                              $row_c = mysqli_fetch_assoc($res_c);
                              
                              if($count>0 && $id==$row_c['c'])
                              {
                              ?>
                              <a href="<?php echo SITEURL;?>/cart.php" class="btn-primary">GO TO CART</a>
                              <?php
                              }
                              else
                              {
                              ?>
                              <a href="<?php echo SITEURL;?>/add-to-cart.php?id=<?php echo $id;?>&price=<?php echo $price;?>" class="btn-primary">ADD TO CART</a>
                              <?php
                              }
                         }
                    ?>
                <br>    
               </center>
               <br><br><br>
          </div>
     </div>
</body>
</html>
<?php include("partials/footer.php") ?>