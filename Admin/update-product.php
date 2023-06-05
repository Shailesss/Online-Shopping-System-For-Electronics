<?php include("partials/menu.php")?>
<head>
     <title>Update Product - Gada Electronics</title>
</head>
<div class="main-content">
               <?php
               $id = $_GET['id'];
               $sql = "SELECT * FROM product WHERE id=$id";
               $res = mysqli_query($con, $sql);
               if($res==TRUE)
               {
                    while($row=mysqli_fetch_assoc($res))
                    {
                         $id = $row['id'];
                         $title = $row['product_name'];
                         $category = $row['product_category'];
                         $price = $row['price'];
                         $stock = $row['product_stock'];
                         ?>
                         
                         
     <h3 class="text-center">Product ID: <?php echo $id; ?></h3>
     <div class="entry">
          <form action="" method="post" enctype="multipart/form-data">
               <br>

               <input type="hidden" name="id" value="<?php echo $id; ?>">
               <table class="form-align text-center">
                    <tr>
                         <td colspan="2"><input type="text" value="<?php echo $title; ?>" title="Product name" name="title"  placeholder="Enter Product name" required></td>
                    </tr>
                    <tr>
                         <td colspan="2"><input type="text" value="<?php echo $category; ?>" title="Product category" name="category"  placeholder="Enter Product category" required></td>
                    </tr>
                    <tr>
                         <td colspan="2"><input type="text" value="<?php echo $price; ?>" title="Product price" name="price" maxlength="8" placeholder="Enter Product price" required></td>
                    </tr>
                    <tr>
                         <td colspan="2"><input type="text" value="<?php echo $stock; ?>" title="Product stock" name="stock" maxlength="8" placeholder="Enter Product stock" required></td>
                    </tr>
               <?php
                    }
               }
               else
               {
                    $_SESSION['product-add'] = "<div class='error'>* Something went wrong. Try again !!!</div><br>";
                    header("location:".SITEURL."/Admin/manage-product.php");
               }
               ?>
                    <tr>
                         <td colspan="2"><input name="submit" title="Update product" type="submit" value="Update Product" class="btn-secondary"></td>
                    </tr>
               </table>
          </form>
     </div>
</div>
<?php include("partials/footer.php")?>

<?php
if(isset($_POST['submit']))
{
     $id = $_POST['id'];
     $name = $_POST['title'];
     $category = $_POST['category'];
     $price = $_POST['price'];
     $stock = $_POST['stock'];

     
     $sql = "UPDATE product SET product_name = '$name', product_category = '$category', price = $price, product_stock= $stock WHERE id=$id";

     $result = mysqli_query($con, $sql);
     if($result == TRUE)
     {
          $_SESSION['product-add'] = "<div class='success'>* Product updated successfully</div><br>";
          header("location:".SITEURL."/Admin/manage-product.php");
     }
     else
     {
          
          $_SESSION['product-add'] = "<div class='error'>* Failed to update product.</div><br>";
          header("location:".SITEURL."/Admin/manage-product.php");
     }
}  
?>