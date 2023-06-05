<?php 
include("../config/constant.php");
include("../partials/login-check.php"); 
?>
<!DOCTYPE html>
<html lang="en">

     <head>
          <meta charset="UTF-8">
          <meta http-equiv="X-UA-Compatible" content="IE=edge">
          <meta name="viewport" content="width=device-width, initial-scale=1.0">
          <link type="" rel="icon" href="../images/logo.png">
          <link rel="stylesheet" href="../css/admin-style.css">
     </head>

     <body>
          <div class="menu text-center">
               <ul>
                    <li><img src="../images/logo.png" width="150px" height="50px" alt=""></li>
                    <li><a href="<?php echo SITEURL;?>/Admin/">Dashboard</a></li>
                    <li><a href="<?php echo SITEURL;?>/Admin/manage-product.php">Manage Product</a></li>
                    <li><a>Manage Orders</a>
                         <ul class="submenu">
                              <li><a href="<?php echo SITEURL;?>/Admin/manage-orders.php">New orders</a></li>
                              <li><a href="<?php echo SITEURL;?>/Admin/every-order.php?type=delivered">Delivered orders</a></li>
                              <li><a href="<?php echo SITEURL;?>/Admin/every-order.php?type=cancelled">Cancelled orders</a></li>
                         </ul>
                    </li>
                    <li><a href="<?php echo SITEURL;?>/Admin/manage-message.php">Messages</a></li>
                    <li><a href="../logout.php">Log Out</a></li>
               </ul>
          </div>