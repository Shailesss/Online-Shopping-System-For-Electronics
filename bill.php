<?php
     include("config/constant.php");    
     if(!isset($_SESSION['user']))
     {
          header("Location:".SITEURL."/login.php");
     }     
     $email= $_SESSION['user'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
     <link rel="icon" href="images/logo.png">
     <meta charset="UTF-8">
     <meta http-equiv="X-UA-Compatible" content="IE=edge">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>Bill - Gada Electronics</title>
     <link rel="stylesheet" href="css/bill.css">
</head>
<body>
     <div class="bill">
          <div class="top">
               <img src="images/logo.png" width="200px" alt="">     
               <p>Invoice No : <?php echo $invoice = " GE-10".rand(0000,9999).rand(55,9999); ?></p><br><br>
               <p>Ivvoice Date: <?php echo date("d/m/Y"); ?></p>
               <h1>Gada Electronics</h1>
          </div>
          <h2>Tax Invoice</h2>
          <br><hr>

          <?php
               $query = "SELECT * FROM customer WHERE email='$email'";
               $res2 = mysqli_query($con,$query);
               $row2 = mysqli_fetch_assoc($res2);
               $name = $row2['first_name']." ".$row2['last_name'];
               $mob = $row2['mobile_number'];
               $address = $row2['address'].", ".$row2['city'].", ".$row2['state'].", INDIA - ".$row2['pincode'].".";
          ?>
          <div class="address">
               <p>To,</p>
               <p>Mr./Mrs. <?php echo $name; ?></p>
               <p>Mob No. : <?php echo $mob; ?></p>
               <p>Address : <?php echo $address; ?></p>
          </div>
          <br><hr>

          <div class="particular">
               <table>
                    <caption>-: Product Details :-</caption>
                    <tr>
                         <th>Sr No</th>
                         <th>Particular</th>
                         <th>Category</th>
                         <th>Quantity</th>
                         <th>Price (₹)</th>
                         <th>Amount (₹)</th>
                    </tr>
                    <?php
                         
                         $trans_id = $_SESSION['trid'];
                         unset($_SESSION['trid']);
                         $sql = "SELECT * from cart INNER JOIN product ON cart.id=product.id WHERE cart.email='$email' AND cart.status='bill' AND cart.transaction_id='$trans_id'";
                         $res = mysqli_query($con,$sql);                         
                         $n = 1;
                         $total=0;
                         if($res)
                         {
                              while($row = mysqli_fetch_assoc($res))
                              {
                                   $trans_method = $row['transaction_method'];
                                   $od = $row['order_date'];
                                   $dd = $row['delivery_date'];
                                   $total = $total+$row['total'];
                    ?>
                    <tr>
                         <td><?php echo $n++; ?></td>
                         <td><?php echo $row['product_name']; ?></td>
                         <td><?php echo $row['product_category']; ?></td>
                         <td><?php echo $row['quantity']; ?></td>
                         <td><?php echo $row['price']; ?></td>
                         <td><?php echo $row['total']; ?></td>
                    </tr>
                    <?php
                              }

                              $query3 = "UPDATE cart SET status='in-process' WHERE transaction_id='$trans_id'";
                              $result3 = mysqli_query($con,$query3);
                         }
                    ?>
                    <tr>
                         <td colspan="5"  id="last">Total Amount :</td>
                         <td>₹. <?php echo $total; ?></td>
                    </tr>
               </table>
               <br><br>
               <center>
                    <strong>
                    <li>Ordered Date : <?php echo $od; ?></li>
                    <li>Delivery Date : <?php echo $dd ;?></li>  
                    </strong>
               </center>             
          </div><br><hr>
          <!--<img width="250px"  src="images/jethiya.png" alt="">-->
          <div class="signature">
               <p>From,</p><br>
               <p><i>Mr. Jethalal Champakalal Gada</i></p><br>
               <p><b>(Gada Electronics)</b></p>
               <img src="images/logo.png" width="70px" alt=""><br>
               <p><strong>Thank You!</strong> <br>for shopping with us.</p>
          </div>
          <div class="clearfix"></div>
          <i>* This is electronically generated copy and must be provided at time of delivery.</i>
     </div>

     <div class="button">
          <br>
          <a onclick="window.print();"><button>Print</button></a>
          <a href="home-page.php"><button>Continue Shopping</button></a>          
     </div>
     <br>  
</body>
</html>