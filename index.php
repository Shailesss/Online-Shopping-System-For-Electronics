<?php include("config/constant.php"); ?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Gada Electronics</title>
        <link rel="stylesheet" href="css/style.css">
        <link type="" rel="icon" href="images/logo.png">
    </head>
    <body>
        <div class="menu">
        <img src="images/logo.png" alt="">
            <div class="wrapper">
                <ul>
                    <li><a href="signup.php">Sign up</a></li>
                    <li><a href="login.php">Login</a></li>
                </ul>
            </div>
        </div>      
        <div class="search-item">
            <div class="wrapper text-center">
                <form action="searched-product.php" method="post">
                    <input type="search" name="product" placeholder="Let us know what you are looking for ?" title="Search here"
                        required>
                    <button type="submit">Search</button>
                </form>
            </div>
        </div>
        <div class="main-content">
            
            <div class="wrapper">
                <div>
                    <h1 class="text-center">Trending Product</h1><br>
                </div>
                <div>
                         <?php
                              $sql = "SELECT * FROM product WHERE product_stock >0 LIMIT 6";
                              $res = mysqli_query($con, $sql);
                              while($row = mysqli_fetch_assoc($res))
                              {
                         ?>
                         <a href="login.php">
                         <div class="col3 center">
                              <img src="images/product/<?php echo $row['image1']; ?>" alt=""><br><br>
                              <h2><?php echo $row['product_name']; ?></h2>
                              <h3>Rs. <?php echo $row['price']; ?></h3>
                         </div></a>
                         <?php
                              }
                         ?>    
                         <center><p><a href="login.php">Show more</a></p></center>                     
                         <div class="clear-fix"></div>
                         <br>
                    </div>
                <div class="clear-fix"></div>
            </div>
        </div>
        
        
        <div class="footer">
            <br>
           <hr>
            <div class="wrapper text-center">
                © 2023 - All rights reserved - Gada Electronics
            </div>
        </div>
        
    </body>

</html>