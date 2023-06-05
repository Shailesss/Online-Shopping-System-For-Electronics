<?php
include('config/constant.php');
     if(isset($_SESSION['user']))
     {
          if(isset($_GET['id']) && isset($_GET['price']))
          {
               
               $id=$_GET['id'];
               $price = $_GET['price'];
               $email = $_SESSION['user'];
               $quantity = 1;
               $total=$quantity*$price;
               $status = "in-the-cart";

               $sql = "INSERT INTO cart(id,price,total,email,quantity,status) VALUES ($id,$price,$total,'$email',$quantity,'$status')";
               $res = mysqli_query($con,$sql);
               if($res)
               {
                    header("location:".SITEURL."/cart.php");
               }   
               else
               {
                    $_SESSION['add-cart'] = '<div class="error"><h3>Something went wrong !</h2></div>';
                    header("location:".SITEURL."/product-description.php?id=$id");
               }  
          }
     }
     else
     {
          header("location:".SITEURL."/login.php");
     }
     
?>