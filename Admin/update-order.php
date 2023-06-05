<?php
include("../config/constant.php");
$action=$_GET['action'];
$trid=$_GET['trid'];

if($action==1)
{
     $sql = "UPDATE cart SET status='delivered' WHERE transaction_id = '$trid'";
     $res = mysqli_query($con,$sql);
     if($res)
     {
          $query = "INSERT INTO payment SELECT email, transaction_id, order_date,total, transaction_method FROM cart WHERE transaction_id='$trid'";
          $result = mysqli_query($con,$query) or die($con);

          $query1 = "SELECT * FROM cart WHERE transaction_id = '$trid'";
          $result1 = mysqli_query($con,$query1);
          if($result1)
          {
               while($r = mysqli_fetch_assoc($result1))
               {
                    $q=$r['quantity'];
                    $i=$r['id'];
                    $update_query = "UPDATE product SET product_stock= product_stock-$q WHERE id=$i";
                    mysqli_query($con,$update_query) or die($con);
               }
          }

          header("location:".SITEURL."/admin/manage-orders.php");
     }
     else
     {
          $_SESSION['order'] = '<div class="error">* Something went wrong.</div>';
          header("location:".SITEURL."/admin/manage-orders.php");
     }
     
}
else
{
     $sql = "UPDATE cart SET status='cancel' WHERE transaction_id = '$trid'";
     $res = mysqli_query($con,$sql);
     if($res)
     {
          header("location:".SITEURL."/admin/manage-orders.php");
     }
     else
     {
          $_SESSION['order'] = '<div class="error">* Something went wrong.</div>';
          header("location:".SITEURL."/admin/manage-orders.php");
     }
     
}

?>