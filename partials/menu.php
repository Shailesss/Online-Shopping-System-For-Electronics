<?php 
include("config/constant.php");
include("partials/login-check.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
     <link rel="stylesheet" href="css/header-footer.css">
     <meta charset="UTF-8">
     <link type="" rel="icon" href="images/logo.png">
     <meta http-equiv="X-UA-Compatible" content="IE=edge">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
     <div class="menu">
     <img src="images/logo.png" alt="">

          <ul>
               <li>
                    <a>Profile</a>
                    <ul class="submenu">
                         <li><a href="myOrders.php">My orders</a></li>
                         <li><a href="update-profile.php">Update profile</a></li>
                    </ul>
               </li>
               <li><a href="home-page.php">Home</a></li>
               <li><a href="cart.php">Cart</a></li>
               <li><a href="message-us.php">Message Us</a></li>
               <li><a href="about-us.php">About Us</a></li>
               <li><a href="logout.php">Log Out</a></li>
          </ul>
     </div>
     <div class="search center">
          <form action="searched-product.php" method="get">
               <input type="search" name="product" title="Search here for your favorite product" placeholder="Let us know what are you looking for ?" required>
               <input type="submit" value="Search">
          </form>
     </div>