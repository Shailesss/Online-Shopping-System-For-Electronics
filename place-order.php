<?php 
     include("config/constant.php"); 
     $email = $_SESSION['user'];
     $sql = "SELECT * FROM customer WHERE email='$email'";
     $result = mysqli_query($con,$sql);
     if($result)
     {
          $row = mysqli_fetch_assoc($result);         
          $mobile = $row['mobile_number'];
          $name = $row['first_name'] ." ". $row['last_name'];
          if($row['address'] != "")
          {
               $address = $row['address'].", ".$row['city'].", ".$row['state'].", ".$row['pincode'];
          }
          else
          {
               $_SESSION['address-update'] = '<div class="error">Address not found. Kindly provide address details.</div>';
               header("Location:".SITEURL."/update-profile.php?flag=1");
          }
         
     }
?>
<!DOCTYPE html>
<html lang="en">
<head>
     <link rel="stylesheet" href="css/cart.css">
     <link type="" rel="icon" href="images/logo.png">
     <meta charset="UTF-8">
     <meta http-equiv="X-UA-Compatible" content="IE=edge">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>Place order</title>
     <script>if(window.history.forward(1)!=null){window.history.forward(1);}</script>
</head>
<body>
     <div id="menu"><img src="images/logo.png" width="100px" alt=""></div>
     <br>     
    
     <div class="float">
          <div class="main-content silver">
               <h3>1. Login</h3> 
               <br>
               <b><?php echo $name ."  +91 ".$mobile; ?></b>
               <br><br><hr>
          </div>
          <div class="main-content silver">
               <h3>2. Delivery Address</h3>     <br>
               <p><?php echo $address; ?></p>          
               <br><br><hr>
          </div>
          <div class="main-content silver">
               <h3>3. Order Summary</h3>     <br>
               <p><table>
                    <tr>
                         <th>Sr No</th>
                         <th></th>
                         <th>Product</th>
                         <th>Quantity</th>
                         <th>Price</th>
                    </tr>
                    <?php

                         $sql2 = "SELECT cart.quantity, cart.total, product.product_name, product.image1 FROM cart INNER JOIN product on cart.id=product.id WHERE email = '$email' AND status = 'in-the-cart'";
                         $res2 = mysqli_query($con,$sql2);
                         $n=1; $total=0;
                         while($row2 = mysqli_fetch_assoc($res2))
                         {
                              $total += $row2['total'];
                    ?>
                    <tr>
                         <td><?php echo $n++;?></td>
                         <td><img src="images/product/<?php echo $row2['image1'];?>" width="100px" height="120px" alt=""></td>
                         <td><?php echo $row2['product_name'];?></td>
                         <td><?php echo $row2['quantity'];?></td>
                         <td><?php echo $row2['total'];?></td>
                    </tr>
                    <?php
                         }
                    ?>
                    
                    <tr>
                         <th colspan="5">Total Price : ₹. <?php echo $total;?></th>
                    </tr>
               </table></p>          
               <br><hr>
          </div>
          <div class="main-content silver">
               <h3>4. Payment Option</h3>     <br>
               <form action="" method="post">
                    <p>
                         Select payment method:
                         <select name="payment_method">
                              <option value="Cash On Delivery">Pay On Delivery</option>
                              <option value="UPI">UPI</option>
                              <option value="Card Payment">Card Payment</option>
                              <option value="EMI">EMI</option>
                              <option value="Net Banking">Net Banking</option>
                         </select>
                    </p>                        
                    <br><br><hr>
                    <br><br>
                    <p>* Once you clicked on CONFIRM button, It will be considered as order placed successfully with selected payment option</p>
                    <br>
                    <center><input class="place" type="submit" name="submit" value="Confirm Order"></center>
               </form>

               <?php
                    if(isset($_POST['submit']))
                    {
                         $method = $_POST['payment_method'];
                         $transaction_id = "TRNSID".rand(1000,9999);
                         $_SESSION['trid'] = $transaction_id;
                         $date=date_create(date("Y-m-d"));
                         date_add($date,date_interval_create_from_date_string("5 days"));
                         $del_dt = date_format($date,"Y-m-d");

                         $sql3 = "UPDATE cart SET status='bill', transaction_method='$method', transaction_id='$transaction_id', order_date=sysdate(), delivery_date= '$del_dt'  WHERE email='$email' AND transaction_method=''";
                         $res3 = mysqli_query($con,$sql3) or die(mysqli_error($con));
                         if($res3)
                         {
                              header("location:".SITEURL."/bill.php");
                         }
                         else
                         {
                              die();
                         }
                    }
               ?>
          </div>
     </div>
     <br>
</body>
</html>