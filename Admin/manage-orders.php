<?php include("partials/menu.php");?>
<div class="wrapper">
     <br><br>
     <h1 class="text-center">New Orders</h1>
     <br><br>
     <table class="display-table text-center">
          <tr>
               <th>Sr No</th>
               <th>Order Date</th>
               <th>Email</th>
               <th>Product Name</th>               
               <th>Quantity</th>
               <th>Total</th>
               <th>Transaction ID</th>
               <th>Actions</th>
          </tr>
          <?php
                    $sql2 = "SELECT * FROM cart INNER JOIN product ON cart.id=product.id WHERE status='in-process' ORDER BY order_date DESC";
                    $res2 = mysqli_query($con, $sql2);
                    $count = mysqli_num_rows($res2);
                    $num = 1;
                    if($count>0)
                    {
                         while($row = mysqli_fetch_assoc($res2))
                         {
               ?>
                              <tr><td><?php echo $num++; ?></td>
                              <td><?php echo $row['order_date']; ?></td>
                              <td><?php echo $row['email']; ?></td>
                              <td><?php echo $row['product_name']; ?></td>
                              <td><?php echo $row['quantity']; ?></td>
                              <td><?php echo $row['total']; ?></td>
                              <td><?php echo $row['transaction_id']; ?></td>
                              <td>
                                   <a href="<?php echo SITEURL;?>/admin/update-order.php?action=1&trid=<?php echo $row['transaction_id'];?>" class="btn-secondary">Delivered</a><a href="<?php echo SITEURL;?>/admin/update-order.php?action=0&trid=<?php echo $row['transaction_id'];?>" class="btn-danger">Cancel</a>
                              </td>
                         </tr>              
               <?php
                         }
                    } 
                    else
                    {
               ?>
                         <tr><td colspan="8"><h2 class="win">No Orders Found</h2></td></tr>
               <?php
                    }
               ?>
     </table>
     <br><br>
</div>
<?php include("partials/footer.php");?>
