<?php
include("partials/menu.php")
?>
<!DOCTYPE html>
<html lang="en">
<head>
     <meta charset="UTF-8">
     <meta http-equiv="X-UA-Compatible" content="IE=edge">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>Manage Products - Gada Electronics</title>
     <link rel="stylesheet" href="../css/admin-style.css">
</head>
<body>
     <div class="wrapper">
          <br><br>
     <h1 class="text-center">Products</h1><br>
     <h2><a href="add-product.php" class="btn-primary">Add Product</a></h2><br><br>
     <?php
     if(isset($_SESSION['product-add']))
     {
          echo $_SESSION['product-add'];
          unset($_SESSION['product-add']);
     }

     if(isset($_SESSION['product-delete']))
     {
          echo $_SESSION['product-delete'];
          unset($_SESSION['product-delete']);
     }
     ?>
     <table class="display-table text-center fixed">
          <tr>
               <th>Sr no</th>
               <th>Product name</th>
               <th>Category</th>
               <th>Price</th>
               <th>Stock</th>
               <th>Product image 1</th>
               <th>Product image 2</th>
               <th>Product image 3</th>
               <th colspan="2">Actions</th>
          </tr>
          <?php
               $sql = "SELECT * FROM product ORDER BY id";
               $res = mysqli_query($con,$sql);
               $count = mysqli_num_rows($res);
               $sno =0;
               if($count>0)
               {
                    while($row = mysqli_fetch_assoc($res))
                    {
                         $sno++;
                         $id = $row['id'];
                         $title = $row['product_name'];
                         $category = $row['product_category'];
                         $price = $row['price'];
                         $stock = $row['product_stock'];
                         $image1 = $row['image1'];
                         $image2 = $row['image2'];
                         $image3 = $row['image3'];
          ?>
                    
                         <tr>
                              <td><?php echo $sno; ?></td>
                              <td><?php echo $title; ?></td>
                              <td><?php echo $category; ?></td>
                              <td><?php echo $price; ?></td>
                              <td><?php echo $stock; ?></td>
                              <td><img  src="../images/product/<?php echo $image1;?>" alt=""></td>
                              <td><img src="../images/product/<?php echo $image2;?>" alt=""></td>
                              <td><img src="../images/product/<?php echo $image3;?>" alt=""></td>
                              <td><a href="delete-product.php?id=<?php echo $id; ?>&img1=<?php echo $image1;?>&img2=<?php echo $image2;?>&img3=<?php echo $image3;?>" class="btn-danger">Delete</a></td>
                              <td><a href="update-product.php?id=<?php echo $id; ?>" class="btn-secondary">Update</a></td>
                         </tr>

         <?php
                    }
               }
               else
               {
          ?>
                        <tr>
                            <td colspan = "9"><div class="error"><h3>No product added.</h3></div></td>
                        </tr>
          <?php
               }
          ?>
     </table>
     <br><br>
     </div>
</body>
</html>
<?php
include("partials/footer.php")
?>