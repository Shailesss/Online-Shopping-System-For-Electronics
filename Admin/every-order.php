<?php include("partials/menu.php");?>
     <div class="wrapper">
          <br><br>
          <h1 class="text-center">
               <?php
               if($_GET['type']=='delivered')
               {
                    echo "Delivered";
               }
               else
               {
                    echo "Cancelled";
               }
               ?> Orders
          </h1>
          <br><br>
          <table class="display-table text-center">
               <tr>
                    <th>Sr No</th>
                    <th>Email</th>
                    <th>Order Date</th>                    
                    <th>Product Name</th>               
                    <th>Quantity</th>
                    <th>Total</th>
                    <th>Delivery Date</th>
                    <th>Transaction ID</th>
               </tr>
               <?php
                    if($_GET['type']=='delivered')
                    {
                         $sql2 = "SELECT * FROM cart INNER JOIN product ON cart.id=product.id WHERE cart.status='delivered'";
                    }
                    else
                    {
                         $sql2 = "SELECT * FROM cart INNER JOIN product ON cart.id=product.id WHERE cart.status='cancel'";
                    }
                    $res2 = mysqli_query($con, $sql2);
                    $count = mysqli_num_rows($res2);
                    $num = 1;
                    if($count>0)
                    {
                         while($row = mysqli_fetch_assoc($res2))
                         {
               ?>
                              <tr><td><?php echo $num++; ?></td>
                              <td><?php echo $row['email']; ?></td>
                              <td><?php echo $row['order_date']; ?></td>                                   
                              <td><?php echo $row['product_name']; ?></td>
                              <td><?php echo $row['quantity']; ?></td>
                              <td><?php echo $row['total']; ?></td>
                              <td><?php echo $row['delivery_date']; ?></td>
                              <td><?php echo $row['transaction_id']; ?></td>
                         </tr>              
               <?php
                         }
                    } 
                    else
                    {
               ?>
                         <tr><td colspan="8"><h2>No Orders Found</h2></td></tr>
               <?php
                    }
               ?>
          </table>
          <br><br>
     </div>
<?php include("partials/footer.php");?>
