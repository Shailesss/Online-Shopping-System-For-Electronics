<?php include("partials/menu.php");?>

<!DOCTYPE html>
<html lang="en">
<head>
     <style>
          * {
               padding: 0;
               margin: 0;
               font-family: Verdana, Geneva, Tahoma, sans-serif;
          }

          .main-content {
               margin: auto 4%;
               background: radial-gradient(white,linen, rgb(250, 189, 128));
          }

          table{
               width: 70%;
               border-collapse:collapse;
               margin:0 auto;
               border: 5px double black;
               padding: 2%;
          }

          td{
               padding: 1%;
               text-align: center;
               border-bottom: 2px dashed #000;
          }

          th{
               padding: 1%;
               text-align: center;
               border-bottom: 2px solid #000;
          }

          h1{
               text-align:center;
               padding:10px;
          }
     </style>
     <meta charset="UTF-8">
     <meta http-equiv="X-UA-Compatible" content="IE=edge">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>My Orders - Gada Electronics</title>
</head>
<body>
     <div class="main-content">
          <h1>My Orders</h1>
          <br>

          <table>
               <tr>
                    <th></th>
                    <th>Order-Date</th>
                    <th>Particular</th>
                    <th>Quantity</th>
                    <th>Price</th>
                    <th>Delivery-Date</th>
                    <th>Status</th>
               </tr>
               <?php
               $email=$_SESSION['user'];
               $query="SELECT * FROM cart INNER JOIN product ON cart.id=product.id WHERE cart.email='$email' AND cart.status!='in-the-cart' ORDER BY cart.order_date DESC";
               $result = mysqli_query($con,$query);
               if(mysqli_num_rows($result)>0)
               {
                    while($row = mysqli_fetch_assoc($result))
                    {
                    ?>
               <tr>
                    <td><img width="150px" height="150px" src="images/product/<?php echo $row['image1'];?>"></td>
                    <td><?php echo $row['order_date'];?></td>
                    <td><?php echo $row['product_name'];?></td>
                    <td><?php echo $row['quantity'];?></td>
                    <td><?php echo $row['total'];?></td>
                    <td><?php echo $row['delivery_date'];?></td>
                    <td><?php echo $row['status'];?></td>
               </tr>
                    <?php
                    }
               }
               else
               {?>
                    <tr>
                    <td colspan="7"><h1>No orders found</h1></td>
                    </tr>
               <?php
               }
               ?>
               
          </table>
          <br><br>
     </div>
</body>
</html>
<?php include("partials/footer.php");?>