<?php include("partials/menu.php")?>
<head>
     <title>Add New Product - Gada Electronics</title>
</head>
<div class="main-content">
               <?php
               $sql = "select * from product";
               $res = mysqli_query($con, $sql);
               if($res==TRUE)
               {
                    $count = mysqli_num_rows($res);
               }
               ?>
     <h3 class="text-center">Product ID: <?php echo ++$count; ?></h3>
     <div class="entry">
          <form action="" method="post" enctype="multipart/form-data">
               <br>
               <?php
               
               if(isset($_SESSION['upload']))
               {
                    echo $_SESSION['upload'];
                    unset($_SESSION['upload']);
               }
               ?>
               <br>

               <input type="hidden" name="id" value="<?php echo $count;?>">
               <table class="form-align text-center">
                    <tr>
                         <td colspan="2"><input type="text" title="Product name" name="title"  placeholder="Enter Product name" required></td>
                    </tr>
                    <tr>
                         <td colspan="2"><input type="text" title="Product category" name="category"  placeholder="Enter Product category" required></td>
                    </tr>
                    <tr>
                         <td colspan="2"><input type="text" title="Product price" name="price" maxlength="8" placeholder="Enter Product price" required></td>
                    </tr>
                    <tr>
                         <td colspan="2"><input type="text" title="Product stock" name="stock" maxlength="8" placeholder="Enter Product stock" required></td>
                    </tr>
                    <tr>
                         <td>Choose Image for product :</td>
                         <td><input type="file" name="image1" title="Image size must be less than 2 mb." required></td>
                    </tr>
                    <tr>
                         <td>Choose Image for product :</td>
                         <td><input type="file" name="image2" title="Image size must be less than 2 mb." required></td>
                    </tr>
                    <tr>
                         <td>Choose Image for product :</td>
                         <td><input type="file" name="image3" title="Image size must be less than 2 mb." required></td>
                    </tr>
                    <tr>
                         <td colspan="2"><input name="submit" title="Add product" type="submit" value="Add Product" class="btn-secondary"></td>
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

     if((isset($_FILES['image1']['name'])) AND (isset($_FILES['image2']['name'])) AND (isset($_FILES['image3']['name'])))
     {
          $image1 = $_FILES['image1']['name'];
          $image2 = $_FILES['image2']['name'];
          $image3 = $_FILES['image3']['name'];
          
          $extension1 = explode('.',$image1)[1];
          $extension2 = explode('.',$image2)[1];
          $extension3 = explode('.',$image3)[1];

          $image_name1 = "Product_".$id."_A.".$extension1;
          $image_name2 = "Product_".$id."_B.".$extension2;
          $image_name3 = "Product_".$id."_C.".$extension3;

          $source1 = $_FILES['image1']['tmp_name'];
          $source2 = $_FILES['image2']['tmp_name'];
          $source3 = $_FILES['image3']['tmp_name'];

          $destination1 = "../images/product/".$image_name1;
          $destination2 = "../images/product/".$image_name2;
          $destination3 = "../images/product/".$image_name3;
     }
     else
     {
          $image_name1 = "";
          $image_name2 = "";
          $image_name3 = "";
     }

     $sql = "INSERT INTO product SET product_name = '$name', product_category = '$category', price = $price, product_stock= $stock, image1 = '$image_name1', image2 = '$image_name2', image3 = '$image_name3'";

     $result = mysqli_query($con, $sql);
     if($result == TRUE)
     {
          $upload1 = move_uploaded_file($source1,$destination1);
          $upload2 = move_uploaded_file($source2,$destination2);
          $upload3 = move_uploaded_file($source3,$destination3);

          if($upload1 ==false AND $upload2==false AND $upload3==false)
          {
               $_SESSION['upload'] = "<div class='error'>* Failed to upload image.</div>";
               header("location:".SITEURL."/Admin/add-product.php");
          }
          
          $_SESSION['product-add'] = "<div class='success'>* Product added successfully</div><br>";
          header("location:".SITEURL."/Admin/manage-product.php");
     }
     else
     {
          
          $_SESSION['product-add'] = "<div class='error'>* Failed to add product.</div><br>";
        header("location:".SITEURL."/Admin/manage-product.php");
     }
}  
?>