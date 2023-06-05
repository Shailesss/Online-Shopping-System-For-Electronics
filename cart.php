<?php 
include("partials/menu.php");
$date=date_create(date("Y-m-d"));
date_add($date,date_interval_create_from_date_string("6 days"));
$tarikh = date_format($date,"l, F j");
$email = $_SESSION['user'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
     <meta charset="UTF-8">
     <meta http-equiv="X-UA-Compatible" content="IE=edge">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title><?php echo $_COOKIE['name']; ?>'s Cart - Gada Electronics</title>
     <link rel="stylesheet" href="css/cart.css">
</head>
<body>
     <div class="main-content">
          <div class="linen-color">
               <br>
               <center><h1 class="red">Cart</h1></center>
               <br><br>
 
               <?php
               
               if(isset($_SESSION['I-D-R']))
               {
                    echo $_SESSION['I-D-R'];
                    unset($_SESSION['I-D-R']);
               }
                    $sql = "SELECT * FROM cart INNER JOIN product ON cart.id=product.id WHERE cart.email='$email' AND cart.status='in-the-cart'";
                    $res = mysqli_query($con,$sql);
                    $count=mysqli_num_rows($res);
                    if($count>0)
                    {
                         $sql_sum = "SELECT SUM(total) AS t FROM cart WHERE email='$email' AND status='in-the-cart'";
                         $res_sum = mysqli_query($con,$sql_sum);
                         $row_sum = mysqli_fetch_assoc($res_sum);
                         ?>        <br>               
                         <div class="cart-list">
                              <h1 class="green">Total Amount (<?php echo $count;?> items) : ₹ <?php echo $row_sum['t'];?></h1>
                         </div>  
                         <?php
                         while($row=mysqli_fetch_assoc($res))
                         {
                              ?>
                              <div class="cart-list">
                                   <i>Delivery by : <?php echo $tarikh; ?></i>
                                   <div class="img">
                                        <img src="<?php echo SITEURL ?>/images/product/<?php echo $row['image1'] ?>" width="200px" height="225px" alt=""><br><br>
                                        <center>
                                             <a href="<?php echo SITEURL;?>/inc-dec-remove.php?operation=increment&id=<?php echo $row['id'];?>">+</a> <?php echo $row['quantity'] ?> <a href="<?php echo SITEURL;?>/inc-dec-remove.php?operation=decrement&id=<?php echo $row['id'];?>">−</a>
                                        </center>
                                   </div>                  
                                   <br><br><br>
                                   <h1><?php echo $row['product_name'] ?></h1><br>
                                   <h2>₹. <?php echo $row['price'] ?></h2><br>
                                   <br><br>
                                   <a id="remove" href="<?php echo SITEURL;?>/inc-dec-remove.php?operation=remove&id=<?php echo $row['id'];?>">REMOVE</a>
                                   <div class="clearfix"></div>                    
                              </div>
                              <?php
                         } 
                              ?>
                              <div class="cart-list">
                                   <center>
                                        <a href="<?php echo SITEURL ?>/place-order.php" class="place">
                                             Place Order
                                        </a>
                                   </center>
                              </div>   
                              <?php                    
                    }
                    else
                    {
                         echo '<center><img width="600px" height="400px" src="images/empty.png" alt="Cart is empty"></center>';
                         
                    }
               ?>                 
               
               <br><br>
          </div>
     </div>
</body>

</html>
<?php include("partials/footer.php");
$sql = "insert into orders(order_date) values (sysdate());";
?>