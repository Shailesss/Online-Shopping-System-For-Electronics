<?php include("partials/menu.php");?>
<div class="wrapper">
     <br><br>
     <h1 class="text-center">Messages</h1>
     <br>
     <?php
     if(isset($_SESSION['order']))
     {
          echo $_SESSION['order'];
          unset($_SESSION['order']);
     }
     ?>
     <br>
     <table class="display-table text-center fixed">
          <tr>
               <th>Sr No</th>
               <th>Email</th>
               <th>Issue Date</th>
               <th>Issue</th>
               <th>Description</th>
               <th>Resolved ?</th>
          </tr>
          <?php
                    $sql2 = "SELECT * FROM message  ORDER BY id";
                    $res2 = mysqli_query($con, $sql2);
                    $count = mysqli_num_rows($res2);
                    $num = 1;
                    if($count>0)
                    {
                         while($row = mysqli_fetch_assoc($res2))
                         {
               ?>
                              <tr>
                              <td><?php echo $num++; ?></td>
                              <td><?php echo $row['email']; ?></td>
                              <td><?php echo $row['message_date']; ?></td>
                              <td><?php echo $row['subject']; ?></td>
                              <td><?php echo $row['message_body']; ?></td>
                              <td>
                                   <?php
                                        if($row['reply']!="Solved")
                                        {
                                   ?>
                                   <a class="btn-secondary" href="resolve.php?id=<?php echo $row['id']; ?>">Yes</a>
                                   <?php
                                        }
                                        else
                                        {
                                             echo "Solved";
                                        }
                                   ?>
                              </td>
                         </tr>              
               <?php
                         }
                    } 
                    else
                    {
               ?>
                         <tr><td colspan="6"><h2 class="win">No Message Found</h2></td></tr>
               <?php
                    }
               ?>
     </table>
     <br><br>
</div>
<?php include("partials/footer.php");?>
