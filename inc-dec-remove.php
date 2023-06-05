<?php
include('config/constant.php');
if(isset($_GET['operation']) && isset($_GET['id']))
{
     $email = $_SESSION['user'];
     $id = $_GET['id'];

     $query2 = "SELECT product_stock FROM product WHERE id=$id";
     $res2 = mysqli_query($con,$query2);
     $row2 = mysqli_fetch_assoc($res2);
     $product_stock = $row2['product_stock'];

     $query3 = "SELECT quantity,price FROM cart WHERE id=$id";
     $res3 = mysqli_query($con,$query3);
     $row3 = mysqli_fetch_assoc($res3);
     $quantity = $row3['quantity'];
     $price = $row3['price'];
     
     if($_GET['operation']=="remove")
     {
          $query = "DELETE FROM cart WHERE id=$id";
          $res = mysqli_query($con,$query);
          if($res)
          {
               $_SESSION['I-D-R'] = '<script>alert("Product Removed.")</script>';
               header("location:".SITEURL."/cart.php");
          }
          else
          {
               $_SESSION['I-D-R'] = '<div class="error"><h3>Failed to remove from cart.</h3></div>';
               header("location:".SITEURL."/cart.php");
               die();
          }
     }

     if($_GET['operation']=="increment")
     {
          if($product_stock>$quantity)
          {
               $quantity=$quantity+1;
               $total = $quantity*$price;
               $query4 = "UPDATE cart SET total=$total, quantity=$quantity WHERE email='$email' AND id=$id";
               $res4 = mysqli_query($con,$query4);
               if($res4)
               {
                    $_SESSION['I-D-R'] = '<script>alert("Quantity increased.")</script>';
                    header("Location:".SITEURL."/cart.php");
               }
               else
               {
                    $_SESSION['I-D-R'] = '<script>alert("Failed to increase quantity. Something went wrong at our end.")</script>';
                    header("Location:".SITEURL."/cart.php");
                    die();
               }
          }
     }

     if($_GET['operation']=="decrement")
     {
          if($quantity!=1)
          {
               $quantity=$quantity-1;
               $total = $quantity*$price;
               $query4 = "UPDATE cart SET total=$total, quantity=$quantity WHERE email='$email' AND id=$id";
               $res4 = mysqli_query($con,$query4);
               if($res4)
               {
                    $_SESSION['I-D-R'] = '<script>alert("Quantity decreased.")</script>';
                    header("Location:".SITEURL."/cart.php");
               }
               else
               {
                    $_SESSION['I-D-R'] = '<script>alert("Failed to decreased quantity. Something went wrong at our end.")</script>';
                    header("Location:".SITEURL."/cart.php");
                    die();
               }
          }
          else
          {
               $_SESSION['I-D-R'] = '<div class="error"><h3>Quantity cannot be decreased further.</h3></div>';
               header("Location:".SITEURL."/cart.php");
          }
     }
}
     
?>